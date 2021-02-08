<?php 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'students');

$gov = $_POST['government'];
$area = $_POST['area'];
$address = $_POST['apartment_address'];
$info = $_POST['apartment_info'];
// $photo = $_POST['apartment_photo'];
$male_female = $_POST['m_f'];

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

$select = "SELECT * FROM apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov WHERE  gov_id = '$gov' && area_id = '$area' && apartment_address = '$address' ";
$result = mysqli_query($con , $select);
$num = mysqli_num_rows($result);


if($num >= 1){
    echo 'the area already in';
} else {
    // $insert_area = "INSERT INTO `area`(`area_name`, `gov_id`) VALUES ('$area' , '$gov')";
    // mysqli_query($con , $insert_area);

    if(in_array($fileActualExt , $allowed)){
        if ($fileError === 0){
            if ($fileSize < 10000000){
                $fileNameNew = uniqid('' , true) . "." . $fileActualExt;
                $fileDestination = '../assets/images/apartment/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $insert_apartment = "INSERT INTO `apartment`(`apartment_address`, `apartment_info`, `apartment_photo`, `m_f`, `area_id`)values ('$address' , '$info' , '$fileNameNew' , '$male_female' , '$area')";
                mysqli_query($con, $insert_apartment);
                echo "secceded";
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