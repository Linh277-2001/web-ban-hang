<?php
    require "connect.php";
    require_once "header.php";
    $idsp = $_GET['id'];
?>

<?php
		$sql = "select * from product where idsanpham='$idsp'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
 ?>
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="img/products/<?php echo $row['anh'] ?>" width="100%" id="MainImg" alt="">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="img/products/<?php echo $row['anh'] ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/<?php echo $row['anh'] ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/<?php echo $row['anh'] ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/<?php echo $row['anh'] ?>" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        <div class="single-pro-details">
            <h4><?php echo $row['mota'] ?></h4>
            <h2><?php echo $row['gia'] ?>.000 VND</h2>

            <form method="POST" action="cart.php?action=add">
                <input type="number" name="quantity[<?php echo $row['idsanpham']?>]" id="" min="1" value="1">
                <br>
                 <input type="submit" value="MUA" style="width: 100px;margin-top: 10px;color: #fff;height: 36px;border: 3px;text-align: center;background-color: #088178;border-radius: 15px;font-size: 16px;"/>
            </form>
            
            <h4>Mô tả: </h4><?php echo $row['thongtin'] ?> 
            <br><h4>Chi tiết sản phẩm:</h4><br> Nguồn gốc: Hermes <br> Xuất sứ: Hoa Kì <br> Chất liệu: Cotton</span>
        </div>
    </section>

	<?php
	 }
    }
	?>   

    <section id="product1" class="section-p1">
        <h2>Sản phẩm bán chạy</h2>
        <p>Giảm giá lên đến 20% cho mỗi sản phẩm</p>
        <div class="pro-container">
        <?php
                $sql= "
                    SELECT * FROM product
                    ORDER BY idsanpham ASC
                    LIMIT 0,4
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
    <script>
        var mainImg = document.getElementById('MainImg');
        var smallImg = document.getElementsByClassName('small-img');

        smallImg[0].onclick = function () {
            mainImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function () {
            mainImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function () {
            mainImg.src = smallImg[2].src;
        }
        smallImg[3].onclick = function () {
            mainImg.src = smallImg[3].src;
        }
    </script>

    <script src="script.js"></script>

<?php
    require_once "footer.php";
?>