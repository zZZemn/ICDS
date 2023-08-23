<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    include('../../db/db.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_sql = "SELECT * FROM admin WHERE `USERNAME` = '$username'";
    $user_result = $conn->query($user_sql);
    if ($user_result->num_rows > 0) {
        $user = $user_result->fetch_assoc();
        $user_password = $user['PASSWORD'];
        if (password_verify($password, $user_password)) {
            session_start();
            $_SESSION['id'] = $user['ID'];
            echo 'Login success';
        } else {
            echo 'Login failed';
        }
    } else {
        echo 'Login failed';
    }
}
