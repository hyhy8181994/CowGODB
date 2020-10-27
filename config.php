
<?php
$dbhost_name = "adb.uoguelph.ca";
$database = "orthocowdb";// database name
$username = "orthocowdb"; // user n$databaseame
$password = "orthocowdb"; // password 

//////// Do not Edit below /////////
try {
#$dbo = new PDO('mysql:host=$dbhost_name; dbname='.$database, $username, $password);
	$dbo = mysqli_connect($dbhost_name, $database, $username, $password);
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
?> 

