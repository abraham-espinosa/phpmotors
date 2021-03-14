<?php
    // Check if theres is a session created
    if(!$_SESSION['loggedin']){
        header('Location: ../index.php');
    }
    if($_SESSION['clientData']['clientLevel'] < 2){
        header('Location: ../index.php');
    }
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
    }

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title>Registration | PHP Motors</title>
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
                <h1>Vehicle Management</h1>
                <ul>
                  <li><a href="/phpmotors/vehicles/index.php?action=add-classification">Add Classification</a></li>
                  <li><a href="/phpmotors/vehicles/index.php?action=add-vehicle">Add Vehicle</a></li>
                </ul>
                <?php
                    if (isset($message)) { 
                        echo $message; 
                    } 
                    if (isset($classificationList)) { 
                        echo '<h2>Vehicles By Classification</h2>'; 
                        echo '<p>Choose a classification to see those vehicles</p>'; 
                        echo $classificationList; 
                    }
                ?>
                <noscript>
                    <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
                </noscript>
                <table id="inventoryDisplay"></table>
            </div>
        </main>
        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="/phpmotors/js/footer.js"></script>
    <script src="../js/inventory.js"></script>
</body>
</html><?php unset($_SESSION['message']); ?>