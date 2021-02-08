<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'student');

$gov = $_POST['gov'] ;
$type = $_POST['m_f'] ;
$area = $_POST['area'] ;
$room_or_bed = $_POST['live'] ;
$price = $_POST['price'];

$s = " select * from are where gov_id = '$gov'";
$result = mysqli_query($con , $s);
$_SESSION['m'] = $_POST['m_f'] ;
$_SESSION['gov'] = $_POST['gov'] ;
$_SESSION['area'] = $_POST['area'] ;
$_SESSION['live'] = $_POST['live'] ;
$_SESSION['price'] = $_POST['price'];

header('location:all_rooms.php');