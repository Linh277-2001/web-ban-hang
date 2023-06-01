<?php
    require "connect.php";
    require_once "header.php";
    $tim=$_POST['search'];

?>

    <h3 style="text-align: center;margin:20px 0 0 0">Từ khóa tìm kiếm: <?php echo $tim ?></h3>

    <section id="product1" class="section-p1">
    <div class="pro-container">
            <?php
                $sql= "
                SELECT * FROM `product` WHERE mota LIKE '%$tim%' ORDER BY idsanpham ASC;
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
                <a href="#" class="cart"><i class="fa-solid fa-bag-shopping"></i></a>
            </div>
            <!-- </a> -->

            <?php
                }
            ?>
        </div>
    </section>

<?php
    require_once "footer.php";
?>  