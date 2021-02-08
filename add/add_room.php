<?php 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'students');

$gov = $_POST['government'];
$area = $_POST['area'];
$apar_id = $_POST['apartment'];
$info= $_POST['room_info'];

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

$select = "SELECT * FROM room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment INNER JOIN area ON apartment.area_id = area.id_area WHERE area_id = '$area' && apartment_id = '$apar_id' && room_info = '$info' ";
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
                $fileDestination = '../assets/images/rooms/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $insert_apartment = "INSERT INTO `room`(`room_info`, `room_photo`, `apartment_id`) VALUES ( '$info' , '$fileNameNew' ,'$apar_id')";
                mysqli_query($con, $insert_apartment);
                // echo "secceded";
                header('location:../dashbord.php');
            } else {
                echo "your file is too big";
            }
        } else {
            echo "There was an error while uploadin file!";
        }
    } else {
        echo "You cannot upload files of this types";
    }

    header('location:../dashbord_main.php');
}