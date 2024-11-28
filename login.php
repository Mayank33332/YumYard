<?php
session_start();
    include ("database.inc.php");
    include ("function.php");
    $msg="";

    if (isset($_POST["submit"])) {

        $username=  get_safe_value($_POST['username']);
        $password= get_safe_value($_POST['password']);

        $sql="select * from admin where username='$username'and password='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)> 0){
            $row=mysqli_fetch_array($result);
            $_SESSION['is_login']='yes';
            $_SESSION['Admin_user']=$row['name'];
            redirect('admin-top.php');
        }
        else{   
            $msg='ohh you are wrong brooooo !!';
    }
}
?>

<!-- ===============================================GUI====================================== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login to now</h2>
            <form  method="post">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <div class="input-container">
                        <i class="fas fa-user icon"></i>
                        <input type="text" id="username" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <div class="input-container">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
                <label>new user ?</label><a href="reg.php">click here</a>
                    <div class="msgs"><?php echo $msg ?></div>
                    <style>
                        .msgs{
                            color:red;
                            font-weight: bold;
                            text-transform: capitalize;
                            margin-top: 12px;
                        }
                    </style>
            </form>

        </div>
    </div>
</body>
</html>
