<?php

session_start();

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "abc@123"; /* Password */
$dbname = "phpcrud"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}