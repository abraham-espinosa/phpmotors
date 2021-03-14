<?php
    // Check if theres is a session created
    if(!$_SESSION['loggedin']){
        header('Location: ../index.php');
    }
    if($_SESSION['clientData']['clientLevel'] < 2){
        header('Location: ../index.php');
    }
    // Build a select list using the $classifications array
    $selectList = '<select name="classificationId" id="classificationId" required>';
    $selectList .= "<option value='' disabled selected>Choose Car Classification</option>";
    foreach ($classifications as $classification) {
        $selectList .= "<option value='$classification[classificationId]'";
            if(isset($classificationId)){
                if($classification['classificationId'] === $invInfo['classificationId']){
                    $selectList .= ' selected ';
                }
            } elseif(isset($invInfo['classificationId'])){
                if($classification['classificationId'] === $invInfo['classificationId']){
                    $selectList .= ' selected ';
                }
            }
        $selectList .= ">$classification[classificationName]</option>";
    }
    $selectList .= '</select>';

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		        echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	      elseif(isset($invMake) && isset($invModel)) { 
		        echo "Modify $invMake $invModel"; } ?></title>
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
                <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	                        echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
                          elseif(isset($invMake) && isset($invModel)) { 
	                        echo "Modify$invMake $invModel"; }?></h1>
                <?php if (isset($message)) {echo $message;} ?>   
                <p>*Note all Fields are Require</p>
                <form method="post" action="/phpmotors/vehicles/index.php"> 
                    <!-- See if a "$message" variable exists, and if so, to echo it -->
                    <?php echo $selectList; ?>    
                    <label class="top">Make <input type="text" name="invMake" id="invMake" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>></label>
                    <label class="top">Model <input type="text" name="invModel" id="invModel" required <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>></label>
                    <label class="top">Description <input type="text" name="invDescription" required <?php if(isset($invDescription)){ echo "value='$invDescription'"; } elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; }?>></label>
                    <label class="top">Image Path <input type="text" name="invImage" required <?php if(isset($invImage)){ echo "value='$invImage'"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>></label>
                    <label class="top">Thumbnail Path<input type="text" name="invThumbnail" required <?php if(isset($invThumbnail)){ echo "value='$invThumbnail'"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>></label>
                    <label class="top">Price <input type="number" step="any" name="invPrice" required <?php if(isset($invPrice)){ echo "value='$invPrice'"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>></label>
                    <label class="top">Stock <input type="number" step="any" name="invStock" required <?php if(isset($invStock)){ echo "value='$invStock'"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>></label>
                    <label class="top">Color <input type="text" name="invColor" required <?php if(isset($invColor)){ echo "value='$invColor'"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>></label>
                    <input type="submit" name="submit" id="regbtn" value="Update Vehicle" class="submitBtn">
                    <input type="hidden" name="action" value="updateVehicle">
                    <input type="hidden" name="invId" value="
                    <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
                    elseif(isset($invId)){ echo $invId; } ?>
                    ">
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