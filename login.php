<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ICDS | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="user-css/login-signup.css">
</head>

<body>
    <div class="container login-container">
        <div class="login-left-container">
            <form class="container frm-login" id="frmLogin">
                <h1>Sign in</h1>
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter your email here ..." name="username" id="username" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter your password here ..." class="input-password" name="password" id="password" required>
                    <button type="button" id="showPassword"><i class="fa-regular fa-eye"></i></button>
                </div>
                <center class="btn-submit-container">
                    <button type="submit" class="btn" id="btnLogin">Log in</button>
                    <p class="dont-have-account">Doesn’t have account? <a href="signup.php">Sign up</a></p>
                </center>
            </form>
        </div>
        <div class="login-right-container">
            <img src="global-assets/assets-used-in-web/blog1.png">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
    <script src="user-js/login-sign-up.js"></script>
</body>

</html>