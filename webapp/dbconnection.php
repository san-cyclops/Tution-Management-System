<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','abc@123');
define('DB_NAME','phpcrud');
try
{
	$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
	exit("Error: " . $e->getMessage());
}

$con=mysqli_connect("localhost", "root", "abc@123", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=phpcrud', 'root', '');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>