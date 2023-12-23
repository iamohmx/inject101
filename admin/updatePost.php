<?php 
session_start();
require_once('core/connect.php');
require_once('chk_user.php');

if(isset($_POST['updatePost'])){
    $id = $_GET['post_id'];
    $user_id = $_SESSION['user_id'];
    $cat_id = $_POST['cat_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    // echo $id;
    // exit;
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
        $sql_update = "UPDATE
                            posts
                        SET
                        user_id = $user_id,
                        cat_id = $cat_id,
                        title = '$title',
                        content = '$content',
                        image = '$image',
                        updated_at = date('Y-m-d H:i:s')
                    WHERE post_id = $id";
        $query_update = mysqli_query($conn, $sql_update);
        if($query_update){
            $_SESSION['succ_msg'] = 'แก้ไขข้อมูลเรียบร้อยแล้ว';
            header("location: index.php");
        } else {
            $_SESSION['err_msg'] = 'แก้ไขข้อมูลไม่สำเร็จโปรดตรวจสอบอีกครั้ง!';
            header("location: index.php");
        }
    }

    

    // print_r($user_id);
    
}

?>