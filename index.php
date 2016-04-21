<?php

/*
c:\xampp>cd c:\xampp\apache\bin

c:\xampp\apache\bin>htpasswd.exe -c .htpasswd admin
New password: *****
Re-type new password: *****
Adding password for user admin
*/


/*function add($param1, $param2 ) {
    return ($param1+$param2)*2;
}

$datetime=time();
//echo time()."<br>";
echo $datetime."<br>";

for ($i=0;$i<10;$i++){
    echo $i."<br>";
    }

echo '($param1+$param2)*2 = '.add(1,2)."<br>";

*/
require_once("database.php");
require_once("models/articles.php");

$link = db_connect();
$articles = articles_all($link);

include("views/articles.php");
?>

