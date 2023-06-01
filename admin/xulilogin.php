<?php
    session_start();
    $u = $_POST['user'];
    $p = $_POST['pass'];
    $db= mysqli_connect("localhost","root","","demo");
    $sql= "select * from admin where username = '$u' and password ='$p'";
    $rs = mysqli_query($db,$sql);
    if(mysqli_num_rows($rs) >0){
        $_SESSION['admin'] = $u;
        header('Location: index.php');
    }else{
        header('Location: login.php');
    }
?>