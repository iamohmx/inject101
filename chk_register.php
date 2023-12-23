<?php 
session_start();
require_once('core/connect.php');

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if(empty($username)){
        $_SESSION['err_msg'] = 'กรุณาป้อนชื่อผู้ใช้';
        header("location: register.php");
    } else if(empty($email)){
        $_SESSION['err_msg'] = 'กรุณาป้อนอีเมล์';
        header("location: register.php");
    } else if(empty($password)){
        $_SESSION['err_msg'] = 'กรุณาป้อนรหัสผ่าน';
        header("location: register.php");
    } else if($password !== $cpassword){
        $_SESSION['err_msg'] = 'ป้อนรหัสผ่านไม่ตรงกัน';
        header("location: register.php");
    }

    $chk_user = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
    $chk_query = mysqli_query($conn, $chk_user);
    $user = mysqli_fetch_assoc($chk_query);

    if($user['username'] === $username) {
        $_SESSION['err_msg'] = "ชื่อผู้ใช้ถูกใช้งานแล้ว";
        header("location: register.php");
        // $_SESSION['succ_msg'] = "เข้าสู่ระบบเรียบร้อย";
    } else if($user['email'] === $email) {
        $_SESSION['err_msg'] = "อีเมล์ถูกใช้งานแล้ว";
        header("location: register.php");
        // $_SESSION['succ_msg'] = "เข้าสู่ระบบเรียบร้อย";
    } else if(!$_SESSION['err_msg']){
        $sql_reg = "INSERT INTO users (username, password, email) VALUES ('$username','$password','$email')";
        $conn = mysqli_query($conn ,$sql_reg);
        $_SESSION['succ_msg'] = "ลงทะเบียนรียบร้อยแล้ว <b>เข้าสู่ระบบ</b>";
        header("location: login.php");
    }
} else {
    header("location: register.php");
}

?>