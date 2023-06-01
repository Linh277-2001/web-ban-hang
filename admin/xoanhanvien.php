<?php
include_once('../connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM nhanvien WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: quan-ly-nhan-vien.php');
} else {
echo "Error updating record: ";
}
$conn->close();
}
?>