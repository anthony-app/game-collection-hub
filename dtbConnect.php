
<?php
/**
 * Anthony A----------
 * Code to connect to the phpMyAdmin database
 */

try {
    $dbh = new PDO('mysql:host=localhost;dbname=localhost', "root", "");
} catch (Exception $e) {
    die('Failure. Could not connect to the Database: ' . $e->getMessage());
}







