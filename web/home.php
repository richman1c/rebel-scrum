<?php 
    session_start();
    include('../lib/server-client.php');
    
    $sql = "CALL getPoints(?,?)";
    $stmt = mysqli_prepare($con,$sql);
    $a="TESTTRIP1";
    $b="TRIP";
    mysqli_stmt_bind_param($stmt,'ss',$a,$b);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    serverDataToCookie($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rebel Scrum Home</title>
        <link rel="shortcut icon" href="images/icons/icon.ico">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Author" content="rebel-scrum" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

        <link rel="stylesheet" href="../css/csselements_mobile.css" />

        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    </head>

    <body>
        <h1>Welcome, <?php echo $_SESSION["userID"] ?></h1>
        <form action="plan.php" method="post" target="_top">
            <button class="submit-button-long" type="submit">Plan Trip</button>
        </form>

        <form action="mytrip.php" method="post" target="_top">
            <button class="submit-button-long" type="submit">My Trips</button>
        </form>

        <form action="trophies.php" method="post" target="_top">
            <button class="submit-button-long" type="submit">Trophies</button>
        </form>

        <form action="starttrip.php" method="post" target="_top">
            <button class="submit-button-long" type="submit">Start Trip</button>
        </form>
    </body>
</html>