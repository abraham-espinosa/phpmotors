<!DOCTYPE html>
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
                <h1>Add Vehicle</h1>
                <?php if (isset($message)) {echo $message;} ?>   
                <p>*Note all Fields are Require</p>
                <form method="post" action="/phpmotors/vehicles/index.php"> 
                    <!-- See if a "$message" variable exists, and if so, to echo it -->
                    <?php echo $selectList; ?>    
                    <label class="top">Make <input type="text" name="invMake"></label>
                    <label class="top">Model <input type="text" name="invModel"></label>
                    <label class="top">Description <input type="text" name="invDescription"></label>
                    <label class="top">Image Path <input type="text" name="invImage" value="/images/no-image.png"></label>
                    <label class="top">Thumbnail Path<input type="text" name="invThumbnail" value="/images/no-image.png"></label>
                    <label class="top">Price <input type="text" name="invPrice"></label>
                    <label class="top">Stock <input type="text" name="invStock"></label>
                    <label class="top">Color <input type="text" name="invColor"></label>
                    <input type="submit" name="submit" id="regbtn" value="New Vehicle" class="submitBtn">
                    <input type="hidden" name="action" value="new-vehicle">
                </form>
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