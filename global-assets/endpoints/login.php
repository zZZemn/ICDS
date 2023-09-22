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
