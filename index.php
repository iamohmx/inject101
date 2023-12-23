<?php
require_once('layouts/header.php');
require_once('layouts/navbar.php');

// query 
$sql_post = "SELECT * FROM posts";
$query_post = mysqli_query($conn, $sql_post);
$total_result = mysqli_num_rows($query_post);

$limit_page = 6;
$page = @$_GET['page'] ? $_GET['page'] : 1;


$num_page = $total_result / $limit_page;
if (!($num_page == (int)$num_page))
    $num_page = (int)$num_page + 1;

if ($page > $num_page)
    $page = $num_page;

$limit_start = ($page * $limit_page) - $limit_page;
// End calc pagination

// get categ with id
$cat_id = @$_GET['cat_id'];
if(empty($cat_id)){
    $sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT {$limit_start},{$limit_page}";
} else {
    $sql = "SELECT * FROM posts WHERE cat_id = $cat_id ORDER BY post_id DESC LIMIT {$limit_start},{$limit_page}";
}

$query =  mysqli_query($conn, $sql);


?>

<h1 class="text-center py-3 fw-bold">BOAT LOVE NOII 101</h1>
<div class="container py-5">
    <div class="row g-5">
        <?php

        if (mysqli_num_rows($query) > 0) :
            while ($row = mysqli_fetch_assoc($query)) :
        ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="card h-100">
                        <img src="<?php echo $row['image'] ?>" class="card-img-top" alt="<?php echo $row['image'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <a class="btn btn-primary" href="post_content.php?id=<?php echo $row['post_id'] ?>">Read more</a>
                            <?php else : ?>
                                <a class="btn btn-danger" href="login.php">เข้าสู่ระบบก่อนครับ!</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        else :
            echo "No content!!";
        endif;
        ?>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php
                if ($page <= 1) :
                ?>
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                <?php
                else :
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo (int)$page - 1 ?>">Previous</a>
                    </li>
                <?php
                endif;
                ?>
                <!-- ............................................. -->
                <?php

                if ($page > 5) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=1">1</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                <?php
                }
                ?>
                <!-- .............................................. -->
                <?php
                // i should make in function lol!


                if ($num_page >= 9) {
                    if ($page <= 5) {
                        $num_start = 1;
                        $num_stop = 9;
                    } elseif ($page > $num_page - 4) {
                        $num_start = $num_page - 8;
                        $num_stop = $num_page;
                    } else {
                        $num_start = $page - 4;
                        $num_stop = $page + 4;
                    }
                } else {
                    $num_start = 1;
                    $num_stop = $num_page;
                }

                for ($i = $num_start; $i <= $num_stop; $i++) :
                    if ($page == $i) :
                ?>


                        <li class="page-item">
                            <a class="page-link active" aria-current="page" href="?page=<?php echo $i; ?>"><?php echo $i;  ?></a>
                        </li>
                    <?php
                    else :
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i;  ?></a>
                        </li>
                    <?php

                    endif;

                    ?>
                <?php endfor; ?>
                <!-- ............................................. -->
                <?php

                if ($page < $num_page - 5) :
                ?>
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $num_page ?>"><?= $num_page ?></a>
                    </li>

                <?php
                endif;
                ?>
                <!-- .............................................. -->
                <?php
                if ($page >= $num_page) :
                ?>
                    <li class="page-item disabled">
                        <a class="page-link">Next</a>
                    </li>
                <?php
                else :
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo (int)$page + 1 ?>">Next</a>
                    </li>
                <?php
                endif;
                ?>
        </nav>
    </div>
</div>

<?php

require_once('layouts/footer.php');

?>