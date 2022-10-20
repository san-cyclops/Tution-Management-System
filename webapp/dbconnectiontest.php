<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php

$dbname = 'phpcrud';
$dbuser = 'root';
$dbpass = 'abc@123';
$dbhost = 'localhost';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect,$dbname) or die("Could not open the db '$dbname'");

$test_query = "select * FROM $dbname.tblusers";
$result = mysqli_query($connect,$test_query);

$tblCnt = 0;
while ($tbl = mysqli_fetch_array($result)) {
    $tblCnt++;
    #echo $tbl[0]."<br />\n";
}

if (!$tblCnt) {
    echo "There are no tables<br />\n";
} else {
    echo "There are $tblCnt tables<br />\n";
}
