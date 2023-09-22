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

    public function storeRegistration($post, $files)
    {
        $storeName = $post['storeName'];
        $address = $post['address'];
        $email = $post['email'];
        $contactNo = $post['contactNo'];
        $category = $post['category'];
        $username = $post['username'];
        $password = $post['password'];
        // $logo = $files['storeLogo']['name'];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // store id
        $storeID = mt_rand(10000, 99999) . '_store_' . mt_rand(10000, 99999);
        $checkStoreID = $this->storeRegisterValidation('store_id', $storeID);
        while ($checkStoreID->num_rows > 0) {
            $storeID = mt_rand(10000, 99999) . '_store_' . mt_rand(10000, 99999);
            $checkStoreID = $this->storeRegisterValidation('store_id', $storeID);
        }

        if (!empty($_FILES['storeLogo']['size'])) {
            $file_name = $files['name'];
            $file_tmp = $files['tmp_name'];
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                $destinationDirectory = __DIR__ . '/../global-assets/store-logos/';
                $newFileName = $storeID . '.' . $extension;
                $destination = $destinationDirectory . $newFileName;
                if (is_uploaded_file($file_tmp)) {
                    if (move_uploaded_file($file_tmp, $destination)) {
                        $query = $this->conn->prepare("INSERT INTO `store`(`store_id`, `username`, `password`, `name`, `contact_no`, `email`, `address`, `logo`, `category_id`, `status`) 
                                                   VALUES ('$storeID','$username','$hashedPassword','$storeName','$contactNo','$email','$address','$newFileName','$category','1')");
                        if ($query->execute()) {
                            return 200;
                        } else {
                            return 405;
                        }
                    } else {
                        // upload unsuccessfull
                        return 'Uploading file unsuccessfull';
                    }
                } else {
                    return "Error: File upload failed or file not found.";
                }
            } else {
                // file type not valid
                return 'Invalid file type';
            }
        } else {
            // empty file
            return 'File is empty';
        }
    }

    public function addNewLink($id, $link, $linkName)
    {
        $query = $this->conn->prepare("INSERT INTO `links`(`store_id`, `link_name`, `link`) 
                                                   VALUES ('$id','$linkName','$link')");
        if ($query->execute()) {
            return 200;
        } else {
            return 404;
        }
    }

    public function addNewPhoto($id, $photo)
    {
        $photoId = mt_rand(10000, 99999);
        if (!empty($_FILES['photo']['size'])) {
            $file_name = $photo['name'];
            $file_tmp = $photo['tmp_name'];
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
                $destinationDirectory = __DIR__ . '/../global-assets/store-photos/';
                $newFileName = $photoId . '.' . $extension;
                $destination = $destinationDirectory . $newFileName;
                if (is_uploaded_file($file_tmp)) {
                    if (move_uploaded_file($file_tmp, $destination)) {
                        $query = $this->conn->prepare("INSERT INTO `photos`(`id`, `store_id`, `photo`) VALUES ('$photoId','$id','$newFileName')");
                        if ($query->execute()) {
                            return 200;
                        } else {
                            return 405;
                        }
                    } else {
                        return 'Uploading file unsuccessfull';
                    }
                } else {
                    return "Error: File upload failed or file not found.";
                }
            } else {
                // file type not valid
                return 'Invalid file type';
            }
        } else {
            // empty file
            return 'File is empty';
        }
    }
}


class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }

    public function getNumberOfRatings($id)
    {
        $query = $this->conn->prepare("SELECT COUNT(*) as TOTAL_RATINGS FROM `rating_reviews` WHERE `store_id` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getStoresLinks($id)
    {
        $query = $this->conn->prepare("SELECT * FROM `links` WHERE `store_id` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getStorePhotos($id)
    {
        $query = $this->conn->prepare("SELECT * FROM `photos` WHERE `store_id` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
