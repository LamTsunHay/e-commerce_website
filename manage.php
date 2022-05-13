<?php
    include "sidebar.html";
    require_once("productDB-setup.php");
    $database= new ProductDB();
    $result=$database->getData();
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

        <section>
            <div class="trytry">
            <form action="editProduct.php" method="post">
                <input type=submit name=editForm class="btn btn-danger"value=EDIT>
                <input type="text"  size="10" name="product_id">
            </form>
                <?php
                     echo "<table class=trytry>
                     <th>Product id</th><th>Product Name</td><th>Product Price</th><th>Stock</th><th>Image Link</th>";
                    while($row=mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>$row[product_id]</td><td>$row[product_name]</td><td>$$row[product_price]</td><td>$row[product_stock]</td><td>$row[product_image]</td>
                            </tr>
                        ";
                    }
                    echo "</table>";
                ?>
                
                
            </div>
            
        </section>
        
    </body>
</html>