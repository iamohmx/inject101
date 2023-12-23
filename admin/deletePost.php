<?php 
session_start();
require_once('core/connect.php');
require_once('chk_user.php');

if(isset($_POST['deletePost'])){
    $id = $_GET['post_id'];
    $sql_delete = "DELETE FROM posts WHERE post_id = $id";
    $query_delete = mysqli_query($conn, $sql_delete);

    if($query_delete){
        $_SESSION['succ_msg'] = 'ลบข้อมูลเรียบร้อยแล้ว';
        header("location: index.php");
    } else {
        $_SESSION['err_msg'] = 'ลบข้อมูลไม่สำเร็จโปรดตรวจสอบอีกครั้ง!';
        header("location: index.php");
    }
}   

?>