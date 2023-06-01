<?php 
	$username = isset($_POST['username'])?$_POST['username']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';
	$ten = isset($_POST['ten'])?$_POST['ten']:'';
    $diachi = isset($_POST['diachi'])?$_POST['diachi']:'';
    $sdt = isset($_POST['sdt'])?$_POST['sdt']:'';
    $ngaysinh = isset($_POST['ngaysinh'])?$_POST['ngaysinh']:'';
    $gioitinh = isset($_POST['gioitinh'])?$_POST['gioitinh']:'';
    $chucvu = isset($_POST['chucvu'])?$_POST['chucvu']:'';
    $anh = isset($_POST['anh'])?$_POST['anh']:'';
	$luong = isset($_POST['luong'])?$_POST['luong']:'';

	include 'uploadfile.php';

	$sql = "insert into nhanvien values (null, '$username', '$password', '$ten', '$diachi',
     '$sdt', '$ngaysinh', '$gioitinh', '$chucvu', '$anh', '$luong')";
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
	header('Location: quan-ly-nhan-vien.php');
 ?>