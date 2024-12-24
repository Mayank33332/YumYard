<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register- YumYard</title>
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>



    <div class="register-container">
        <div class="register-form">
            <h2>Register now</h2>
            <form  method="post" id="frm-reg">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <div class="input-container">
                        <i class="fas fa-user icon"></i>
                        <input type="text" id="username" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="email" name="email" required>
                       
                    </div>
                    <div id="email_err"></div>
                </div>
                <div class="form-group">
                    <label for="mobile"><i class="fas fa-mobile"></i> mobile</label>
                    <div class="input-container">
                        <i class="fas fa-mobile icon"></i>
                        <input type="text" id="mobile" name="mobile" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <div class="input-container">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div id="email_sucs"></div> 
                </div>
                <div class="form-group">
                    <button type="submit" name="submit"><i class="fas fa-user-plus"></i> Register</button>
                </div>
                <label>already have account ?</label><a href="login_user.php">click here</a>
                <input type="hidden" name="type" value="register">
            </form>
        </div>
       
    </div>
        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <script src="custom.js"></script>

</body>

</html>