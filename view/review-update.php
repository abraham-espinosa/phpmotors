<?php
    // Check if theres is a session created
    if(!$_SESSION['loggedin']){
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
    <title>Update | Review</title>
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
                <h1><?php if(isset($reviewInfo['invMake']) && isset($reviewInfo['invModel'])){ 
	                        echo "$reviewInfo[invMake] $reviewInfo[invModel] Review";} ?></h1>
                <?php if (isset($message)) {echo $message;} ?>  
                <p><?php if(isset($reviewInfo['reviewDate'])){ 
                            $dayDate = date('j', strtotime($review['reviewDate']));
                            $monthDate = date('F', strtotime($review['reviewDate']));
                    echo "Reviewed on $monthDate $dayDate";} ?></p>
                <form method="post" action="/phpmotors/reviews/index.php"> 
                    <!-- See if a "$message" variable exists, and if so, to echo it -->
                    <label class="top">Review Text<input type="text" name="reviewText" required <?php if(isset($reviewInfo['reviewText'])){ echo "value='$reviewInfo[reviewText]'"; } ?>></label>
                    <input type="submit" name="submit" id="regbtn" value="Update Review" class="submitBtn">
                    <input type="hidden" name="action" value="updateReview">
                    <input type="hidden" name="reviewId" value="<?php if(isset($reviewId)){ echo $reviewId;} ?>">
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