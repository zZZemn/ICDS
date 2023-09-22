<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Store Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../global-assets/css/login.css" rel="stylesheet">
</head>

<body class="">
    <div class="container d-flex justify-content-center">
        <div class="alert-inc-pass position-absolute mt-3 alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <i class="fa-solid fa-circle-exclamation"></i>
            </svg>
            <div>
                Incorrect Username or Password
            </div>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <form class="login-form container bg-light p-5" id="login-form">
            <center class="text-dark">ICDS</center>
            <div class="input-container mt-4">
                <input type="text" required class="form-control" id="username" name="username" placeholder=".">
                <label for="username">Username</label>
            </div>
            <div class="input-container mt-2">
                <input type="password" required class="form-control" id="password" name="password" placeholder=".">
                <label for="password">Password</label>
            </div>
            <div class="container d-flex mt-4">
                <input type="submit" class="btn-login btn btn-dark" id="login" value="Login">
            </div>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
</body>

</html>