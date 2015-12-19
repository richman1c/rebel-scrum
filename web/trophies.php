<?php 
    session_start();   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rebel Scrum Trophies</title>
        <link rel="shortcut icon" href="images/icons/icon.ico">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Author" content="rebel-scrum" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

        <link rel="stylesheet" href="../css/csselements_mobile.css" />

        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    </head>

    <body>
        <h1>Trophies</h1>
        <?php 
            echo "<table border='1'>";
            echo "<th>Date</th> <th>Animal</th> <th>Size</th> <th>Alive</th>";
            //loop through all trophy data
                echo "<tr><td>ok</td><td>ok</td><td>ok</td><td>ok</td></tr>";
            echo "</table>";
        ?>
    </body>
</html>