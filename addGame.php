<?php

/* 
 * Anthony Aplidgiotis
 * This file will add a new game the user inputs to the game collection database
 */

// connects to dtb  
include "dtbConnect.php";

session_start();

// POST parameters for the users input - allow the user to add a new game to game collection database
$gameid = filter_input(INPUT_POST, "game_id", FILTER_SANITIZE_SPECIAL_CHARS);
$gamename = filter_input(INPUT_POST, "game_name", FILTER_SANITIZE_SPECIAL_CHARS);
$platform = filter_input(INPUT_POST, "platform", FILTER_SANITIZE_SPECIAL_CHARS);
$copies = filter_input(INPUT_POST, "number_of_copies", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_VALIDATE_INT);
$releasedate = filter_input(INPUT_POST, "release_date", FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);

// Check to see if valid values were entered
if ($gameid !== NULL && $gamename !== NULL && $platform !== NULL && $copies !== NULL && $releasedate !== NULL) {
	// command for sql code to insert new game
    $command = "INSERT INTO game_collection (game_id, game_name, platform, number_of_copies, release_date, description)"
            . "VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($command);
    // user parameter array to stop sql injection
    $userParams = [$gameid, $gamename, $platform, $copies, $releasedate, $description];
    $success = $stmt->execute($userParams);

    if ($success) {
        $message = "<p>SUCCESS: New Game was added to the game collection database (game_id: {$dbh->lastInsertId()})</p>";
    }
    else {
        $message = "<p>Failure in adding game to the collection</p>";
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
        
        <!-- Add Game SQL Code -->    
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