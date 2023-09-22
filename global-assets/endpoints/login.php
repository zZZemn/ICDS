<?php
if (isset($_POST['username'], $_POST['password'], $_POST['userType'])) {
    include('../../db/class.php');
    $db = new admin_class();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    $sql = $db->login($userType, $username);
    if ($sql->num_rows > 0) {
        $user = $sql->fetch_array();
        $user_password = $user['password'];
        if (password_verify($password, $user_password)) {
            session_start();
            if ($userType === 'admin') {
                $_SESSION['id'] = $user['id'];
            } elseif ($userType === 'store') {
                $_SESSION['store_id'] = $user['store_id'];
            } else {
                $_SESSION['user_id'] = $user['user_id'];
            }
            echo 'Login success';
        } else {
            echo 'Login failed';
        }
    } else {
        echo 'Login failed';
    }
}
