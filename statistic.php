<?php
    //include "sidebar.html";
    include ("mysql-connect.php");
    $connect=mysqli_connect($server, $user, $pw, $db);

    if(isset($_POST["displayall"])){
        unset($_POST["search"]);
        unset($_POST["displayall"]);
    }
    $mysql="SELECT users.id, `nickname`, `email`, `gender`, product.product_id, `product_name`, `product_price`
    FROM ((`users_purchase` INNER JOIN `users` ON users.id=users_purchase.id)
    INNER JOIN `product` ON users_purchase.product_id=product.product_id)
    ORDER BY users.nickname ASC;";



    if(isset($_POST["search"])){
        $mysql = "SELECT users.id, `nickname`, `email`, `gender`, product.product_id, `product_name`, `product_price`
        FROM ((`users_purchase` INNER JOIN `users` ON users.id=users_purchase.id)
        INNER JOIN `product` ON users_purchase.product_id=product.product_id)
        WHERE users.id=$_POST[userid]";
    }

    $result= mysqli_query($connect, $mysql);
    if (!$result){
        die("rrrrrrrrrrr");
    }
?>

<html>
    <head>
        <title>F.cari</title>
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

        <form action="statistic.php" method="post">
                    <input type="submit" name="search" value="search" class="btn btn-warning" >
                    <input type="text" size="20" name="userid">
                    <input type="submit" name="displayall" value="Display All" class="btn btn-danger" >
                </form>
        <section>
            <div class="trytry">
                
                <?php
                     echo "<table class=trytry>
                     <th>User ID</th><th>Nick Name</td><th>Product ID</th><th>Product Name</th><th>Product Price</th>";
                    while($row=mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>$row[id]</td><td>$row[nickname]</td><td>$row[product_id]</td><td>$row[product_name]</td><td>$$row[product_price]</td>
                            </tr>
                        ";
                    }
                    echo "</table>";
                ?>

            </div>
            
        </section>
        
    </body>
</html>