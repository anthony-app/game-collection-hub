<?php

/* 
 * Anthony Aplidgiotis
 * HTML file that includes a form for the user to add a record to the game collection database
 */

// connects to dtb  
include "dtbConnect.php";

session_start();

?>

<!DOCTYPE html>

<html>
    
    <head>
        
        <title>Add Video Game Record</title>
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
        
        <h3>Add Game</h3>

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
        
        <!-- Add Game Form -->    
        <div id="dtbDisplay">
        	<br>
                <form action="addGame.php" method="POST">
                    <label>Game ID:</label>  
                    <input type="number" name="game_id" placeholder="ex. 52">
                    <br><br>
                    <label>Game Name:</label> 
                    <input type="text" name="game_name" placeholder="ex. Pac-Man">
                    <br><br>
                    <label>Platform:</label>  
                    <input type="text" name="platform" placeholder="ex. Playstation 2">
                    <br><br>
                    <label>Number of Copies:</label>  
                    <input type="number" name="number_of_copies" min="1">
                    <br><br>
                    <label>Release Date:</label>  
                    <input type="date" name="release_date">
                    <br><br>
                    <label>Description:</label>  
                    <input type="text" name="description">
                    <br><br>
                    <button type="submit" class="but">ADD GAME</button>
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