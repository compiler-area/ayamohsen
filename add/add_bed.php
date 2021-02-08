<?php 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'students');


$gov = $_POST['government'];
$area = $_POST['area'];
$apar = $_POST['apartment'];
$room= $_POST['room'];
$bed_description = $_POST['bed_description'];
$bed_price = $_POST['bed_price'];

//  ********** files **********
$file = $_FILES['file'];

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['name'];

$fileExt = explode('.' , $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg' , 'jpeg' , 'png' , 'pdf');
//  ********** files **********

$select = "SELECT * FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov WHERE area_id = '$area' && apartment_id = '$apar' && room_id = '$room' && bed_description = '' ";
$result = mysqli_query($con , $select);
$num = mysqli_num_rows($result);


if($num >= 1){
    echo 'the room already in';
} else {
    // $insert_area = "INSERT INTO `area`(`area_name`, `gov_id`) VALUES ('$area' , '$gov')";
    // mysqli_query($con , $insert_area);

    if(in_array($fileActualExt , $allowed)){
        if ($fileError === 0){
            if ($fileSize < 10000000){
                $fileNameNew = uniqid('' , true) . "." . $fileActualExt;
                $fileDestination = '../assets/images/beds/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $insert_apartment = "INSERT INTO `beds`(`bed_description`, `bed_photo` ,`bed_price`, `room_id`) VALUES ( '$bed_description' , '$fileNameNew' ,'$bed_price' , '$room')";
                mysqli_query($con, $insert_apartment);
                // echo "secceded";
                header('location:../dashbord_main.php');
            } else {
                echo "your file is too big";
            }
        } else {
            echo "There was an error while uploadin file!";
        }
    } else {
        echo "You cannot upload files of this types";
    }

    // header('location:../dashbord.php');
}