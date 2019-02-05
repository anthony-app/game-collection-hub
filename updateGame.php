<?php

/* 
 * Anthony A----------
 *
 * This file will update a game the user inputs in the game collection database - via game_id
 */

// connects to dtb  
include "dtbConnect.php";

session_start();

// POST parameters for the users input - allow the user to change fields of a game in the game collection database
$gameid = filter_input(INPUT_POST, "game_id", FILTER_VALIDATE_INT);
$gamename = filter_input(INPUT_POST, "game_name", FILTER_SANITIZE_SPECIAL_CHARS);
$platform = filter_input(INPUT_POST, "platform", FILTER_SANITIZE_SPECIAL_CHARS);
$copies = filter_input(INPUT_POST, "number_of_copies", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_VALIDATE_INT);
$releasedate = filter_input(INPUT_POST, "release_date", FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);

// if statement to see if the fields are empty
if ($gameid != NULL && $gameid != false && $gamename != NULL && $gamename != false && $platform != NULL && $platform != false && $copies != NULL && $copies != false
    && $releasedate != NULL && $releasedate != false) {
    if ($gamename !== false && $gamename != NULL && $platform !== false && $platform != NULL && $copies !== false && $copies != NULL && $releasedate !== false && $releasedate != NULL) {
        // sql command to update a game collection record
        $command = "UPDATE game_collection SET game_name=?, platform=?, number_of_copies=?, release_date=?, description=? WHERE game_id=?";
        $stmt = $dbh->prepare($command);
        // user parameter array to stop sql injection
        $userParams = [$gamename, $platform, $copies, $releasedate, $description, $gameid];
        $success = $stmt->execute($userParams);

        if ($success && $stmt->rowCount() > 0) {
            $message = "<p>The desired game has been updated in the collection</p>";
        }
        else {
            $message = "<p>Sorry there was an error in updating the game</p>";
        }
    }
}
// error message if they did not meet parameters
else {
    $message = "<p>Error - Parameters have not been met</p>";
    $command = "";
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
        
        <!-- Update Game SQL Code -->    
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