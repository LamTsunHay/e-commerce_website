<?php
    include ("mysql-connect.php");
    $connect=mysqli_connect($server, $user, $pw, $db);

    $mysql= "CREATE TABLE `users_purchase`(
        id INT NOT NULL,
        product_id INT NOT NULL,
        FOREIGN KEY (id) REFERENCES users(id),
        FOREIGN KEY (product_id) REFERENCES product(product_id)
        )";
    $result= mysqli_query($connect, $mysql);
?>