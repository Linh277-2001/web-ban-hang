<?php
    session_start();
    $u = $_POST['user'];
    $p = $_POST['pass'];
    $db= mysqli_connect("localhost","root","","demo");
    $sql= "INSERT INTO user VALUES ('','$u','$p','','','','','')";
    $rs = mysqli_query($db,$sql);
    header('Location: login.php');
?>