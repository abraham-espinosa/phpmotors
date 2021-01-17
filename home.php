<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI - Abraham Espinosa" />
    <title>Home | PHP Motors</title>
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
            <section>
                <div class="img-section">
                    <img src="images/delorean.jpg" alt="Delorean">
                    <section class="text-section">
                        <h1>Welcome to PHP Motors!</h1>
                        <h2>DMC Delorean</h2>
                        <p>3 Cup holders</p>
                        <p>Superman doors</p>
                        <p>Fuzzy dice!</p>
                        <img src="images/site/own_today.png" alt="Own-today">
                    </section>
                    <img class="button-display" src="images/site/own_today.png" alt="Own-today">
                </div>
            </section>
            <section>
                <h3>DMC Delorean Reviews</h3>
                <ul>
                    <li>"So fast its almost like traveling in time." (4/5)</li>
                    <li>"Coolest ride in the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly!" (5/5)</li>
                    <li>"The most futurist ride of our day." (4.5/5)</li>
                    <li>"80's livin and I love it!" (5/5)</li>
                </ul>
            </section>
            <section>
                <h3>Delorean Upgrades</h3>
                <article class="delorean-upgrade">
                    <div>
                        <section class="upgrade">
                           <img  src="images/upgrades/flux-cap.png" alt="Flux-capacitor">
                         </section>
                         <a href="#">Flux Capacitor</a>
                    </div>
                    <div>
                        <section class="upgrade">
                            <img  src="images/upgrades/flame.jpg" alt="Flame-decals">
                        </section>
                        <a href="#">Flame Decals</a>
                    </div>
                    <div>
                        <section class="upgrade">
                            <img  src="images/upgrades/bumper_sticker.jpg" alt="Bumper-stickers">
                        </section>
                        <a href="#">Bumper Stickers</a>
                    </div>
                    <div>
                        <section class="upgrade">
                            <img src="images/upgrades/hub-cap.jpg" alt="Hub-cap">
                        </section>
                        <a href="#">Hub Caps</a>
                    </div>
                </article>
            </section>
        </main>
        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="js/footer.js"></script>
</body>

</html>