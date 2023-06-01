<?php 
    $id = $_GET['id'];

	$name = isset($_POST['name'])?$_POST['name']:'';
	$phone = isset($_POST['phone'])?$_POST['phone']:'';
	$address = isset($_POST['address'])?$_POST['address']:'';
    $total = isset($_POST['total'])?$_POST['total']:'';

    $sql = "UPDATE `orders` SET name='$name', phone='$phone', address='$address', total='$total' WHERE id='$id'";
	include '../connect.php';
	if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Sửa mới thành công")';
		echo '</script>';
	} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Sửa mới thất bại")';
		echo '</script>';
	}
	header('Location: quan-ly-don-hang.php');
 ?>