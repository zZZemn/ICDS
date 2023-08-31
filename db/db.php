<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "icds";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
define("db_host", "localhost");
define("db_user", "root");
define("db_pass", "");
define("db_name", "icds");

class db_connect
{
    public $host = db_host;
    public $user = db_user;
    public $pass = db_pass;
    public $name = db_name;
    public $conn;
    public $error;
    public $mysqli;


    public function connect()
    {
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);

            if (!$this->conn) {
                $this->error = "Fatal Error: Can't connect to database" . $this->conn->connect_error;
                return false;
            }
        } catch (\Throwable $th) {
            header("Location:setup.php");
        }
    }
}
