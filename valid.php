<?php
session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'students');

// $con = mysqli_connect('sql313.byetcluster.com','b15_26550539','01113284597aab');

// mysqli_select_db($con, 'b15_26550539_userregistration');

$name = $_POST['user'];
$pass = $_POST['password'];


$s = "SELECT * FROM admins WHERE user_email = '$name' && password = '$pass' ";
$result = mysqli_query($con , $s);
$num = mysqli_num_rows($result);

if($num == 1){
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['user_name'] = $name;
        echo "username: " . $row["user_name"]. " - password: " . $row["password"]. " " . $row["admin"]. "<br>";
        echo gettype($row["admin"]). "<br>";
        settype($row["admin"],'boolean');
        echo gettype($row["admin"]). "<br>" . $row["admin"]. "<br>";
        if($row["admin"] == 1){
            $_SESSION['user']=$row["user_name"];
            $_SESSION['pic']=$row['profPic'];
            $_SESSION['dep'] = $row['id_dep'];
            $_SESSION['userId'] = $row['user_id'];
            header('location:dashbord_main.php');
        }else if($row["admin"] == 0) {
            echo "you are such a user";
        }
    }
}else{
    $error = "Your Login Name or Password is invalid please sign in first";
    echo $error . "<a href='Tullabi.php'> go back </a>";
}
