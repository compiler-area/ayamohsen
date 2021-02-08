<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$date = date('Y-m-d H:i:s');
$address= $_POST['address'];
$name = $_POST['name'] ; 
$type = $_POST['type'] ;
$id = $_POST['type_id'];

$is_booked = mysqli_connect('localhost','root','');
mysqli_select_db($is_booked, 'students');

$select_is_booked = "SELECT * from booking where booked_name = '$type' && booked_id = '$id'";
$result_is_booked = mysqli_query($is_booked , $select_is_booked);
$num = mysqli_num_rows($result_is_booked);

if($num >= 1){
    echo 'sorry its booked';

}else {
    
    try {
        //Server settings
        $mail->CharSet = 'UTF-8';

        $mail->SMTPDebug = 1;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'zay.betak@gmail.com';                     // SMTP username
        $mail->Password   = '01100882686';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('zay.betak@gmail.com', 'ahmed');

        $mail->addAddress('ahmedabubakr148@gmail.com');     // Add a recipient

        // $body = '<h1> hello from html</h1>';
        $subj = ' new ' . $type. ' ';
        $body = '<h1>' . $_POST['name']. ' choosed a '. $_POST['type'] .' and its address is: '.$_POST['address'].' </h1><a href="tel:' . $_POST['phone'] . '">' . $_POST['phone'] . ' </a>' ;
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        // $mail->Subject = 'Here is the subject';
        $mail->Subject = $subj ;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        // echo 'Message has been sent';
        // $_SESSION['type'] = $_POST['type'];
        // header('location:booking.php');

        
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con, 'students');
        $reg = "insert into booking(name,booked_name,booked_id,booking_date) values ('$name','$type','$id','$date' )";
        mysqli_query($con, $reg);

        
        $id_type = 'id_'. $type;
        $set_booked= $type . '_booked';
        // $update = "UPDATE `{$type}` SET `$set_booked` = '1' WHERE `$id_type` = '$id'";
        // mysqli_query($con, $update);

        $half = '';
        $full = '';

        if($type == 'apartment'){
            $update_apartment = "UPDATE `apartment` SET `apartment_booked` = '2' WHERE `$id_type` = '$id'";
            mysqli_query($con, $update_apartment);

            $select_room_bed = "SELECT * FROM apartment INNER JOIN room ON apartment.id_apartment = room.apartment_id INNER JOIN beds ON room.id_room = beds.room_id WHERE `$id_type` = '$id'";
            $result_room_bed = mysqli_query($con , $select_room_bed);

            while($row_room_bed = mysqli_fetch_assoc($result_room_bed)) {
                // echo $row_roon_bed['coun'];

                $id_room = $row_room_bed['id_room'];
                $update_room = "UPDATE `room` SET `room_booked` = '2' WHERE `id_room` = '$id_room'";
                mysqli_query($con , $update_room);

                $id_room = $row_room_bed['id_beds'];
                $update_beds = "UPDATE `beds` SET `beds_booked` = '2' WHERE `id_beds` = '$id_beds'";
                mysqli_query($con , $update_beds);
                
            }

        } else if ($type == 'room') {

            $update_room = "UPDATE `room` SET `room_booked` = '2' WHERE `$id_type` = '$id'";
            mysqli_query($con, $update_room);

            $select_apartment_beds = "SELECT * FROM apartment INNER JOIN room ON apartment.id_apartment = room.apartment_id INNER JOIN beds ON room.id_room = beds.room_id WHERE `$id_type` = '$id'";
            $result_apartment_beds = mysqli_query($con , $select_apartment_beds);

            while($row_apartment_beds = mysqli_fetch_assoc($result_apartment_beds)) {
                // echo $row_roon_bed['coun'];

                $id_apartment = $row_apartment_beds['id_apartment'];
                $update_apartment = "UPDATE `apartment` SET `apartment_booked` = '1' WHERE `id_apartment` = '$id_apartment'";
                mysqli_query($con , $update_apartment);

                $count_room_apartment_booked = "SELECT COUNT(id_room) AS coun FROM room WHERE room_booked = 2 && `apartment_id` = '$id_apartment'";
                $result_count_room_apartment_booked = mysqli_query($con , $count_room_apartment_booked);
                while($row_count_room_apartment_booked = mysqli_fetch_assoc($result_count_room_apartment_booked) ){
    
                    $count_room_apartment_main = "SELECT COUNT(id_room) AS summ FROM room WHERE `apartment_id` = '$id_apartment'";
                    $result_room_apartment_main =  mysqli_query($con , $count_room_apartment_main);
                    while($row_count_room_apartment_main = mysqli_fetch_assoc($result_room_apartment_main) ){
                        if($row_count_room_apartment_booked['coun'] == $row_count_room_apartment_main['summ']){
                            $update_room_apartment_new = "UPDATE `apartment` SET `apartment_booked` = '2' WHERE `id_apartment` = '$id_apartment'";
                            mysqli_query($con , $update_room_apartment_new);
                        }
                    }
                }

                $id_beds = $row_apartment_beds['id_beds'];
                $update_beds = "UPDATE `beds` SET `beds_booked` = '2' WHERE `id_beds` = '$id_beds'";
                mysqli_query($con , $update_beds);
                
            }

        }else if ($type == 'beds'){
            $update_beds = "UPDATE `beds` SET `beds_booked` = '2' WHERE `$id_type` = '$id'";
            mysqli_query($con, $update_beds);

            $select_room_apartment = "SELECT * FROM apartment INNER JOIN room ON apartment.id_apartment = room.apartment_id INNER JOIN beds ON room.id_room = beds.room_id WHERE `$id_type` = '$id'";
            $result_room_apartment = mysqli_query($con , $select_room_apartment);

            while($row_room_apartment = mysqli_fetch_assoc($result_room_apartment)) {
                // echo $row_roon_bed['coun'];

                $id_room = $row_room_apartment['id_room'];
                $update_room = "UPDATE `room` SET `room_booked` = '1' WHERE `id_room` = '$id_room'";
                mysqli_query($con , $update_room);

                $count_beds_room_booked = "SELECT COUNT(id_beds) AS coun FROM beds WHERE beds_booked = 2 && `room_id` = '$id_room'";
                $result_count_beds_room_booked = mysqli_query($con , $count_beds_room_booked);
                while($row_count_beds_room_booked = mysqli_fetch_assoc($result_count_beds_room_booked) ){
    
                    $count_beds_room_main = "SELECT COUNT(id_beds) AS summ FROM beds WHERE `room_id` = '$id_room'";
                    $result_beds_room_main =  mysqli_query($con , $count_beds_room_main);
                    while($row_count_beds_room_main = mysqli_fetch_assoc($result_beds_room_main) ){
                        if($row_count_beds_room_booked['coun'] == $row_count_beds_room_main['summ']){
                            $update_room_beds_new = "UPDATE `room` SET `room_booked` = '2' WHERE `id_room` = '$id_room'";
                            mysqli_query($con , $update_room_beds_new);
                        }
                    }
                }


                $id_apartment = $row_room_apartment['id_apartment'];
                $update_apartment = "UPDATE `apartment` SET `apartment_booked` = '1' WHERE `id_apartment` = '$id_apartment'";
                mysqli_query($con , $update_apartment);
                
                $count_apartment_booked = "SELECT COUNT(id_beds) AS coun FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment WHERE beds_booked = 2 && `id_apartment` = '$id_apartment'";
                $result_count_apartment_booked = mysqli_query($con , $count_apartment_booked);
                while($row_count_apartment_booked = mysqli_fetch_assoc($result_count_apartment_booked) ){
    
                    $count_apartment_main = "SELECT COUNT(id_beds) AS summ FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment WHERE `id_apartment` = '$id_apartment'";
                    $result_apartment_main =  mysqli_query($con , $count_apartment_main);
                    while($row_count_apartment_main = mysqli_fetch_assoc($result_apartment_main) ){
                        if($row_count_apartment_booked['coun'] == $row_count_apartment_main['summ']){
                            $update_apartment_new = "UPDATE `apartment` SET `apartment_booked` = '2' WHERE `id_apartment` = '$id_apartment'";
                            mysqli_query($con , $update_apartment_new);
                        }
                    }
                }

            }

        }


        header('location:sent.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}