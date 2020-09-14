<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
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
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
 
</head>
<body>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <a href="index3.html" class="brand-link">
     <i class="fas fa-book-open fa-2x" ></i>
      <span class="brand-text font-weight-light" style="font-family: 'Libre Baskerville', serif;"> &nbsp Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            echo "<img class='img-circle profile_img' src='images/".$_SESSION['pic']."'>";?>
        </div>
        <div class="info" style="font-family: 'Libre Baskerville', serif;">
          <a href="#" class="d-block"><?php
            echo "   ".$_SESSION['login_user'];?></a>
        </div>
      </div>

   
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="home.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="nav-icon fa fa-book" aria-hidden="true"></i>
              <p>
                Books
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="books.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                  <p>Books List</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="request.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book Requests</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="issue_info.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue Information</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="expired.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expired List</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="issue_info.php" class="nav-link">
             <i class="nav-icon fas fa-space-shuttle"></i>
              <p>
                Issued
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="feedback.php" class="nav-link">
             <i class="nav-icon fas fa-edit"></i>
              <p>
                Feedback
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="fine.php" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
           <p>
              Fines
              </p>
            </a>
          </li>
      </nav>
  
    </div>
   
  </aside>
 
</body>
</html>