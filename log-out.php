<?php
    session_start();
?>
<?php
    setcookie("login", "", time()-1);
    session_unset();
    session_destroy();
    header("location:login.php");
    
?>