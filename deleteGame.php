<?php

/* 
 * Anthony A----------
 * This file will delete a game the user inputs to the game collection database - via game_id
 */

// connects to dtb  
include "dtbConnect.php";

session_start();

// POST parameters for the users input - allow the user to delete a game from the game collection database
$gameid = filter_input(INPUT_POST, "game_id", FILTER_VALIDATE_INT);

// checks to see if there is a valid input
if ($gameid != NULL && $gameid != false) {
    if ($gameid < 11  ) {
        $message = "<p>Sorry, that game cannot be deleted from the collection</p>";
    }
    else {
        // sql code to delete a record
        $command = "DELETE FROM game_collection WHERE game_id=?";
        $stmt = $dbh->prepare($command);
        // user parameter array to stop sql injection
        $userParams = [$gameid];
        if ($stmt->execute($userParams) && $stmt->rowCount() > 0) {
        $message = "<p>game_id: $gameid has now been deleted from the game collection</p>";
        }
        else {
            $message = "<p>game_id: $gameid could not be deleted from the collection</p>";
        }
    }
}
// error message if they did not meet parameters
else {
    $message = "<p>Error - Parameters have not been met</p>";
    $delcommand = "";
}

?>

<!DOCTYPE html>

<html>
    
    <head>
        
        <title>Added Game SQL</title>
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
        
        <h3>Added Game</h3>

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
        
        <!-- Delete Game SQL Code -->    
        <div id="dtbDisplay">
            <br>
                <p><strong><?= $message ?></strong></p>
                Query: <i style='color:white'><?= $command ?></i>
                <br>
                <p><a href="viewForm.php">BACK TO GAMES LIST</a></p>
            <br>
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