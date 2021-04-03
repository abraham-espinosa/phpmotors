<?php// Check if theres is a session created
if(!$_SESSION['loggedin']){header('location:/phpmotors/index.php');}
?><!DOCTYPE html>
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
            <form method="post" action="/phpmotors/accounts/index.php"> 
                <h1>Update Account Info</h1>
                <!-- See if a "$message" variable exists, and if so, to echo it -->
                <?php
                 if (isset($message)) {
                        echo $message;
                    }
                ?>      
                <label class="top">First Name <input type="text" name="clientFirstname" required value="<?php if(isset($_SESSION['clientData']['clientFirstname'])){ echo $_SESSION['clientData']['clientFirstname'];}?>"></label>
                <label class="top">Last Name <input type="text" name="clientLastname" required value="<?php if(isset($_SESSION['clientData']['clientLastname'])){ echo $_SESSION['clientData']['clientLastname'];}?>"></label>
                <label class="top">Email <input type="email" name="clientEmail" placeholder="someone@gmail.com" required value="<?php if(isset($_SESSION['clientData']['clientEmail'])){ echo $_SESSION['clientData']['clientEmail'];}?>"></label>
                <input type="submit" name="submit" id="updateInfBtn" value="Update Info" class="submitBtn">
                <input type="hidden" name="action" value="updateInfo">
                <input type="hidden" name="invId" value="
                    <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
                    elseif(isset($invId)){ echo $invId; } ?>
                    ">
            </form>
            <form method="post" action="/phpmotors/accounts/index.php"> 
                <h1>Update Password</h1>
                <!-- See if a "$message" variable exists, and if so, to echo it -->
                <?php
                 if (isset($message)) {
                        echo $message;
                    }
                ?>       
                <label class="top">Password <span><br>Must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span><input type="password" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required></label>
                <p>*note your original password will be changed.</p>
                <input type="submit" name="submit" id="updatePasBtn" value="Update Password" class="submitBtn">
                <input type="hidden" name="action" value="updateAccountPassword">
                <input type="hidden" name="invId" value="
                    <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
                    elseif(isset($invId)){ echo $invId; } ?>
                    ">
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