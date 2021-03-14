<?php
    // Check if theres is a session created
    if(!$_SESSION['loggedin']){
        header('Location: ../index.php');
    }
    if($_SESSION['clientData']['clientLevel'] < 2){
        header('Location: ../index.php');
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PHP Motors - BYUI" />
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		        echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
	      elseif(isset($invMake) && isset($invModel)) { 
		        echo "Delete $invMake $invModel"; } ?>
    <link href="/phpmotors/css/normalize.css" rel="stylesheet"></title>
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
	                        echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
                          elseif(isset($invMake) && isset($invModel)) { 
	                        echo "Delete$invMake $invModel"; }?></h1>
                <?php if (isset($message)) {echo $message;} ?>   
                <p>*Note all Fields are Require</p>
                <p>Confirm Vehicle Deletion. The delete is permanent.</p>
                <form method="post" action="/phpmotors/vehicles/index.php"> 
                    <!-- See if a "$message" variable exists, and if so, to echo it -->
                    <?php echo $selectList; ?>    
                    <label class="top">Make <input type="text" name="invMake" id="invMake" readonly <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>></label>
                    <label class="top">Model <input type="text" name="invModel" id="invModel" readonly <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>></label>
                    <label class="top">Description <input type="text" name="invDescription" readonly <?php if(isset($invDescription)){ echo "value='$invDescription'"; } elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; }?>></label>
                    <input type="submit" name="submit" id="regbtn" value="Delete Vehicle" class="submitBtn">
                    <input type="hidden" name="action" value="deleteVehicle">
                    <input type="hidden" name="invId" value="
                    <?php if(isset($invInfo['invId'])){
                        echo $invInfo['invId'];} ?>">

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