<header id=header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="personal.php" class="navbar-brand">
            <h3 class="px-3">
                <i class="fa fa-user"></i>
            </h3>
        </a>
    
        <a href="main.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i>F.cari
            </h3>
        </a>
        
        <a href="log-out.php" class="navbar-brand">
            <h5 class="px-5">
                <form action="log-out.php" method="post">
                <input type="submit" value="Log-out">
                </form>
            </h5>
        </a>
        
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="cart_icon">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="mr-auto"></div>
                <div class="navbar-nav">
                    <a href="cart.php" class="nav-item nav-link active">
                        <h5 class="px-5 cart">
                            <i class="fas fa-shopping-cart"></i>Cart
                            <?php
                                if(isset($_SESSION["cart"])){
                                    $count = count($_SESSION["cart"]);
                                    echo "<span id='cart_count' class='text-warning bg-light'>$count</span>";
                                }
                                else{
                                    echo "<span id='cart_count' class='text-warning bg-light'>0</span>";
                                }
                            ?>
                        </h5>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>