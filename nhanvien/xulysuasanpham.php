<?php 
    $id = $_GET['id'];

	$mota = isset($_POST['mota'])?$_POST['mota']:'';
	$hang = isset($_POST['hang'])?$_POST['hang']:'';
	$gia = isset($_POST['gia'])?$_POST['gia']:'';
	$soluong = isset($_POST['soluong'])?$_POST['soluong']:'';
    $anh = isset($_POST['anh'])?$_POST['anh']:'';

	include 'uploadfile1.php';

    $sql = "UPDATE `product` SET mota='$mota', hang='$hang', gia='$gia', soluong='$soluong', anh='$anh' WHERE idsanpham='$id'";
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
	header('Location: quan-ly-san-pham.php');
 ?>