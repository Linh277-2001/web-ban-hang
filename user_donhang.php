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
    <section id="cart" class="section-p1">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td>Người mua</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Tổng tiền</td>
                    <td>Ngày đặt</td>
                    <td>Xem chi tiết</td>
                </tr>
            </thead>
            <tbody>
                <?php 
		            $sql = "select * from orders where iduser='$id1' ";
		            $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    
                ?>
                
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['total'] ?>.000 </td>
                    <td><?php $format = "%H:%M:%S %d-%m-%Y";$timestamp = $row['created_time'];echo $strTime = strftime($format, $timestamp )?></td>
                    <td><a style="text-decoration:none" href="donhang.php?id=<?php echo $row['id'] ?>">Xem</a></td>
                </tr>
                <?php 
                   } 
                } 
                ?>
            </tbody>
        </table>
    </section>
        <!--Kết thúc TABLE-->
     
<?php
    require_once "footer.php";
?>