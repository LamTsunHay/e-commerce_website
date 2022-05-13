<?php
    if(isset($_COOKIE["createNew"])){
        setcookie("createNew", "", time()-1);
    }
?>
<html>
    <head>
        <title>F.cari</title>
        <script src="checkConfirmPW.js"></script>
    </head>
    <body>
    <header id=header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand">
                    <h3 class="px-5">
                        <i class="fas fa-shopping-basket"></i>F.cari
                    </h3>
                </a>
            </nav>
        </header>
        <link rel="stylesheet" href="style.css">
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <form action="changePWprocess.php"  method="post" id="newForm">
            <div class="resetPW">
                <h1>Reset Password</h1>
                <table>
                    <tr><td><b>Login id</b></td></tr>
                    <tr><td><input type="text" size="40" name="username"></td></tr>
                    <tr><td><b>New Password</b></td></tr>
                    <tr><td><input type="text" size="40" name="password" id="PW"></td></tr>
                    <tr><td><b>Confirm Password</b></td></tr>
                    <tr><td><input type="text" size="40" name="password" id="confirmPW"></td></tr>
                </table>
                <div class="button">
                    <input type="button" value="submit" onclick="check()">
                    <a href="login.php">Back</a>
                </div>
                <?php
                    setcookie("forgetPW", 1, time()+(60*60*24));
                ?>
            </div>
        </form>
    </body>
</html>