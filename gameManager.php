<?php

/* 
 * Anthony A----------
 *
 * PHP file in order to determine if the user has successfully / failed to log in.
 * If the user is successful in logging in, they are given the options to view, add, delete, or update a record in the collection.
 * Else, the user will be redirected to a failed log in page and asked to try again logging in.
 */


// connects to dtb  
include "dtbConnect.php";

session_start();
	
// variables for log in information
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

if(isset($_POST["loginBut"])) {
	// allows access only if log in is successful                   
	if ($username == "phpA3" && $password == "pass1") {
		$_SESSION["username"] = $username;
	    header ("Location: gameManager.php");
	}
	// redirect to page to retry log in
	else {
	    header ("Location: loginFail.html");
	}
}


/*

        		// variables for log in information
				$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
				$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

				// allows access only if log in is successful                   
				if ($username == "phpA3" && $password == "pass1") {
				    echo "<h2 class='valid'>Log in was successful</h2>";
				}
				// redirect to page to retry log in
				else {
				    header ("Location: loginFail.html");
				}

*/


?>

<!DOCTYPE html>

<html>
    
    <head>
        
        <title>Game Collection Manager</title>
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
        
        <h3>Game Collection Database Manager</h3>

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
        
        <!-- Options for User to alter / view database -->    
        <div id="dtbDisplay">
        	<br>
        		<?php
        		echo "<h2 class='valid'>Log in was successful. Welcome " . $_SESSION["username"] . "</h2>";
        		?>
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