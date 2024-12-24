<?php
include("database.inc.php");
include("function.php");
include('constrant.php');
$msg = '';
$catagory_id = "";
$dish = "";
$dish_dtl = '';
$status;
$id = '';
$img_error='';


if (isset($_POST["submit"])) {
  $catagory_id = get_safe_value($_POST['catagory_id']);
  $dish = get_safe_value($_POST['dish']);
  $dish_dtl = get_safe_value($_POST['dish_dtl']);
  $added_on = date('Y-m-d h:f:s');




  if (mysqli_num_rows(mysqli_query($con, "select * from dish where id='$id'")) > 0) {

    $msg = "this dish alredy  exist";

    // if($id=''){
    //   if($type!='image/jpeg' && $type!='image/png'){
    //     $img_error="please add valid image";
    //   }
    
  }
      else {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], SERVER_DISH_IMAGE . $_FILES['image']['name']);
        mysqli_query($con, "insert into dish(catagory_id,dish,dish_dtl,status,added_on,image)values('$catagory_id','$dish','$dish_dtl','1','$added_on','$image')");
       
        $atrarr=$_POST['attribute'];
        $pricearr=$_POST['price'];
        $did=mysqli_insert_id($con);
    foreach($atrarr as $key=>$val){
      $attribute=$val;
      $price=$pricearr[$key];
      mysqli_query($con,"insert into dish_dtl(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')");
       redirect("dish.php");
    }
    
      }


  
}
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = get_safe_value($_GET['id']);
    $row = mysqli_fetch_assoc(mysqli_query($con, "select * from dish where id='$id'"));
    $catagory_id = $row['catagory_id'];
    $dish = $row['dish'];
    $dish_dtl = $row['dish_dtl'];
    // $image=$row['image'];



  }



$res_cat = mysqli_query($con, "select * from catagory where status='1' order by catagory asc")
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
            <a class="nav-link" href="dashboard.php">
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
            <h1 class="card-title ml10">manage dish </h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">catagory</label>
                      <select class="form-control" name="catagory_id" Required>
                        <option value="">select catagory</option>
                        <?php
                        while ($row_catagory = mysqli_fetch_assoc($res_cat)) {
                          echo " <option value='" . $row_catagory['id'] . "'>" . $row_catagory['catagory'] . "</option>";
                        }
                        ?>
                      </select>
                      <div style="color:red; margin-top:10px;     text-transform: capitalize;"></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">dish</label>
                      <input type="text" class="form-control" placeholder="dish" name="dish" Required>
                      <div style="color:red; margin-top:10px;     text-transform: capitalize;"><?php echo $msg; ?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">dish_dtl</label>
                      <textarea class="form-control" name="dish_dtl" placeholder="dish details"></textarea>
                      <div class="form-group">
                        <label for="exampleInputName1">dish image</label>
                        <input type="file" class="form-control" name="image" placeholder="dish image"></input>
                        <div style="color:red; margin-top:10px;     text-transform: capitalize;"><?php echo $img_error;  ?></div>
                      </div>
                      <div class="form-group" id="dish_bx1">
                      <label for="exampleInputName1">dish details</label>
                        <div class="row">
                      
                          <div class="col-5">
                          <input type="text" class="form-control" placeholder="attribute" name="attribute[]" Required>
                          </div>
                          <div class="col-5 ">
                          <input type="text" class="form-control" placeholder="price" name="price[]" Required>
                          </div>
                        </div>
                            </div>
                        <button type="submit" class="btn btn-primary mr-2n" name="submit">Submit</button>
                        <button type="button" class="btn badge-danger mr-2n" onclick="add_more()">add more</button>

                      
                  </form>
                </div>
              </div>
     
            </div>

          </div>

        </div>
        <input type="hidden" id="add_more" value="1"/>
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


  <script>
    function add_more(){
      var add_more=jQuery('#add_more').val();
      add_more++;
      jQuery('#add_more').val(add_more);
        var dish_box='<div class="row mt8" id="box'+add_more+'"><div class="col-5"><input type="text" class="form-control" placeholder="attribute" name="attribute[]" Required> </div><div class="col-5"><input type="text" class="form-control" placeholder="price" name="price[]" Required></div> <div class="col-2"> <button type="button" class="btn badge-danger mr-2n" onclick=remove_more("'+add_more+'")>remove</button></div </div>'
        jQuery('#dish_bx1').append(dish_box );
    }

    function remove_more(id){
      jQuery('#box'+id).remove();
    }
  </script>
</body>

</html>