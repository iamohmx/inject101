<?php 
session_start();
require_once('core/connect.php');
require_once('chk_user.php');

if(isset($_POST['addPost'])){
    $user_id = $_SESSION['user_id'];
    $cat_id = $_POST['cat_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    if(empty($cat_id)){
        $_SESSION['err_msg'] = 'กรุณาป้อนหมวดหมู่';
        header("location: index.php");
    } else if(empty($title)){
        $_SESSION['err_msg'] = 'กรุณาป้อนหัวข้อ';
        header("location: index.php");
    } else if(empty($content)){
        $_SESSION['err_msg'] = 'กรุณาป้อนเนื้อหา';
        header("location: index.php");
    } else if(empty($image)){
        $_SESSION['err_msg'] = 'กรุณาป้อนลิงก์รูปภาพ';
        header("location: index.php");
    } else {
        $sql_add = "INSERT INTO posts (user_id, cat_id, title, content, image) VALUES ('$user_id', '$cat_id', '$title', '$content', '$image')";
        $query_add = mysqli_query($conn, $sql_add);
        if($query_add){
            $_SESSION['succ_msg'] = 'เพิ่มข้อมูลเรียบร้อยแล้ว';
            header("location: index.php");
        } else {
            $_SESSION['err_msg'] = 'เพิ่มข้อมูลไม่สำเร็จโปรดตรวจสอบอีกครั้ง!';
            header("location: index.php");
        }
    }

    

    // print_r($user_id);
    
}

?>