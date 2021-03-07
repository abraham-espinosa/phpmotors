<?php
    // Check if theres is a session created
    if(!$_SESSION['loggedin']){
        header('Location: ../index.php');
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title>Sing in | PHP Motors</title>
    <link href="/phpmotors/css/normalize.css" rel="stylesheet">
    <link href="/phpmotors/css/small.css" media="screen" rel="stylesheet">
    <link href="/phpmotors/css/medium.css" media="screen" rel="stylesheet">
</head>

<body>
    <div id="content">

        <!-- Header -->
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';?>
        </header>
        <!-- Navegation Bar -->
        <nav>
        <?php echo $navList; ?>
        </nav>
        <main>
            <div>
                <h1><?php echo $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'];?></h1>
                <p>You are logged in.</p>
                <ul> 
                    <li>Fisrt Name: <?php echo $_SESSION['clientData']['clientFirstname'];?></li>
                    <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname'];?></li>
                    <li>Email: <?php echo $_SESSION['clientData']['clientEmail'];?></li>
                    <li>Client Level: <?php echo $_SESSION['clientData']['clientLevel'];?></li>
                </ul>
                <p><?php
                        if($_SESSION['clientData']['clientLevel'] > 1){
                        echo "<p><a href='/phpmotors/vehicles/index.php'>Vehicle Controler</a></p>";
                        }
                ?><p>
            </div>
        </main>
        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="/phpmotors/js/footer.js"></script>
</body>

</html>