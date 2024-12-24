<?php
include("database.inc.php");
include("function.php");
include("constrant.php");
$sql = "select dish. *,catagory.catagory from dish,catagory where dish.catagory_id=catagory.id order by dish";
$res = mysqli_query($con, $sql);



if (isset($_GET['type']) && ($_GET['type'] != '') && isset($_GET['id']) && ($_GET['id'] > 0)) {
    $type = get_safe_value($_GET['type']);
    $id = get_safe_value($_GET['id']);
    if ($type == 'delete') {
        mysqli_query($con, "delete from dish where id='$id'");
        redirect("dish.php");
    }

    if ($type == 'active' || ($type == 'deactive')) {
        $status = 1;
        if ($type == 'deactive') {
            $status = 0;
        }
        mysqli_query($con, "update dish set status='$status'  where id='$id'");
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
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="catagory.css">
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
                    <h1>YumYard</h1>
                </div>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <span class="nav-profile-name">Mayank Nathani</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
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
            <!-- partial:partials/_sidebar.html -->
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
                            <span class="menu-title">Catagory</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">user</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="del_boy.php">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">delivery boy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="copuon_code.php">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">copuon code</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dish.php">
                            <i class="mdi mdi-view-headline menu-icon"></i>
                            <span class="menu-title">Dish</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">dish master</h1>
                            <a href="manage_dish.php" class="h2">Add dish</a>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th width="10%">S No</th>
                                                    <th width="15%">category</th>
                                                    <th width="20%">dish</th>
                                                    <th width="15%">image</th>
                                                    <th width="15%">added on</th>
                                                    <th width="30%">actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (mysqli_num_rows($res) > 0) {
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $row['catagory'] ?></td>
                                                            <td><?php echo $row['dish'] ?></td>
                                                            <td><img src="<?php echo SITE_DISH_IMAGE.$row['image'] ; ?>" alt="Dish Image" />
                                                    </td>
                                                            <td><?php
                                                            $dtrstr = strtotime($row['added_on']);
                                                            echo date('d-m-y', $dtrstr); ?></td>
                                                            <td>

                                                                <a href="manage_dish.php?id=<?php echo $row['id'] ?>"><label
                                                                        class="badge badge-success p12 cursor">Edit</label></a>
                                                                &nbsp;
                                                                <?php
                                                                if ($row['status'] == 1) { ?>
                                                                    <a href="?id=<?php echo $row['id'] ?> &type=deactive"><label
                                                                            class="badge badge-success p12 cursor">active</label></a>
                                                                <?php } else {


                                                                    ?>
                                                                    <a href="?id=<?php echo $row['id'] ?> &type=active"><label
                                                                            class="badge badge-danger p12 cursor">deactive</label></a>
                                                                    <?php
                                                                }
                                                                ?>


                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <?php

                                                        $i++;
                                                    }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">no data found</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a
                                href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    -- container-scroller -->

    <!-- plugins:js -->
    <script src="assets/js/vendor.bundle.base.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap4.js"></script>
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
    <script src="assets/js/data-table.js"></script>
    <!-- End custom js for this page-->
</body>

</html>