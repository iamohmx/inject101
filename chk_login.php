<?php 
session_start();
require_once('core/connect.php');


// login
if(isset($_POST['login'])){
    // check login
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    // echo "{$username} : {$password}";

    // exit;
    $chk = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $chk_query = mysqli_query($conn, $chk);
    // $result = mysqli_fetch_assoc($chk_query);

    if(mysqli_num_rows($chk_query) > 0) {
        $user = mysqli_fetch_assoc($chk_query);

        // session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_level'] = $user['user_level'];

        if($_SESSION['user_level'] === "admin") {
            header("location: admin/index.php");
        } else if($_SESSION['user_level'] === "member") {
            header("location: member/index.php");
        } else {
            header("location: index.php");
        }
        // $_SESSION['succ_msg'] = "เข้าสู่ระบบเรียบร้อย";
        
    } else {
        $_SESSION['err_msg'] = "User Not Found!!";
        header("location: login.php");
    }
} else {
    header("location: login.php");
}

?>