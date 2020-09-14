<?php include "connection.php";
      
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .backorg
    {
      background-color: orange;
      opacity: 0.9;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "topbar.php" ?>
  <!-- /.navbar -->
  <?php include "sidebar.php" ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="backorg">
            <div class="small-box">
              <div class="inner">
                <h3 style="color: white;">
                  <?php 
                  $query="SELECT SUM(quantity) as `sumquantity` FROM books ";
                  $res=mysqli_query($db,$query);
                $c1=mysqli_fetch_array($res);
                        $var='<p style="color:yellow; background-color:green;">RETURNED</p>';
                        $query1="SELECT COUNT(approve) as `sum1` FROM issue_book WHERE approve!='$var' ";
                        $res1=mysqli_query($db,$query1);
                $c2=mysqli_fetch_array($res1);
                $ans=$c1['sumquantity']+$c2['sum1'];
                echo $ans;
                         ?>
                </h3>

                <p style="color: white;">Books</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="books.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <h3><?php 
                  $query2="SELECT count(username) as `cnt` FROM student ";
                  $res2=mysqli_query($db,$query2);
                $c2=mysqli_fetch_array($res2);
                  echo $c2['cnt'];
                  ?>
                </h3>

                <p>Members</p>
              </div>
              <div class="icon">
               <i class="fa fa-users" aria-hidden="true"></i>
                              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>44</h3>

                <p>Newspapers</p>
              </div>
              <div class="icon">
               <i class="far fa-newspaper"></i>
            
              
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>65</h3>

                <p>Magazines</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-archive"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
          <br><br>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa  fa-space-shuttle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Issued</span>
              <span class="info-box-number"><?php 
                        $query3="SELECT COUNT(approve) as `sum2` FROM issue_book WHERE approve!=' ' ";
                        $res3=mysqli_query($db,$query3);
                $c3=mysqli_fetch_array($res3);
                echo $c3['sum2'];
                         ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Returned</span>
              <span class="info-box-number"><?php 
                        $var3='<p style="color:yellow; background-color:green;">RETURNED</p>';
                        $query4="SELECT COUNT(approve) as `sum4` FROM issue_book WHERE approve='$var3' ";
                        $res4=mysqli_query($db,$query4);
                $c4=mysqli_fetch_array($res4);
                echo $c4['sum4'];
                         ?></span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Not Returned And Expired</span>
              <span class="info-box-number"><?php 
                        $var4='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                        $query5="SELECT COUNT(approve) as `sum5` FROM issue_book WHERE approve='$var4' ";
                        $res5=mysqli_query($db,$query5);
                $c5=mysqli_fetch_array($res5);
                echo $c5['sum5'];
                         ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fas fa-calendar-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Date Today</span>
              <span class="info-box-number"><?php echo date("d/m/Y"); ?></span>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <section class="col-lg connectedSortable" style="font-family: 'Balsamiq Sans', cursive;">
          <?php include "todolist.php"; ?>
      
          </section>
          
        </div>
      </div>
    </section>  
  </div>
 <footer class="main-footer d-flex justify-content-center">
    <strong >Contact Us <a href="#">hebah.library@gmail.com</a>.</strong>
    All rights reserved.
      </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>
