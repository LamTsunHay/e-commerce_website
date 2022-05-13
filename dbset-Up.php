<?php
    include "mysql-connect.php";

    $connect=mysqli_connect($server, $user, $pw, $db);

    if(!$connect) {
        die("ERROR: Cannot connect to database $db on server $server 
        using user name $user (".mysqli_connect_errno().
        ", ".mysqli_connect_error().")");
    }

    $dropUserTable="DROP TABLE IF EXISTS users";

    $createUserTable="CREATE TABLE  `users` (
        `id` INTEGER NOT NULL AUTO_INCREMENT,
        `username` VARCHAR( 40 ) NOT NULL ,
        `userpassword` VARCHAR( 40 ) NOT NULL,
        `nickname` VARCHAR( 30 ) NOT NULL,
        `email` VARCHAR( 40 ) NOT NULL,
        `gender` CHAR( 6 ) NOT NULL,
        `birthday` DATE,
        `profileimage` VARCHAR( 40 ),
        PRIMARY KEY (`id`),
        UNIQUE KEY id (`id`)
    ) ENGINE = 'INNODB' DEFAULT CHARSET = 'latin1'";

    $addUserRecords = "REPLACE INTO `users` (`username`, `userpassword`, `nickname`, `email`, `gender`, `birthday`) VALUES 
    ('admin', 'adminpass', 'admin', 'fcariOffical.connect.hk', 'Male', '2001-05-20');";

    $result = mysqli_query($connect, $dropUserTable);
    if(!$result){
        die("die1".mysqli_connect_error($connect));
    }
    else{
        $result = mysqli_query($connect, $createUserTable);
        if(!$result){
            die("die2".mysqli_connect_error($connect));
        }
        else{
            $result = mysqli_query($connect, $addUserRecords);
            if(!$result){
                die("die3".mysqli_connect_error($connect));
            }
            else{
                echo "success";
            }
        }
    }
    mysqli_close($connect);
    
?>