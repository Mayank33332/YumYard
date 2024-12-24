

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
            <form id="frm-login" method="post" >
                <div class="form-group">
                    <label for="email"><i class="fas fa-user"></i> email</label>
                    <div class="input-container">
                        <i class="fas fa-user icon"></i>
                        <input type="email" id="email" name="user_email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <div class="input-container">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="password" name="user_password" required>
                    </div>
                    <div id="email_sucs"></div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
                <label>new user ?</label><a href="reg_user.php">click here</a>

                    <input type="hidden" name="type" value="login"/>
            </form>

        </div>
    </div>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="custom.js"></script>
</body>
</html>
