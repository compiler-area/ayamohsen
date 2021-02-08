<?php
session_start();
// $con = mysqli_connect('sql313.byetcluster.com','b15_26550539','01113284597aab');
// mysql_set_charset('utf8',$con);
// mysqli_select_db($con, 'b15_26550539_student');

$con = mysqli_connect('localhost','root','');
                mysqli_select_db($con, 'students');

$name = $_POST['name'];

$reg = "insert into government(name) values ('$name' )";
mysqli_query($con, $reg);
echo "secceded";
