<?php
    session_start();
    require "connect.php";
    $u= $_SESSION['username'];
$sql= "select * from user where username = '$u' ";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $id1= $row['idkhach'];
    // var_dump($id1);
    // exit;
}
?>
<?php
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <script src="https://kit.fontawesome.com/b8b512a770.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="img/xinhstore.png" class="logo" alt=""></a>
        <form class="input-search" method="post" action="timkiem.php">
                    <div class="autocomplete">
                        <input style="float: left;padding-left: 7px;height: 35px; border-radius: 11px; border-color: black;" id="search-box" name="search" autocomplete="off" type="text" placeholder="Nhập từ khóa">
                        <button style="float: left;margin-left: 3px;padding: 0 3px;height: 33px; border-radius: 11px; border-color: black;" type="submit">
                            <i class="fa fa-search"></i>Tìm
                        </button>
                    </div>
        </form> <!-- End Form search1 -->

        <div>
            <ul id="navbar">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="shop1.php">Áo sơ mi</a></li>
                <li><a href="shop2.php">Quần short</a></li>
                <li><a href="shop3.php">Áo thun</a></li>
                <li><a href="shop4.php">Bộ sưu tập</a></li>
                <li><a href="gioithieu.php">Giới thiệu</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                <a href="#" id="close"><i class="fa-sharp fa-solid fa-xmark"></i></a>
                <li id="lg-login"><a href="login.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>

    <!--Ảnh của trang -->
    <section id="page-header" class="about-header">
    </section>

    <!--Viết thêm -->
        <a href="user_thongtin.php" style="text-decoration:none;color:black">
            <div style="width:49.5%; height: 50px;cursor:pointer; background-color:#ccc  ; display: inline-block;"><div style="text-align:center;padding: 2% 0;">THÔNG TIN CÁ NHÂN</div></div>
        </a>
        <a href="user_donhang.php" style="text-decoration:none;color:black">
            <div style="width:50%; height: 50px;cursor:pointer; background-color:#ccc ;display: inline-block;"><div style="text-align:center;padding: 2% 0;">ĐƠN HÀNG ĐÃ MUA</div></div>
        </a>
    <!--BODY CỦA TRANG-->
	<div class="container" style="margin-top:15px">
		<div class="row">
			<div class="col-sm-6 offset-sm-3">
            <?php
		$sql = "select * from user where idkhach='$id1'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
            ?>
				<form action="user_suathongtin.php?id=<?php echo $row['idkhach'] ?>" method="POST" enctype="multipart/form-data">
					<fieldset class="form-group">
						<label>Họ tên</label>
						<input value="<?php echo $row['ten'] ?>" name="ten" type="text" class="form-control" placeholder="Nhập họ tên" >
					</fieldset>
                    <fieldset class="form-group">
						<label>Ngày sinh</label>
						<input value="<?php echo $row['ngaysinh'] ?>" name="ngaysinh" type="date" class="form-control" placeholder="Nhập ngày sinh">
					</fieldset>
          			<fieldset class="form-group">
						<label>Số điện thoại</label>
						<input value="<?php echo $row['sdt'] ?>" name="sdt" type="number" class="form-control" placeholder="Nhập số điện thoại">
					</fieldset>
          			<fieldset class="form-group">
						<label>Địa chỉ</label>
						<input value="<?php echo $row['diachi'] ?>" name="diachi" type="text" class="form-control" placeholder="Nhập địa chỉ">
					</fieldset>
					<button style="margin: 12px 250px" type="submit" class="btn btn-secondary">Cập nhật</button>
				</form>
                <?php
    }
}
?>
			</div>
		</div>
	</div>
    <a href="logout.php"><button style="margin: 0 0 0 91%" type="submit" class="btn btn-danger">Đăng xuất</button></a>
     
<?php
    require_once "footer.php";
?>