<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title>Content Title | PHP Motors</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/small.css" media="screen" rel="stylesheet">
    <link href="css/medium.css" media="screen" rel="stylesheet">
</head>

<body>
    <div id="content">

        <!-- Header -->
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';?>
        </header>
        <!-- Navegation Bar -->
        <nav>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';?>
        </nav>
        <main>
            <h1>Content Title Here</h2>
        </main>

        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="js/footer.js"></script>
</body>

</html>