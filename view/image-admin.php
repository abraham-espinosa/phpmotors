<?php
    // Check if there is a message set in the $_SESSION and if so, assign it to a local $message variable
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title>Image Management</title>
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
            <h2>Add New Vehicle Image</h2>
            <?php
                if (isset($message)) {
                echo $message;
                } ?>

            <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
                <label for="invItem">Vehicle</label>
	            <?php echo $prodSelect; ?>
	            <fieldset>
		            <label>Is this the main image for the vehicle?</label>
		            <label for="priYes" class="pImage">Yes</label>
		            <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
		            <label for="priNo" class="pImage">No</label>
		            <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
	            </fieldset>
                <label>Upload Image:</label>
                <input type="file" name="file1">
                <input type="submit" class="regbtn" value="Upload">
                <input type="hidden" name="action" value="upload">
            </form>

            <h2>Existing Images</h2>
            <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php
                if (isset($imageDisplay)) {
                     echo $imageDisplay;
            } ?>
        </main>
        <!-- Footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        </footer>
    </div>
    <script src="/phpmotors/js/footer.js"></script>
</body>

</html><?php unset($_SESSION['message']); ?>