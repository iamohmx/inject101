<?php 
date_default_timezone_set("Asia/Bangkok");
$dbhost = 'localhost';
$dbuser='root';
$dbpass='';
$dbname='my_blog_101';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    echo "Error!!";
}
?>