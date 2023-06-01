<?php session_start(); 
 if (isset($_SESSION['nhanvien'])){
    unset($_SESSION['nhanvien']); 
    header('Location: login.php');
}
?>