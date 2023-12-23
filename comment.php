<?php 
session_start();
require_once('core/connect.php');
require_once('chk_user.php');

if(isset($_POST['comment'])){
    $user_id = $_SESSION['user_id'];
    $post_id = $_GET['post_id'];
    $comment = $_POST['comment'];

    if(empty($comment)){
        $_SESSION['err_msg'] = 'กรุณาป้อนความคิดเห็น';
        header("location: post_content.php?id=" . $post_id);
    } else if(empty($post_id)){
        $_SESSION['err_msg'] = 'กรุณาเลือกหัวข้อ';
        header("location: post_content.php?id=" . $post_id);
    } 
    
    $sql_add = "INSERT INTO comments (user_id, post_id, comment) VALUES ($user_id, $post_id, '$comment')";
    $query_add = mysqli_query($conn, $sql_add);
    if($query_add){
        $_SESSION['succ_msg'] = 'แสดงความคิดเห็นเรียบร้อย';
        header("location: post_content.php?id=" . $post_id);
    } else {
        $_SESSION['err_msg'] = 'แสดงความคิดเห็นไม่สำเร็จโปรดตรวจสอบอีกครั้ง!';
        header("location: post_content.php?id=" . $post_id);
    }
}

?>