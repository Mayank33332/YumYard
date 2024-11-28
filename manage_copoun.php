<?php
include("database.inc.php");
include("function.php");
$msg='';
$c_name="";
$c_type="";
$c_value='';
$c_min_value;
$ex_on;
$status;
$id='';

if(isset($_POST["submit"])) {

  $c_name = get_safe_value($_POST['c_name']);
  $c_type = get_safe_value($_POST['c_type']);
  $c_value= get_safe_value($_POST['c_value']);
  $c_min_value=get_safe_value($_POST['c_min_value']);
  $ex_on=get_safe_value($_POST['ex_on']);


  if(mysqli_num_rows(mysqli_query($con,"select * from copoun_code where id='$id'"))> 0) {

    $msg="this copouon alredy  exist";

  }

  else
  {
   
    mysqli_query($con,"insert into copoun_code(c_name,c_type,c_value,c_min_value,ex_on,status)values('$c_name','$c_type','$c_value','$c_min_value','$ex_on','1')");
    redirect("copuon_code.php");
  

  }
  if(isset($_GET['id']) && $_GET['id']>0){
    $id = get_safe_value($_GET['id']);
    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from copoun_code where id='$id'"));
    $c_name=$row['c_name'];
    $c_type=$row['c_type'];
    $c_value=$row['c_value'];
    $c_min_value=$row['c_min_value'];
    $ex_on=$row['ex_on'];

  }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Ordering Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>

        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">Mayank Nathani</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>

          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="catagory.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">catagory</span>
            </a>
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <h1 class="card-title ml10">manage copoune code </h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">copoun code</label>
                      <input type="text" class="form-control" placeholder="c_name" name="c_name" Required>
                      <div style="color:red; margin-top:10px;     text-transform: capitalize;"></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">copoun type</label>
                      <input type="text" class="form-control" placeholder="c_type" name="c_type" Required>
                      <div style="color:red; margin-top:10px;     text-transform: capitalize;"><?php  echo $msg;?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">value</label>
                      <input type="text" class="form-control" placeholder="c_value" name="c_value" Required>
                      <div style="color:red; margin-top:10px;     text-transform: capitalize;"></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">minimum value</label>
                      <input type="text" class="form-control" placeholder="c_min_value" name="c_min_value" Required>
                      <div style="color:red; margin-top:10px;     text-transform: capitalize;"></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">expired on</label>
                      <input type="date" class="form-control" placeholder="ex_on" name="ex_on" Required>
                      <div style="color:red; margin-top:10px;     text-transform: capitalize;"></div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2n" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a
                href="index.php" target="_blank">YumYard</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="assets/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>