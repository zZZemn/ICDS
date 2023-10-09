<?php
include('db.php');
date_default_timezone_set('Asia/Manila');

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

    public function updateStoreDetails($post)
    {
        $storeId = $post['storeIdEdit'];
        $storeName = $post['storeName'];
        $address = $post['address'];
        $email = $post['email'];
        $contactNo = $post['contactNo'];
        $username = $post['username'];
        $category = $post['category'];

        $query = $this->conn->prepare("UPDATE `store` SET `username`='$username', `name`='$storeName', `contact_no`='$contactNo', `email`='$email', `address`='$address', `category_id`='$category' WHERE `store_id` = '$storeId'");
        if ($query->execute()) {
            return 200;
        } else {
            return 404;
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

    public function getSelectedCategory($id)
    {
        $query = $this->conn->prepare("SELECT * FROM `category` WHERE `category_id` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getCatregories()
    {
        $query = $this->conn->prepare("SELECT c.*, COUNT(s.category_id) as total_store FROM `category` c LEFT JOIN `store` s ON c.category_id = s.category_id GROUP BY c.category_id");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function checkUserId($id)
    {
        $query = $this->conn->prepare("SELECT * FROM `user` WHERE 'user_id' = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function signup($post)
    {
        $userName = $post['username'];
        $name = $post['name'];
        $password = $post['password'];

        $userId = 'user_' . rand(10000, 99999);
        while ($this->checkUserId($userId)->num_rows > 0) {
            $userId = 'user_' . rand(10000, 999999);
        }

        $query = $this->conn->prepare("INSERT INTO `user`(`user_id`, `username`, `password`, `name`, `status`) VALUES ('$userId','$userName','$password','$name','1')");
        if ($query->execute()) {
            return 200;
        } else {
            return 400;
        }
    }

    public function getUserDetails($id)
    {
        $query = $this->conn->prepare("SELECT * FROM `user` WHERE `user_id` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getStores($categoryId)
    {
        $query = $this->conn->prepare("SELECT s.*, COUNT(rr.review) as total_reviews, SUM(rr.rating) as total_rating FROM `store` s LEFT JOIN `rating_reviews` as rr ON s.store_id = rr.store_id WHERE s.category_id = '$categoryId' AND s.status = '1' GROUP BY s.store_id");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getStoreDetails($storeId)
    {
        $query = $this->conn->prepare("SELECT * FROM `store` WHERE `store_id` = '$storeId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getRatingAndReviews($storeId)
    {
        $query = $this->conn->prepare("SELECT rr.*, u.name FROM `rating_reviews` rr JOIN user u ON rr.user_id = u.user_id WHERE rr.store_id = '$storeId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function submitRate($post)
    {
        $userId = $post['userId'];
        $storeId = $post['storeId'];
        $review = $post['review'];
        $rateValue = $post['rateValue'];
        $currentDateTime = date('Y-m-d H:i:s');

        $query = $this->conn->prepare("INSERT INTO `rating_reviews`(`user_id`, `store_id`, `rating`, `review`, `date`) VALUES ('$userId','$storeId','$rateValue','$review', '$currentDateTime')");
        if ($query->execute()) {
            return 200;
        } else {
            return 400;
        }
    }

    public function searchEstablishment($get)
    {
        $searchValue = $get['value'];
        $category = $get['category'];

        $query = $this->conn->prepare("SELECT * FROM `store` WHERE `category_id` = '$category' AND `name` LIKE '%$searchValue%'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
