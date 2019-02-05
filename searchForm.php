<?php

/* 
 * Anthony A----------
 *
 * PHP file that allows the user to search through the game collection database
 */

// connects to dtb  
include "dtbConnect.php";

session_start();

?>

<!DOCTYPE html>

<html>
    
    <head>
        
        <title>View Video Game Record</title>
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
        
        <h3>Search</h3>

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
        
        <!-- View Game Form -->    
        <div id="dtbView">

            <div id="dtbDisplay">
            <br>
                <form method="POST">
                    <label>Platform:</label>  
                    <input type="text" name="searchplat" placeholder="ex. Playstation 2">
                    <br><br>
                    <button type="submit" class="but">SEARCH PLATFORM</button>
                </form>
            <br>
            <p><a href="viewForm.php">BACK TO GAMES LIST</a></p>
            </div>

            <br>        
                <?php

                $platform = filter_input(INPUT_POST, "searchplat", FILTER_SANITIZE_SPECIAL_CHARS);

                if ($platform !== NULL) {
                    // command for sql code to view entire table
                    $command = "SELECT game_id, game_name, platform, number_of_copies, release_date, description FROM game_collection WHERE platform=? ORDER BY platform ASC";
                    $stmt = $dbh->prepare($command);
                    // user parameter array to stop sql injection
                    $userParams = [$platform];
                    $success = $stmt->execute($userParams);
                    if ($success) {
                            $message = "<p>SUCCESS: Platform has been found (platform: {$dbh->lastInsertId()})</p>";
                        }
                    else {
                        $message = "<p>Failure in finding platform</p>";
                    }
                }
                // error message if they did not meet parameters
                else {
                    $message = "<p>Error - Parameters have not been met</p>";
                    $command = "";
                }
                
                ?>

            <br>
                <p><strong><?= $message ?></strong></p>
                Query: <i style='color:white'><?= $command ?></i>
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