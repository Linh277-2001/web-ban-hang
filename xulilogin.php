<?php
    session_start();
    $u = $_POST['user'];
    $p = $_POST['pass'];
    $db= mysqli_connect("localhost","root","","demo");
    $sql= "select * from user where username = '$u' and password ='$p'";
    $rs = mysqli_query($db,$sql);
    if(mysqli_num_rows($rs) >0){
        $_SESSION['username'] = $u;
        header('Location: user_thongtin.php');
    }else{
        header('Location: login.php');
    }
?>