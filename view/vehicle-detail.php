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
            <?php if (isset($message)) {echo $message;} ?>
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
            <?php
                    // Check if theres is a session created
                    if($_SESSION['loggedin']){
                        echo "<h1>Customer Reviews</h1>";
                        echo "<h3>Add a new review, we want to know your thoughts</h3>";
                        $lettername = substr($_SESSION['clientData']['clientFirstname'],0,1);
                        $lettername = strtoupper($lettername);
                        $upperlastname = ucfirst($_SESSION['clientData']['clientLastname']);
                        $clientTitle = $lettername . $upperlastname;
                        if (isset($_SESSION['message'])) {echo $_SESSION['message'];} 
                        echo '<form method="post" action="/phpmotors/reviews/index.php">'; 
                        echo "<label class='top'><input type='hidden' name='invId' value='$invId'></label>";
                        echo "<label class='top'>Screen Name <input type='text' name='clientTitle' value='$clientTitle' readonly></label>";
                        echo '<label class="top">Review <input type="text" name="reviewText" required></label>';
                        echo '<input type="submit" name="submit" id="regbtn" value="New Review" class="submitBtn">';
                        echo '<input type="hidden" name="action" value="newReview">';
                        echo '</form>';
                    }else{
                        echo "<h1>Customer Reviews</h1>";
                        echo "<p>You must <a href='/phpmotors/accounts/index.php?action=login'>login</a> to write a reviw</p>";
                    }
                    $_SESSION['message'] = "";
                ?>
            <?php if(isset($reviewsDisplay)){
                    echo $reviewsDisplay;} 
                ?>
        </main>
        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="/phpmotors/js/footer.js"></script>
</body>

</html>