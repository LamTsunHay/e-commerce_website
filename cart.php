<?php
    session_start();
    require_once("productDB-setup.php");
    require_once("clothes.php");

    $db = new ProductDB();

    if(isset($_POST["remove"])){
        if ($_GET["action"]=="remove"){
            foreach($_SESSION["cart"] as $key=>$value){
                if($value["product_id"]==$_GET["id"]){
                    unset($_SESSION["cart"][$key]);
                    header("location:cart.php");
                }
            }
        }
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>F.cari</title>

            <!--Font Awesome-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            
            <!--Bootstrap CDN-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            
            <link rel="stylesheet" href="style.css">

        </head>
        <body class="bg-light">
            <?php require_once("header.php"); ?>

            <div class="container-fluid">
                <div class="row px-5">
                    <div class="col-md-7">
                        <div class="shopping-cart">
                            <h6>My Cart</h6>
                            <hr>
                            <?php

                            if(isset($_SESSION["cart"])){
                                $product_id=array_column($_SESSION["cart"], "product_id");
                                $result=$db->getData();
                                while($row=mysqli_fetch_assoc($result)){
                                    foreach($product_id as $id){
                                        if($row["product_id"]==$id){
                                            cartElement($row["product_image"], $row["product_name"], $row["product_price"], $row["product_stock"], $row["product_id"]);
                                        }
                                    }
                                }
                            }
                            else{
                                echo "<h5>The cart is Empty</h5>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="pt-4">
                            <h6>PRICE DETAILS</h6>
                            <hr>
                            <div class="row price-details">
                                <div class="col-md-6">
                                    <?php
                                        if (isset($_SESSION["cart"])){
                                            $count=count($_SESSION["cart"]);
                                            echo "<h6>Price($count items)</h6>";
                                        }
                                        else{
                                            echo "<h6>Price(0 items)</h6>";
                                        }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                        $total=0;
                                        if(isset($_SESSION["cart"])){
                                            $product_id=array_column($_SESSION["cart"], "product_id");
                                            $result=$db->getData(); 
                                            while($row=mysqli_fetch_assoc($result)){
                                                foreach($product_id as $id){
                                                    if($row["product_id"]==$id){
                                                        $total=(int)$row["product_price"]+$total;
                                                    }
                                                }
                                            }   
                                        }
                                        echo "<b>$$total</b>";
                                        
                                    ?>
                                </div>
                            </div>
                            <div class="top-border">
                                <div class="col-md-6">
                                    <form action="purchase.php" method="post">
                                        <input type="submit" value="Purchase" class="btn btn-warning">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>
    </html>