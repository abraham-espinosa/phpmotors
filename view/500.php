<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title>Content Title | PHP Motors</title>
    <link href="/phpmotors/css/normalize.css" rel="stylesheet">
    <link href="/phpmotors/css/error.css" media="screen" rel="stylesheet">
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
            <h1>Server Error</h2>
            <p>Sorry our server seems to be experiencing some technical difficulties. Please check back later.</p>
        </main>

        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="/phpmotors/js/footer.js"></script>
</body>

</html>