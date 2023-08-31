<?php
include('db.php');

class admin_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }

    public function login($user_type, $username)
    {
        $query = $this->conn->prepare("SELECT * FROM `$user_type` WHERE `USERNAME` = '$username'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function admin_Get_Users()
    {
        $query = $this->conn->prepare("SELECT * FROM `user`");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
