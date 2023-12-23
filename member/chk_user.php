<?php 

if($_SESSION['user_level'] !== 'member'){
    header("location: ../logout.php");
}

?>