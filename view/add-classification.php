<?php
    // Check if theres is a session created
    if(!$_SESSION['loggedin']){
        header('Location: ../index.php');
    }
    if($_SESSION['clientData']['clientLevel'] < 2){
        header('Location: ../index.php');
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
            <form method="post" action="/phpmotors/vehicles/index.php"> 
                <h1>Add Classification</h1>
                <!-- See if a "$message" variable exists, and if so, to echo it -->
                <?php
                    if (isset($message)) {
                        echo $message;
                    }
                ?>       
                <label class="top">Classification Name <input type="text" name="classificationName" pattern="[A-Za-z ]{2,}" <?php if(isset($classificationName)){echo "value='$classificationName'";}  ?> required ></label>
                <input type="submit" name="submit" id="regbtn" value="Add Classification" class="submitBtn">
                <input type="hidden" name="action" value="new-classification">
            </form>
        </main>
        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="/phpmotors/js/footer.js"></script>
</body>

</html>