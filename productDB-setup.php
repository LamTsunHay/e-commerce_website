<?php

    class ProductDB{
        public $server;
        public $user;
        public $pw;
        public $db;
        public $tablename;
        public $con;

        public function __construct(){
            
            $server = "localhost:3307";
            $user = "root";
            $pw = "";
            $db = "finalproject";
            $tablename="product";

            $this->con=mysqli_connect($server, $user, $pw, $db);

            if(!$this->con){
                die("Connection error");
            }

            $sql = "CREATE TABLE IF NOT EXISTS $tablename
                    (product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    product_name VARCHAR(25) NOT NULL,
                    product_price FLOAT,
                    product_stock INT(100) NOT NULL,
                    product_image VARCHAR(100)
                    );";
            if(!mysqli_query($this->con,$sql)){
                echo "Error creating table";
            }
        }

        public function getData(){
            $sql="SELECT * FROM product";

            $result = mysqli_query($this->con, $sql);

            return $result;
        }
        
    }
?>
