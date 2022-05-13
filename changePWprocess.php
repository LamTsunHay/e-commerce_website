<?php
    include "mysql-connect.php";
    $connect=mysqli_connect($server, $user, $pw, $db);

    $username=$_POST["username"];
    $newpassword=$_POST["password"];
    $nickname=$_POST["nickname"];
    $email=$_POST["email"];
    $gender=$_POST["gender"];

    if($_POST["birthday"]==""){
        $birthday=null;
    }
    else{
        $birthday=$_POST["birthday"];
    }

    if($_POST["profileimg"]==""){
        $profileimg=null;
    }
    else{
        $profileimg=$_POST["profileimg"];
    }
    
    

    $changePassword="UPDATE users
        SET userpassword = '$newpassword'
        WHERE username = '$username';";

    $userQuery = "SELECT id, username, userpassword FROM users";

    $result = mysqli_query($connect, $userQuery);

    $createNewAccount="INSERT INTO `users` (`username`, `userpassword`, `nickname`, `email`, `gender`, `birthday`, `profileimage`)
        VALUES ('$username', '$newpassword', '$nickname', '$email', '$gender', '$birthday', '$profileimg');";
    
    if(isset($_COOKIE["createNew"])){
        $result = mysqli_query($connect, $createNewAccount);
        echo '<script>alert("Account is created successfully!")</script>';
        echo "<script>window.location='login.php'</script>";
        setcookie("createNew", "", time()-1);
    }
    if(isset($_COOKIE["forgetPW"])){
        while($row = mysqli_fetch_assoc($result)){
            if ($row["username"]==$username){
                $result = mysqli_query($connect, $changePassword);
                echo '<script>alert("Password is changed successfully!")</script>';
                echo "<script>window.location='login.php'</script>";
                    
            }
        }
    }
    mysqli_close($connect);
?>
        