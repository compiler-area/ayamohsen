<?php 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'students');

$gov = $_POST['government'];
$area = $_POST['area'];

$select = "SELECT * FROM area INNER JOIN government ON area.gov_id = government.id_gov WHERE gov_id = '$gov' && area_name = '$area'";
$result = mysqli_query($con , $select);
$num = mysqli_num_rows($result);

// echo $area;

if($num >= 1){
    echo 'the area already in';
} else {
    $insert_area = "INSERT INTO `area`(`area_name`, `gov_id`) VALUES ('$area' , '$gov')";
    mysqli_query($con , $insert_area);
    header('location:../dashbord_main.php');
}