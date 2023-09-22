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
        $query = $this->conn->prepare("SELECT * FROM `$user_type` WHERE `username` = '$username'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function dashboard_Contents()
    {
        try {
            $query1 = $this->conn->prepare("SELECT COUNT(*) AS num_user FROM `user`");
            $query2 = $this->conn->prepare("SELECT COUNT(*) AS num_cat FROM `category`");
            $query3 = $this->conn->prepare("SELECT COUNT(*) AS num_store FROM `store`");

            $query1->execute();
            $result1 = $query1->get_result();
            $res1 = $result1->fetch_array();
            $query1->close();

            $query2->execute();
            $result2 = $query2->get_result();
            $res2 = $result2->fetch_array();
            $query2->close();

            $query3->execute();
            $result3 = $query3->get_result();
            $res3 = $result3->fetch_array();
            $query3->close();

            $res1_final = $res1['num_user'];
            $res2_final = $res2['num_cat'];
            $res3_final = $res3['num_store'];

            return [$res1_final, $res2_final, $res3_final];
        } catch (PDOException $e) {
            return [0, 0, 0];
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

    public function admin_Edit_Categories($id, $category)
    {
        $query = $this->conn->prepare("UPDATE `category` SET `category`='$category' WHERE `category_id` = '$id'");
        if ($query->execute()) {
            return 200;
        } else {
            return 400;
        }
    }

    public function admin_Get_Category($id)
    {
        $query = $this->conn->prepare("SELECT * FROM `category` WHERE `category_id` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            $cat = $result->fetch_array();
            $cat_name = $cat['category'];
            return $cat_name;
        }
    }

    public function admin_Get_Stores()
    {
        $query = $this->conn->prepare("SELECT * FROM `store`");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}


class stores_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }

    public function storeRegisterValidation($field, $data)
    {
        $query = $this->conn->prepare("SELECT * FROM `store` WHERE `$field` = '$data'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
