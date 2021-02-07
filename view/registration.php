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
        <form>    
            <h1>Register</h1>
            <label class="top">First Name <input type="text" name="firstName" pattern="[A-Za-z ]{5,}" required></label>
            <label class="top">Last Name <input type="text" name="lastName" pattern="[A-Za-z ]{5,}" required></label>
            <label class="top">Email <input type="email" name="email" placeholder="someone@gmail.com" required></label>
            <label class="top">Password <input type="password" name="password" required></label>
            <input type="submit" value="Register" class="submitBtn">
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