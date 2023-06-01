// Giỏ hàng okee đã lưu vào DB và chuyển trang thanh toán
<?php
    session_start();
    require "connect.php";
    $u= $_SESSION['username'];
$sql= "select * from admin where username = '$u' ";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $id1= $row['idadmin'];
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
    <title>Giỏ hàng</title>
    <script src="https://kit.fontawesome.com/b8b512a770.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php  // Bắt đầu php 1
    if(!isset($_SESSION['cart'])){   //Nếu giỏ hàng trống thì đặt SESION rỗng
        $_SESSION['cart']= array();
    }
    $error = false;
    $success = false;
    if (isset($_GET['action'])) {
        function update_cart($add = false) {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$id]);
                } else {
                    if ($add) {
                        $_SESSION["cart"][$id] += $quantity;
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                    }
                }
            }
        }

        switch ($_GET['action']) {
            case "add":
                update_cart(true);
                header('Location: ./cart.php');
                break;
            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION["cart"][$_GET['id']]);
                }
                header('Location: ./cart.php');
                break;
            case "submit":
                if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
                    update_cart();
                    header('Location: ./cart.php');
                } elseif ($_POST['order_click']) { //Đặt hàng sản phẩm
                    if (empty($_POST['name'])) {
                        $error = "Bạn chưa nhập tên của người nhận";
                    } elseif (empty($_POST['phone'])) {
                        $error = "Bạn chưa nhập số điện thoại người nhận";
                    } elseif (empty($_POST['address'])) {
                        $error = "Bạn chưa nhập địa chỉ người nhận";
                    } elseif (empty($_POST['quantity'])) {
                        $error = "Giỏ hàng rỗng";
                    }
                    if ($error == false && !empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                        $products = mysqli_query($conn, "SELECT * FROM `product` WHERE `idsanpham` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                        $total = 0;
                        $orderProducts = array();
                        while ($row = mysqli_fetch_array($products)) {
                            $orderProducts[] = $row;
                            $total += $row['gia'] * $_POST['quantity'][$row['idsanpham']];
                        }
                        $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . time() . "', '" . time() . "');");
                        $orderID = $conn->insert_id;
                        $insertString = "";
                        foreach ($orderProducts as $key => $product) {
                            $insertString .= "(NULL, '" . $orderID . "', '" . $product['idsanpham'] . "', '" . $_POST['quantity'][$product['idsanpham']] . "', '" . $product['gia'] . "', '" . time() . "', '" . time() . "')";
                            if ($key != count($orderProducts) - 1) {
                                $insertString .= ",";
                            }
                        }
                        $insertOrder = mysqli_query($conn, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
                        $success = "Đặt hàng thành công";
                        header('Location: vnpay_php/index.php?price='.$total*1000); 
                        unset($_SESSION['cart']);
                    }
                }
            break;
        }
    }
    if(!empty($_SESSION['cart'])){   //Nếu giỏ hàng không trống thì liệt kê các sản phẩm ra
        $sql = "SELECT * FROM `product` WHERE `idsanpham` IN (".implode(",",array_keys($_SESSION['cart'])).")";
		$products = $conn->query($sql);
    }
    ?>  
    <!-- Kết thúc php 1 -->
    <section id="header">
        <a href="#"><img src="img/xinhstore.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="#">Áo sơ mi</a></li>
                <li><a href="#">Quần short</a></li>
                <li><a href="#">Áo thun</a></li>
                <li><a href="#">Bộ sưu tập</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li id="lg-bag"><a class="active" href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                <a href="#" id="close"><i class="fa-sharp fa-solid fa-xmark"></i></a>
                <li id="lg-login"><a  href="login.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
        <div id="mobile">
            <a  href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <i  id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>

    <!--BODY CỦA TRANG-->
    <!--Bắt đầu FORM-->
    <form id="cart-form" action="cart.php?action=submit" method="POST">
    <section id="cart" class="section-p1">
        <table style="width: 100% ;">
            <thead>
                <tr>
                    <td>Xóa</td>
                    <td>Ảnh</td>
                    <td>Sản phẩm</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Tổng</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $tong=0;
                    if(isset($products)){
                        while($row = mysqli_fetch_array($products)){
                    
                ?>
                
                <tr>
                    <td><a href="cart.php?action=delete&id=<?php echo $row['idsanpham']?>"><i class="fa-regular fa-circle-xmark"></i></a></td>
                    <td><img src="img/products/<?php echo $row['anh'] ?>" alt=""></td>
                    <td><?php echo $row['mota'] ?></td>
                    <td><?php echo $row['gia'] ?>.000 VND</td>
                    <td><input name="quantity[<?php echo $row['idsanpham']?>]" type="number" min="0" value="<?php echo $_SESSION['cart'][$row['idsanpham']] ?>"></td>
                    <td><?php echo $row['gia'] * $_SESSION['cart'][$row['idsanpham']] ?>.000 VND</td>
                </tr>
                <?php 
                    $tong += $row['gia'] * $_SESSION['cart'][$row['idsanpham']]; } 
                } 
                ?>
            </tbody>
        </table>
    </section>
        <!--Kết thúc TABLE-->
        <!-- <input type="submit" name="update_click" value="Cập nhật" /> -->

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Thông tin người nhận</h3>
            <div>
                <div style="margin: 6px 0;"><label>Người nhận: </label><input type="text" value="" name="name" required/></div>
                <div style="margin: 6px 0;"><label style="padding-right: 13px;">Điện thoại: </label><input type="text" value="" name="phone" required/></div>
                <div style="margin: 6px 0;"><label style="padding-right: 36px;">Địa chỉ: </label ><input type="text" value="" name="address" required/></div>
                <div style="margin: 6px 0;"><label style="padding-right: 30px;">Ghi chú: </label><textarea name="note" cols="50" rows="7" ></textarea></div>
            </div>
        </div>
        <div id="subtotal">
            <h3>Chi tiết</h3>
            <table>
                <tr>
                    <td>Tổng </td>
                    <td><?php echo $tong?>.000 VND</td>
                </tr>
                <tr>
                    <td>Phí Ship</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Tổng cộng</strong></td>
                    <td><strong><?php echo $tong?>.000 VND</strong></td>
                </tr>
            </table>
            <input style="height: 40px;width: 100px;background-color: #088178;border: none;
                 border-radius: 4px;font-weight: 600;color: #fff; cursor:pointer" type="submit" name="order_click" value="Đặt hàng"/>
        </div>
    </section>    
            
    </form>       
    
<?php
    require_once "footer.php";
?>