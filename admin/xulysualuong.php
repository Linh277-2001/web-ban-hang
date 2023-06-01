<?php 
    $id = $_GET['id'];

	$luong = isset($_POST['luong'])?$_POST['luong']:'';


    $sql = "UPDATE `nhanvien` SET luong='$luong' WHERE id='$id'";
	include '../connect.php';
	if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Sửa thành công")';
		echo '</script>';
	} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Sửa thất bại")';
		echo '</script>';
	}
	header('Location: quan-ly-luong.php');
 ?>