<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
}
?>
<?php
  $doanhthu = 0;
  $sanpham = 0;
  $donhang = 0;
  $khach = 0;
  require "../connect.php";
  $sql= "select * from `orders` ";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $doanhthu += $row['total'];
  }
  $sql= "select * from `product` ";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if($row['idsanpham']>0){
      $sanpham += 1;
    }
  }
  $sql= "select * from `orders` ";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if($row['id']>0){
      $donhang += 1;
    }
  }
  $sql= "select * from `user` ";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if($row['idkhach']>0){
      $khach += 1;
    }
  }
  //Hiệu ứng
  // $sql= "select * from `hieuung` ";
  // $result = $conn->query($sql);
  // while ($row = $result->fetch_assoc()) {
    
  //     $hieuung = $row['hieuung'];
  // var_dump($hieuung);
  // exit;
  // }

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bảng điều khiển | Quản trị Admin</title>
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
      <li><a class="app-nav__item" href="logout.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

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
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--Left-->
      <div class="col-md-12">
        <div class="row">
       <!-- col-6 -->
       <div class="col-md-3">
            <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
              <div class="info">
                <h4>Doanh thu</h4>
                <p><b><?php echo $doanhthu?>.000 đ</b></p>
                <p class="info-tong">Doanh thu của toàn bộ cửa hàng</p>
              </div>
            </div>
          </div>

       <!-- col-6 -->
          <div class="col-md-3">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <h4>Tổng sản phẩm</h4>
                <p><b><?php echo $sanpham?> sản phẩm</b></p>
                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-3">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <h4>Tổng đơn hàng</h4>
                <p><b><?php echo $donhang?> đơn hàng</b></p>
                <p class="info-tong">Tổng số đơn bán được</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-3">
            <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
              <div class="info">
                <h4>Tổng khách hàng</h4>
                <p><b><?php echo $khach?> khách hàng</b></p>
              <p class="info-tong">Tổng số khách hàng được quản lý.</p>
            </div>
            </div>
          </div>

            </div>
           </div>

        </div>
      </div>
      </div>
    </div>


    <div class="text-center" style="font-size: 13px">
      <p><b>
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> Quản trị Admin XinhStore.
        </b></p>
    </div>
  </main>
  <script src="js/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <!--===============================================================================================-->
  <script src="js/plugins/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="js/plugins/chart.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>


<!--====HIỆU ỨNG 1-->
<?php
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
  require_once "mairoi.php";
}
    
?>

<!--====HIỆU ỨNG 1-->
<!--====HIỆU ỨNG 2-->
<?php
  if($hieuung==3){
    require_once "phaohoa.php";
  }
?>


<!--====HIỆU ỨNG 2-->

</body>

</html>