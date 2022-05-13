<?php

    include "mysql-connect.php";
    $connect=mysqli_connect($server, $user, $pw, $db);
    if(isset($_POST["update"])){
        
        $myQuery= " UPDATE `product` 
        SET `product_name`= '$_POST[product_name]', `product_price` = '$_POST[product_price]', `product_stock` = '$_POST[product_stock]', `product_image` = '$_POST[product_image]'
        WHERE `product_id`= '$_POST[product_id]';";

        $try1=mysqli_query($connect, $myQuery);
        if ($try1){
            echo "<script>alert('Product Details are changed successfully!')</script>";
        }
    }

    require_once("productDB-setup.php");
    $database= new ProductDB();
    $result=$database->getData();
     
?>
<html>
    <head>
        <title>
            F.cari
        </title>
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="newStyle.css">
    </head>
    <body>
        <header id=header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand">
                    <a href="admin.php" class="navbar-brand">
                    <h3 class="px-5">
                        <i class="fas fa-shopping-basket"></i>F.cari
                    </h3>
                    </a>
                </a>
            </nav>
        </header>
        <form action="editProduct.php" method="post">
            <div class="createAcc">
                <h1>EDIT</h1>
        <?php
        
                
                while($row=mysqli_fetch_assoc($result)){
                    if($_POST["product_id"]==$row["product_id"]){
                        echo "<table >        
                        <tr><td><b>Product ID</b></td></tr>
                        <tr><td><input type='text' size='40' value=$row[product_id] name='product_id' readonly></td></tr>            
                        <tr><td><b>Product Name</b></td></tr>
                        <tr><td><input type='text' size='40' value=$row[product_name] name='product_name'></td></tr>
                        <tr><td><b>Product Price</b></td></tr>
                        <tr><td><input type='text' size='40' value=$row[product_price] name='product_price'></td></tr>
                        <tr><td><b>Stock</b></td></tr>
                        <tr><td><input type='text' size='40' value=$row[product_stock] name='product_stock'></td></tr>
                        <tr><td><b>Image Link</b></td></tr>
                        <tr><td><input type='text' size='40' value=$row[product_image] name='product_image'></td></tr>                   
                    </table>";
                    }
                   
                }
                   
                ?>
                
                <div class="button">
                        <input type="submit" value="update" name="update">
                    
                    <a href="manage.php">Back</a>
                </div>
                </form>
            </div>
            

        
    </body>
</html>