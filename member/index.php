<?php 

session_start();
    require_once('chk_user.php');
    
    echo $_SESSION['username'];

?>

<a href="../index.php">หน้าแรก</a>
<a href="../logout.php">logout</a>
