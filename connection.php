

<?php
//change mysqli_connect(host_name,username, password); 
$connection = mysqli_connect("localhost", "root", "");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$db = mysqli_select_db($connection, 'demo');

if (!$db) {
    die("Database selection failed: " . mysqli_error($connection) . "<br><br>Please create the 'demo' database in phpMyAdmin and import the demo.sql file from the database folder!");
}
?>
