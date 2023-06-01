<?php 
    $id = $_GET['id'];

	$ten = isset($_POST['ten'])?$_POST['ten']:'';
	$ngaysinh = isset($_POST['ngaysinh'])?$_POST['ngaysinh']:'';
    $sdt = isset($_POST['sdt'])?$_POST['sdt']:'';
    $diachi = isset($_POST['diachi'])?$_POST['diachi']:'';

    $sql = "UPDATE `user` SET ten='$ten', ngaysinh='$ngaysinh', sdt='$sdt', diachi='$diachi' WHERE idkhach='$id'";
	include 'connect.php';
	if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm mới thành công")';
		echo '</script>';
	} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm mới thất bại")';
		echo '</script>';
	}
	header('Location: user_thongtin.php');
 ?>