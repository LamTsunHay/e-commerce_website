<?php
    include ("mysql-connect.php");
    $connect=mysqli_connect($server, $user, $pw, $db);

    if(isset($_POST["addProduct"])){
        $mysql = "INSERT INTO `product`(`product_name`, `product_price`, `product_stock`, `product_image`)
        VALUES('$_POST[product_name]', '$_POST[product_price]', '$_POST[product_stock]', '$_POST[product_image]')";

        $try3=mysqli_query($connect, $mysql);

        $mysql = "ALTER TABLE product AUTO_INCREMENT = 1";
        $try3=mysqli_query($connect, $mysql);

    }
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
        <form action="addProduct.php" method="post">
            <div class="createAcc">
                <h1>ADD</h1>
        <?php
    
                        echo "<table >                  
                        <tr><td><b>Product Name</b></td></tr>
                        <tr><td><input type='text' size='40'  name='product_name'></td></tr>
                        <tr><td><b>Product Price</b></td></tr>
                        <tr><td><input type='text' size='40'  name='product_price'></td></tr>
                        <tr><td><b>Stock</b></td></tr>
                        <tr><td><input type='text' size='40'  name='product_stock'></td></tr>
                        <tr><td><b>Image Link</b></td></tr>
                        <tr><td><input type='file' size='40'  name='product_image' accept = image/></td></tr>                   
                    </table>";
                    
                   
                ?>
                
                <div class="button">
                        <input type="submit" value="ADD" name="addProduct">
                    
                    <a href="manage.php">Back</a>
                </div>
                </form>
            </div>
            

        
    </body>
</html>