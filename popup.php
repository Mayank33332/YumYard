<?php
session_start();
$isLoggedIn=false;
$con = mysqli_connect("localhost", "root", "", "yumyard");

if ($con == false) {
    die("error" . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $qry = mysqli_query($con, "SELECT * FROM `register` WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($qry) > 0)
     {
        $isLoggedIn=true;
        $_SESSION['logged_in'] = true;
        header("Location: index.php?ok=good");
        exit();
    } else {
        header("Location: login.php?error=invalid");
        exit();
    }
}
?>
