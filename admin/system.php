
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hệ thống | Quản trị Admin</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

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


  <!-- hIEU UNG-->
  <form class="conterner" style="margin: 100px 400px" action="xuly.php" method="post">
					<fieldset class="form-group">
						<label for="exampleSelect1">Chọn hiệu ứng</label>
						<select name="hieuung1" class="form-control" id="eexampleSelect11">
            <?php
              if(isset($_POST['hieuung1'])){
                if($_POST['hieuung1'] == '2'){
                  echo '<option value="1">Không có</option>';
                 echo  '<option value="2" selected >Mai rơi</option>';
                 echo '<option value="Nhóm 3">Pháo hoa</option>';
                }else if ($_POST['hieuung1'] == '3') {
                  echo '<option value="1">Không có</option>';
                 echo  '<option value="2"  >Mai rơi</option>';
                 echo '<option value="3" selected>Pháo hoa</option>';
                }
                else{
                  echo '<option value="1" selected>Không có</option>';
                  echo  '<option value="2"  >Mai rơi</option>';
                  echo '<option value="3">Pháo hoa</option>';
                }
              }else{
                echo '<option value="1">Không có</option>';
                echo  '<option value="2" >Mai rơi</option>';
                echo '<option value="3">Pháo hoa</option>';
              }
              ?>
						</select>
					</fieldset>
					<button type="submit" class="btn btn-outline-primary" style="margin: 10px 240px; width: 90px">Cập nhật</button>
</form>


</body>

</html>