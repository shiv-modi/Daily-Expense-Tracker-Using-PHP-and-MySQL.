
<?php

$host = "localhost"; // change this to your MySQL hostname
$user = "root"; // change this to your MySQL username
$pass = ""; // change this to your MySQL password
$dbname = "expenditure"; // change this to your MySQL database name

$db = new mysqli($host, $user, $pass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
