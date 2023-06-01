<?php
    require "connect.php";
    require_once "header.php";
?>

    <section id="hero">
        <h2>Ưu đãi siêu giá trị</h2>
        <h1>Tất cả các sản phẩm</h1>
        <p>Tiết kiệm hơn với phiếu giảm giá và giảm giá tới 50%</p>
        <button>Mua sắm ngay</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Miễn phí vận chuyển</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Giao hàng nhanh chóng</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Tiết kiệm</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Khuyến mãi</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Thoải mái mua sắm</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>Hỗ trợ 24/7</h6>
        </div>

    </section>

    <section id="product1" class="section-p1">
        <h2>Sản phẩm nổi bật</h2>
        <p>Bộ sưu tập hè thu</p>
        <div class="pro-container">
            <?php
                $sql= "
                    SELECT * FROM product
                    ORDER BY idsanpham DESC
                    LIMIT 0,8
                    ";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="pro">
                <a href="sproduct.php?id=<?php echo $row['idsanpham'] ?>" >
                <img src="img/products/<?php echo $row['anh'] ?>" alt="">
                </a>
                <div class="des">
                    <span><?php echo $row['hang'] ?></span>
                    <h5><?php echo $row['mota'] ?></h5>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h4><?php echo $row['gia'] ?>.000 VND</h4>
                </div>
                    <form method="POST" action="cart.php?action=add">
                    <input type="number" name="quantity[<?php echo $row['idsanpham']?>]"  value="1" style="display:none">
                    <input type="submit" value="Mua ngay" style="width: 97px;color: #fff;height: 30px;border: 3px;text-align: center;background-color: #088178;border-radius: 15px;font-size: 16px;cursor:pointer; margin-bottom: 9px"/>
                    </form>
            </div>

            <?php
                }
            ?>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h2>Giảm tới <span>50%</span> - Tất cả áo thun & phụ kiện </h2>
        <button class="normal">Thông tin chi tiết</button>
    </section>

    <section id="product1" class="section-p1">
        <h2>Hàng mới về</h2>
        <p>Bộ sưu tập cao cấp</p>
        <div class="pro-container">
        <?php
                $sql= "
                    SELECT * FROM product
                    where loai =2
                    LIMIT 0,8
                    
                    ";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="pro">
                <a href="sproduct.php?id=<?php echo $row['idsanpham'] ?>" >
                    <img src="img/products/<?php echo $row['anh'] ?>" alt="">
                </a>
                <div class="des">
                    <span><?php echo $row['hang'] ?></span>
                    <h5><?php echo $row['mota'] ?></h5>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h4><?php echo $row['gia'] ?>.000 VND</h4>
                </div>
                    <form method="POST" action="cart.php?action=add">
                    <input type="number" name="quantity[<?php echo $row['idsanpham']?>]"  value="1" style="display:none">
                    <input type="submit" value="Mua ngay" style="width: 97px;color: #fff;height: 30px;border: 3px;text-align: center;background-color: #088178;border-radius: 15px;font-size: 16px;cursor:pointer; margin-bottom: 9px"/>
                    </form>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>Ưu đãi cuối năm</h2>
            <h3>Giảm giá đến 50% </h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>Bộ sưu tập mới</h2>
            <h3>Đông - xuân 2022</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>Phong cách</h2>
            <h3>Xu hướng thời trang 2023</h3>
        </div>
    </section>



    <!--====HIỆU ỨNG 1-->

<?php
$hieuung= 0;
      $sql= "select * from `hieuung` ";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    
      $hieuung = $row['hieuung'];
  // var_dump($hieuung);
  // exit;
  }
?>

<?php
if($hieuung==2){
  require_once "admin/mairoi.php";
}
    
?>

<!--====HIỆU ỨNG 1-->
<!--====HIỆU ỨNG 2-->
<?php
  if($hieuung==3){
    require_once "admin/phaohoa.php";
  }
?>


<!--====HIỆU ỨNG 2-->

<?php
    require_once "footer.php";
?>