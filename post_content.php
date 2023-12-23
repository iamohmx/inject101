<?php
// require file
require_once('layouts/header.php');
require_once('layouts/navbar.php');
require_once('chk_user.php');
// get id
$post_id = $_GET['id'];
// query data
$sql_post = "SELECT
                    p.post_id,
                    p.title,
                    p.image,
                    p.content,
                    p.created_at,
                    u.username
                FROM posts p
                INNER JOIN users u ON p.user_id = u.user_id
                WHERE p.post_id = $post_id";


$query_post = mysqli_query($conn, $sql_post);
$row_post = mysqli_fetch_assoc($query_post);
?>

<h1 class="text-center fw-bold">
    <?php echo $row_post['title']; ?>
</h1>

<div class="container py-5">
    <div class="row g-3 justify-content-center">
        <!-- post content -->

        <div class="col-md-6">
            <div class="card h-100">
                <img src="<?php echo $row_post['image']; ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Posted by <b><?php echo $row_post['username']; ?></b> : <?php echo $row_post['created_at']; ?></small></p>
                    <p class="fs-4">
                        <?php echo $row_post['content']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="py-3"></div>
            <!-- comments content -->
            <h5 class="fw-bold">Comments: </h5>
            <hr class="w-100">
            <div class="row g-3">
                <?php
                $sql_post1 = "SELECT
                                    c.comment,
                                    c.commented_at,
                                    u.username
                                FROM comments c
                                INNER JOIN posts p ON p.post_id = c.post_id 
                                INNER JOIN users u  ON c.user_id = u.user_id
                                WHERE p.post_id = '$post_id'";
                $query_post1 = mysqli_query($conn, $sql_post1);

                if (mysqli_num_rows($query_post1) > 0) :
                    while ($row_post1 = mysqli_fetch_assoc($query_post1)) :
                ?>
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <h6>
                                    Commented By : <b><?php echo $row_post1['username']; ?></b>
                                </h6>

                                <h6 class="fw-bold">
                                    Date: <?php echo $row_post1['commented_at']; ?>
                                </h6>
                            </div>
                            <div>
                                Comment: <b><?php echo $row_post1['comment']; ?></b>
                            </div>
                            <hr class="w-100">
                        </div>
                <?php

                    endwhile;
                else :
                    echo "No Comment!!";
                endif;

                ?>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php
            if (isset($_SESSION['succ_msg'])) {
            ?>
                <div class="alert alert-success" role="alert">

                    <?php
                    echo $_SESSION['succ_msg'];
                    unset($_SESSION['succ_msg']);
                    ?>

                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION['err_msg'])) {
            ?>
                <div class="alert alert-danger" role="alert">

                    <?php
                    echo $_SESSION['err_msg'];
                    unset($_SESSION['err_msg']);
                    ?>

                </div>
            <?php
            }
            ?>
            <div class="py-3"></div>
            <form action="comment.php?post_id=<?php echo $row_post['post_id']; ?>" method="post">
                <div class="form-floating">
                    <textarea class="form-control" name="comment" placeholder="แสดงความคิดเห็น" id="comment"></textarea>
                    <label for="comment">Comments</label>
                </div>
                <br>
                <div class="d-flex justify-content-end">
                    <input class="btn btn-primary" role="button" name="addComment" type="submit" value="คอมเม้นท์">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once('layouts/footer.php');

?>