<?php
    include "mysql-connect.php";
    $connect=mysqli_connect($server, $user, $pw, $db);
    
    if(isset($_POST["changepersonal"])){
        $myQuery= " UPDATE `users` 
        SET `username`= '$_POST[username]', `userpassword` = '$_POST[password]', `nickname` = '$_POST[nickname]', `email` = '$_POST[email]', `gender` = '$_POST[gender]', `birthday`='$_POST[birthday]', `profileimage`='$_POST[profileimg]' 
        WHERE `id`= '$_COOKIE[login]';";

        $try1=mysqli_query($connect, $myQuery);
        if ($try1){
            echo "<script>alert('Personal Details are changed successfully!')</script>";
        }
    }
    
?>

<html>
    <head>
        <title>F.cari</title>
        <script src="checkConfirmPW.js"></script>
    </head>
    <body id="body">

        <?php
            require_once("header.php");
        ?>

        <link rel="stylesheet" href="style.css">

        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        


        <form action='personal.php'  method='post' id='newForm'>
        <?php
            $userQuery = "SELECT * FROM users";
            $result=mysqli_query($connect, $userQuery);
            if($result){ 
                while($row = mysqli_fetch_assoc($result)){
                    if ($row["id"]==$_COOKIE["login"]){
                                             
                        echo "  <div class='box'>
                                <img src='$row[profileimage]' class='box-img' alt='No Image Yet'>
                                <h1>$row[nickname]</h1>
                                    <table id=table1 color:white>                    
                                        <tr><td><b>Nick Name</b></td>
                                        <td><input type='text' size='30' name='nickname' value=$row[nickname]></td></tr>
                                        <tr><td><b>Email</b></td>
                                        <td><input type='text' size='30' name='email' value='$row[email]'></td></tr>
                                        <tr><td><b>Profile Image file</b></td>
                                        <td><input type='text' size='30' name='profileimg' value='$row[profileimage]'></td></tr>
                                        <tr><td><b>Login id</b></td>
                                        <td><input type='text' size='30' name='username' value='$row[username]'></td></tr>
                                        <tr><td><b>Password</b></td>
                                        <td><input type='text' size='30' name='password' id='PW' value='$row[userpassword]'></td></tr>
                                        <tr><td><b>Gender(Male/Female)</b></td>
                                        <td><input type='text' size='30' name='gender' value='$row[gender]'></td></tr>
                                        <tr><td><b>Birthday(YYYY-MM-DD)</b></td>
                                        <td><input type='text' size='30' name='birthday' value='$row[birthday]'></td></tr>                    
                                    </table>";
                    }
                }
            }
        ?>
            <div class='button'>
                <input type='submit' value='submit' name='changepersonal' id='button'>
                    <a href='main.php'>Back</a>
            </div>                        
        </form>
        </div>
    </body>
</html>