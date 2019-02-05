<?php

/* 
 * Anthony A----------
 *
 * PHP file that displays the record(s) in the game collection database
 * User can choose to sort by release date or number of copies
 * If they want to refresh the table, they can hit "View Games" in the NAV bar
 */

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
        
        <h3>Games List</h3>

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

            <form method="POST">
                <button type="submit" class="sortdate" name="sortdate">SORT BY DATE</button>
                <button type="submit" class="sortdate" name="sortcopies">SORT BY COPIES</button>
            </form>

            <br>        
                <?php

                // table outer border and headings (database column names)
                echo "<table style='border: solid 3px black;'>";
                echo "<tr><th>game_id</th><th>game_name</th><th>platform</th><th>number_of_copies</th><th>release_date</th><th>description</th></tr>";

                // class to create table from database
                class TableRows extends RecursiveIteratorIterator { 
                    function __construct($it) { 
                        parent::__construct($it, self::LEAVES_ONLY); 
                    }

                    // table data function
                    function current() {
                        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
                    }

                    // start of row function
                    function beginChildren() { 
                        echo "<tr>"; 
                    } 

                    // end of row function
                    function endChildren() { 
                        echo "</tr>" . "\n";
                    } 
                } 

                // attempt to connect to database to have access to the game collection table
                try {
                    $dbh = new PDO('mysql:host=localhost;dbname=000767707', "000767707", "19940313");
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // command for sql code to view entire table
                    $command = "SELECT game_id, game_name, platform, number_of_copies, release_date, description FROM game_collection";
                    // if statement to change the table view to be ordered by release date
                    if(isset($_POST["sortdate"])) {
                        $command = "SELECT game_id, game_name, platform, number_of_copies, release_date, description FROM game_collection ORDER BY release_date ASC";
                    }
                    // if statement to change the table view to be ordered by number of copies
                    if(isset($_POST["sortcopies"])) {
                        $command = "SELECT game_id, game_name, platform, number_of_copies, release_date, description FROM game_collection ORDER BY number_of_copies DESC";
                    }

                    $stmt = $dbh->prepare($command); 
                    $stmt->execute();

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

                    // print of each row
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key=>$value) { 
                        echo "$value";
                    }
                }
                // error for connecting to dtb
                catch (PDOException $e) {
                    echo "Failure. Could not connect to the Database: " . $e->getMessage();
                }

                $dbh = null;
                echo "</table>";

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