
<img src="/phpmotors/images/site/logo.png" alt="logo-PHP-motors" />
<?php if($_SESSION['loggedin']){
        echo "<p id='admin'><a href='/phpmotors/accounts/index.php'>Welcome, " . $_SESSION['clientData']['clientFirstname'] . "</a></p>";
        echo "<p><a href='/phpmotors/accounts/index.php?action=logout'>Logout</a></p>";
        }else{
        echo "<p><a href='/phpmotors/accounts/index.php?action=login'>My account</a></p>";       
        }
?>