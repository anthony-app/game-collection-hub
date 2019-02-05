<?php

/*
* Anthony A----------
*
* PHP file to show user has logged out. This page destroys the session (logs user out)
*/

session_start();
session_destroy();

$success = "SUCCESS: You have been logged out. <a href='index.html'>Log Back In</a>"

?>

<!DOCTYPE html>

<html>
    
    <head>
        
        <title>Logged Out</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        
    </head>
    
    <body>

        <br>

        <div id="hdr">
            <h1>----- VIDEO GAME COLLECTION -----</h1>
        </div>

        <div id='banner'>
                <br>
        </div>

        <br><br>
        
        <h3 class="logoutMessage">You have been logged out.</h3>
        
        <br><br>
        
        <!-- Back button for user to retry log in -->    
        <div id="containerRL">
                <form action="index.html">
                    <button type="submit" class="relog">LOG BACK IN</button>
                </form>
        </div>

        <br><br>

        <?= $success ?>
        
        <br>    
        
        <div id='bar'>
                <br>
        </div>
        
    </body>
    
</html>