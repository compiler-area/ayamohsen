<?php 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'students');

$gov = $_POST['government'];

$select = "SELECT * FROM government WHERE name = '$gov'";
$result = mysqli_query($con , $select);
$num = mysqli_num_rows($result);

if($num >= 1){
    echo 'the goverment already in';
} else {
    $insert_gov = "INSERT INTO `government`(`name`) VALUES ('$gov')";
    mysqli_query($con , $insert_gov);
    header('location:../dashbord_main.php');
}