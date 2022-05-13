<html>
    <body>
        <?php
            include "mysql-connect.php";
            $connect=mysqli_connect($server, $user, $pw, $db);
            
            $correct=false;

            $username = $_POST["username"];
            $password = $_POST["password"];

            $userQuery = "SELECT id, username, userpassword FROM users";
            $result = mysqli_query($connect, $userQuery);
            while( $row = mysqli_fetch_assoc($result) ){
                if ($row["username"]==$username && $row["userpassword"]==$password){

                    $correct=true;
                    setcookie("login", $row["id"], time()+(60*60*24));
                    header("location:main.php");
                }
            }
            if($correct==false){
                header("location:login.php");
            } 
        ?>
    </body>
</html>