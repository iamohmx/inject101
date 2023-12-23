<?php 

// ตรวจสอบว่าผู้ใช้ได้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
}

?>