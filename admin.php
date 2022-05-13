<?php
    if(!isset($_COOKIE["login"])){
        header("location:login.php");
    }    
    
?>

<?php
    session_start();

    require_once("productDB-setup.php");
    require_once("clothes.php");

    $database= new ProductDB();

?>
<html>
    <head>
        <title>F.cari</title>
        
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script src="checkConfirmPW.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php
        include ("sidebar.html");
        ?>
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
        
        <div class="container">
            <div class="row text-center py-5">
                <?php
                    $result = $database->getData();
                    while($row=mysqli_fetch_assoc($result)){
                        clothes($row["product_image"], $row["product_name"], $row["product_price"], $row["product_stock"], $row["product_id"]);
                    }
                ?>
            </div>
        </div>
        
    </body>
</html>