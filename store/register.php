<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div class="container mt-5">
        <form class="frm-register card p-5">
            <h1><center class="card-title">Register Store</center></h1>
            <div class="input-container">
                <label for="storeName">Store Name</label>
                <input type="text" id="storeName" name="storeNname" class="form-control">
            </div>
            <div class="input-container">
                <label for=address">Address</label>
                <input type="text" id=address" name="address" class="form-control">
            </div>
            <div class="input-container-container d-flex justify-content-between">
                <div class="input-container">
                    <label for=email">Email</label>
                    <input type="email" id=email" name="email" class="form-control">
                </div>
                <div class="input-container">
                    <label for=contactNo">Contact #</label>
                    <input type="number" id=contactNo" name="contactNo" class="form-control">
                </div>
            </div>
            <div class="input-container-container d-flex justify-content-between">
                <div class="input-container">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control">
                        <option disabled selected>Select Category</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="storeLogo">Upload Logo</label>
                    <input type="file" id="storeLogo" name="storeLogo" class="form-control">
                </div>
            </div>
            <div class="input-container-container d-flex justify-content-between">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
            </div>
            <div class="btn-container d-flex justify-content-center mt-5">
                <a href="login.php" class="btn btn-dark m-1">Back To Login</a>
                <input type="submit" id="btnRegister" name="btnRegister" class="btn btn-primary m-1" value="Register">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>