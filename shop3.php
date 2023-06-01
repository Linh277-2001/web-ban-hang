<?php
    require "connect.php";
    require_once "header.php";
?>


    <section id="page-header">
        <h2>#Áo Thun</h2>
        <p>Giảm giá toàn bộ các sản phẩm nhân dịp cuối năm!</p>
    </section>

    <section id="product1" class="section-p1">
    <div class="pro-container">
            <?php
                $sql= "
                SELECT * FROM `product` WHERE loai=3;
                    ";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
            ?>
            <!-- <a href="sproduct.html" > -->
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


<?php
    require_once "footer.php";
?>  