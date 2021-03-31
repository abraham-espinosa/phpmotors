<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
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
            <div id="vehicleDetails">
                <div id="vehicleInfo">
                <?php if(isset($vehicleDisplay)){
                    echo $vehicleDisplay;} 
                ?>
                </div>
                <div id="imagesTn">
                    <h2>More pictures</h2>
                <?php if(isset($tnimagesDisplay)){
                    echo $tnimagesDisplay;} 
                ?>
                </div>
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