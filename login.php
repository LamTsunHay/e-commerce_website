<html>
    <head>
        <title>F.cari</title>
    </head>
    <body>

        <link rel="stylesheet" href="style.css">

        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <header id=header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand">
                    <h3 class="px-5">
                        <i class="fas fa-shopping-basket"></i>F.cari
                    </h3>
                </a>
            </nav>
        </header>
        <form action="loginprocess.php" method="post">
            <div class="login">
                <h1>Login</h1>
                <table >                    
                    <tr><td><b>Login id</b></td></tr>
                    <tr><td><input type="text" size="40" name="username"></td></tr>
                    <tr><td><b>Password</b></td></tr>
                    <tr><td><input type="text" size="40" name="password" id="PW"></td></tr>          
                </table>
            <a href="enter-newpass.php">Forgot password</a>
            <a href="createNewAccount.php">Create Account</a>
            <div class="button"><input type="submit" value="Submit"></div>
            
            </div>
            
        </form>
    </body>
</html>