<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
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