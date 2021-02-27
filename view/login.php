<!DOCTYPE html>
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
            <form method="post" action="/phpmotors/accounts/index.php"> 
                <h1>Sign in</h1>
                <!-- See if a "$message" variable exists, and if so, to echo it -->
                <?php
                    if (isset($message)) {
                        echo $message;
                    }
                ?>   
                <label class="top">Email<input type="email" name="clientEmail" placeholder="someone@gmail.com" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required></label>
                <label class="top">Password <span><br>Must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span><input type="password" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required></label>
                <input type="submit" value="Login" class="submitBtn">
                <input type="hidden" name="action" value="Login">
                <p><a href="/phpmotors/accounts/index.php?action=registration">Not a member yet?</a><p>
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