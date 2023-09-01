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

    public function admin_Deactivate_Users($id, $status, $table, $id_name)
    {
        if ($status == '1') {
            $query = $this->conn->prepare("UPDATE `$table` SET `status`='0' WHERE `$id_name` = '$id'");
        } else {
            $query = $this->conn->prepare("UPDATE `$table` SET `status`='1' WHERE `$id_name` = '$id'");
        }

        if ($query->execute()) {
            return 200;
        } else {
            return 400;
        }
    }

    public function admin_Get_Categories()
    {
        $query = $this->conn->prepare("SELECT * FROM `category`");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
