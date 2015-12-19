<?php 
    session_start();   
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
        <h1>Welcome, <i>ADD USER NAME HERE</i></h1>
        <form action="../plan.php" method="post" target="_top">
            <button class="submit-button" type="submit">Plan Trip</button>
        </form>

        <form action="mytrip.php" method="post" target="_top">
            <button class="submit-button" type="submit">My Trips</button>
        </form>

        <form action="trophies.php" method="post" target="_top">
            <button class="submit-button" type="submit">Trophies</button>
        </form>

        <form action="starttrip.php" method="post" target="_top">
            <button class="submit-button" type="submit">Start Trip</button>
        </form>
    </body>
</html>