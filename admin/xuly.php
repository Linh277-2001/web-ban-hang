<?php 
  require "../connect.php";
    $hieuung1 = isset($_POST['hieuung1'])?$_POST['hieuung1']:'';

    $sql = "UPDATE `hieuung` SET hieuung='$hieuung1' WHERE id=1";
	if ($conn->query($sql)) {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm mới thành công")';
		echo '</script>';
	} else {
		echo '<script type = "text/javascript">';
		echo 'alert("Thêm mới thất bại")';
		echo '</script>';
	}
	header('Location: index.php');
 ?>
