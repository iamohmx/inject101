<?php 

if($_SESSION['user_level'] !== 'admin'){
    header("location: ../logout.php");
}

?>