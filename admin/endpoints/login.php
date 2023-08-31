<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    include('../../db/class.php');
    $db = new admin_class();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $db->login('admin', $username);
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
