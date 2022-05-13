<?php
    session_start();
    include "mysql-connect.php";
    $connect=mysqli_connect($server, $user, $pw, $db);


    $empty=true;

    if(isset($_SESSION["cart"])){
        $product_id=array_column($_SESSION["cart"], "product_id");

        $mysql="SELECT * FROM `product` ORDER BY `product_id` ";
        $result=mysqli_query($connect, $mysql);
        
        $x=0;
        while($row=mysqli_fetch_assoc($result)){
            
                $id=$product_id[$x];
                if($row["product_id"]==$id){
                    if ($row["product_stock"]==0){
                        echo "<script>alert('Product is SOLD OUT')</script>";
                        echo "<script>window.location='cart.php'</script>";
                    }
                    else{
                        $empty=false;
                        $newStock=$row["product_stock"]-1;
                        $mysql="UPDATE `product`
                        SET `product_stock` = '$newStock'
                        WHERE `product_id`= '$row[product_id]'";

                        $try1=mysqli_query($connect, $mysql);
                        if(!$try1){
                            die("error");
                        }

                        $sql = "INSERT INTO `users_purchase`
                        VALUES('$_COOKIE[login]','$id');";
                        $try2=mysqli_query($connect, $sql);
                        
                        
                    $x=$x+1;  
                }

            }
        }
        if (!$empty){
            session_unset();
            session_destroy();
        }
        echo "<script>window.location='main.php'</script>";    
    }

    
    
        

?>