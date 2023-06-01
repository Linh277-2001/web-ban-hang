<?php 
$id = $_GET['id'];
include '../connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sửa nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script>

    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function () {
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function () {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function () {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
  </script>
</head>

<body class="app sidebar-mini rtl">
  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="../index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user">
      <div>
        <p class="app-sidebar__user-name"><b>Linh</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <?php
        require_once "navbar.php";
      ?>
    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="quan-ly-nhan-vien.php">Danh sách nhân viên</a></li>
        <li class="breadcrumb-item">Sửa nhân viên</li>
      </ul>
    </div>

      <h3 class="tile-title">Sửa nhân viên</h3>
      <div class="div" style="margin: 0 24%;">
      <?php
		$sql = "select * from nhanvien where id='$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
            ?>
      <form action="xulysuanhanvien.php?id=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">
					<fieldset class="form-group">
						<label>Username</label>
						<input value="<?php echo $row['username'] ?>" name="username" id="username" type="text" class="form-control" placeholder="Nhập username" >
					</fieldset>
					<fieldset class="form-group">
						<label>Mật khẩu</label>
						<input value="<?php echo $row['password'] ?>" name="password" id="password" type="password" class="form-control" placeholder="Nhập password" >
					</fieldset>
          			<fieldset class="form-group">
						<label>Họ và tên</label>
						<input value="<?php echo $row['ten'] ?>" name="ten" type="text" id="ten" class="form-control" placeholder="Nhập họ tên" >
					</fieldset>
          			<fieldset class="form-group">
						<label>Địa chỉ</label>
						<input value="<?php echo $row['diachi'] ?>" name="diachi" id="diachi" type="text" class="form-control" placeholder="Nhập địa chỉ" >
					</fieldset>
          <fieldset class="form-group">
						<label>Số điện thoại</label>
						<input value="<?php echo $row['sdt'] ?>" name="sdt" id="sdt" type="number" class="form-control" placeholder="Nhập số điện thoại" >
					</fieldset>

          <fieldset class="form-group">
						<label>Ngày sinh</label>
						<input value="<?php echo $row['ngaysinh'] ?>" name="ngaysinh" id="ngaysinh" type="date" class="form-control" placeholder="Nhập ngày sinh" >
					</fieldset>
					<fieldset class="form-group">
						<label for="exampleSelect1">Giới tính</label>
						<select name="gioitinh" class="form-control">
							<option value="Nam">Nam</option>
							<option value="Nữ">Nữ</option>
						</select>
					</fieldset>
					<fieldset class="form-group">
						<label for="exampleSelect1">Chức vụ</label>
						<select name="chucvu" class="form-control" >
							<option value="Bán hàng">Bán hàng</option>
							<option value="Thu ngân">Thu ngân</option>
                            <option value="Kế toán">Kế toán</option>
                            <option value="Tư vấn">Tư vấn</option>
						</select>
					</fieldset>
          <fieldset class="form-group">
						<label>Tiền lương</label>
						<input value="<?php echo $row['luong'] ?>" name="luong" id="luong" type="number" class="form-control" placeholder="Nhập lương" >
					</fieldset>

  				<fieldset class="form-group">
						<label for="exampleInputFile">Ảnh thẻ</label>
						<input name="fileToUpload" type="file" class="form-control-file" id="anh">
					</fieldset>
					<button style="margin: 12px 260px" type="submit" id="add" class="btn btn-outline-primary">Sửa nhân viên</button>
				</form>
                <?php
                   }
                 }
                ?>
      </div>
          
  </main>



  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>

</body>

</html>