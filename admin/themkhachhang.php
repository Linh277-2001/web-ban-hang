<?php 
	$username = isset($_POST['username'])?$_POST['username']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';
	$ten = isset($_POST['ten'])?$_POST['ten']:'';
    $diachi = isset($_POST['diachi'])?$_POST['diachi']:'';
    $sdt = isset($_POST['sdt'])?$_POST['sdt']:'';
    $ngaysinh = isset($_POST['ngaysinh'])?$_POST['ngaysinh']:'';
    $gioitinh = isset($_POST['gioitinh'])?$_POST['gioitinh']:'';

	include 'uploadfile.php';

	$sql = "insert into user values (null, '$username', '$password', '$ten', '$ngaysinh',
     '$sdt', '$diachi', '$gioitinh')";
	include '../connect.php';
	if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm mới thành công")';
		echo '</script>';
	} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm mới thất bại")';
		echo '</script>';
	}
	header('Location: quan-ly-khach-hang.php');
 ?>