<?php 
	$mota = isset($_POST['mota'])?$_POST['mota']:'';
	$hang = isset($_POST['hang'])?$_POST['hang']:'';
	$gia = isset($_POST['gia'])?$_POST['gia']:'';
    $anh = isset($_POST['anh'])?$_POST['anh']:'';

	include 'uploadfile1.php';

	$sql = "insert into product values (null, '$anh', '$hang', '$mota', '$gia')";
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
	header('Location: quan-ly-san-pham.php');
 ?>