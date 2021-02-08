<?php
session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'students');

// $con = mysqli_connect('sql313.byetcluster.com','b15_26550539','01113284597aab');

// mysqli_select_db($con, 'b15_26550539_userregistration');

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$pass = $_POST['password'];
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


$s = "SELECT * FROM admins WHERE user_email = '$email'";
$result = mysqli_query($con , $s);
$num = mysqli_num_rows($result);

if($num == 1){
    echo "username already taken";
}else{
    if(in_array($fileActualExt , $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000){
                $fileNameNew = uniqid('' , true) . "." . $fileActualExt;
                $fileDestination = 'assets/images/users/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $reg = "insert into admins(user_name , user_email , password , profPic ) values ('$name' , '$email' , '$pass' , '$fileNameNew' )";
                mysqli_query($con, $reg);
                echo "secceded";
            } else {
                echo "your file is too big";
            }
        } else {
            echo "There was an error while uploadin file!";
        }
    } else {
        echo "You cannot upload files of this types";
    }
    
    echo"successful registeration";
header('location:Tullabi.php');

}

?>