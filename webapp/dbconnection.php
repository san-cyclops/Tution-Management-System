<?php
$con=mysqli_connect("localhost", "root", "abc@123", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>