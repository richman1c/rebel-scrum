<?php 
    session_start();   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rebel Scrum Registration</title>
        <link rel="shortcut icon" href="images/icons/icon.ico">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Author" content="rebel-scrum" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

        <link rel="stylesheet" href="../css/csselements_mobile.css" />

        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    </head>

    <body>
        <form action="../lib/Registration.php" method="post" target="_top">
        <?php 
            if(isset($_SESSION['validation_errs'])) {
                echo $_SESSION['validation_errs'];
            }
        ?>
        <h2>User Information</h2>
        <table style="margin-left: 20px;">
            <tr>
                <td>First Name:</td>
                <td><input class="inputbox-mod" type="text" placeholder="First" name="u_fname"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input class="inputbox-mod" type="text" placeholder="Last" name="u_lname"></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>
                    <input class="inputbox-mod-phone-short" type="text" placeholder="555" name="u_phone_1">
                    <input class="inputbox-mod-phone-short" type="text" placeholder="555" name="u_phone_2">
                    <input class="inputbox-mod-phone-long" type="text" placeholder="5555" name="u_phone_3">
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <select class="selectbox-mod" name="u_month">
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                    </select>
                    <select class="selectbox-mod" name="u_day">
                        <?php
                            for ($i=1; $i <= 31; $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }  
                        ?>
                    </select>
                    <select class="selectbox-mod" name="u_year">
                        <?php
                            for ($i=1900; $i <= date('Y'); $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }  
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input class="inputbox-mod" type="text" placeholder="you@email.com" name="u_email"></td>
            </tr>
            <tr>
                <td>Confirm Email:</td>
                <td><input class="inputbox-mod" type="text" placeholder="you@email.com" name="u_confirmemail"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input class="inputbox-mod" type="text" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="u_pass"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input class="inputbox-mod" type="text" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" name="u_confirmpass"></td>
            </tr>
        </table>

        <h2>Emergency Contacts</h2>
        
        <h3>Primary</h3>
        <table style="margin-left: 20px;">
            <tr>
                <td>First Name:</td>
                <td><input class="inputbox-mod" type="text" placeholder="First" name="e1_fname"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input class="inputbox-mod" type="text" placeholder="Last" name="e1_lname"></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>
                    <input class="inputbox-mod-phone-short" type="text" placeholder="555" name="e1_phone_1">
                    <input class="inputbox-mod-phone-short" type="text" placeholder="555" name="e1_phone_2">
                    <input class="inputbox-mod-phone-long" type="text" placeholder="5555" name="e1_phone_3">
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <select class="selectbox-mod" name="e1_month">
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                    </select>
                    <select class="selectbox-mod" name="e1_day">
                        <?php
                            for ($i=1; $i <= 31; $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }  
                        ?>
                    </select>
                    <select class="selectbox-mod" name="e1_year">
                        <?php
                            for ($i=1900; $i <= date('Y'); $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }  
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input class="inputbox-mod" type="text" placeholder="you@email.com" name="e1_email"></td>
            </tr>
            <tr>
                <td>Confirm Email:</td>
                <td><input class="inputbox-mod" type="text" placeholder="you@email.com" name="e1_confirmemail"></td>
            </tr>
        </table>

        <h3>Secondary</h3>
        <table style="margin-left: 20px;">
            <tr>
                <td>First Name:</td>
                <td><input class="inputbox-mod" type="text" placeholder="First" name="e2_fname"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input class="inputbox-mod" type="text" placeholder="Last" name="e2_lname"></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>
                    <input class="inputbox-mod-phone-short" type="text" placeholder="555" name="e2_phone_1">
                    <input class="inputbox-mod-phone-short" type="text" placeholder="555" name="e2_phone_2">
                    <input class="inputbox-mod-phone-long" type="text" placeholder="5555" name="e2_phone_3">
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <select class="selectbox-mod" name="e2_month">
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                    </select>
                    <select class="selectbox-mod" name="e2_day">
                        <?php
                            for ($i=1; $i <= 31; $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }  
                        ?>
                    </select>
                    <select class="selectbox-mod" name="e2_year">
                        <?php
                            for ($i=1900; $i <= date('Y'); $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }  
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input class="inputbox-mod" type="text" placeholder="you@email.com" name="e2_email"></td>
            </tr>
            <tr>
                <td>Confirm Email:</td>
                <td><input class="inputbox-mod" type="text" placeholder="you@email.com" name="e2_confirmemail"></td>
            </tr>
        </table>

        <br />
        
        
            <table style="margin-left:auto;margin-right:auto;">
                <tr>
                    <td><button class="submit-button" type="submit">Register</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>
