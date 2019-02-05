<?php

/* 
 * Anthony A----------
 * HTML file that includes a form for the user to delete a record in the game collection database
 */

// connects to dtb  
include "dtbConnect.php";

session_start();

?>

<!DOCTYPE html>

<html>
    
    <head>
        
        <title>Delete Video Game Record</title>
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
        
        <h3>Delete Game</h3>

        <nav>

			<ul>

                <li><a href="viewForm.php">View Games</a></li>
                |
                <li><a href="searchForm.php">Search</a></li>
                |
                <li><a href="addForm.php">Add Game</a></li>
                |
                <li><a href="deleteForm.php">Delete Game</a></li>
                |
                <li><a href="updateForm.php">Update Game</a></li> 

            </ul>
			
		</nav>

		<br>
        
        <!-- Delete Game Form -->     
        <div id="dtbDisplay">
            <br>
                <form action="deleteGame.php" method="POST">
                    <label>Game ID:</label> 
                    <input type="number" name="game_id">
                    <br><br>
                    <button type="submit" class="but">DELETE GAME</button>
                </form>
            <br>
            <p><a href="viewForm.php">BACK TO GAMES LIST</a></p>
        </div>

        <br>

        <form action="logout.php">
            <button type="submit" class="logout">LOG OUT</button>
        </form>
        
        <br>    
        
        <div id='bar'>
                <br>
        </div>
        
    </body>
    
</html>