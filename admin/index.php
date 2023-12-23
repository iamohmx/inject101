<?php

require_once('layouts/header.php');
require_once('layouts/navbar.php');
require_once('chk_user.php');

$sql_post = "SELECT * FROM posts";
$query_post = mysqli_query($conn, $sql_post);
$total_result = mysqli_num_rows($query_post);

$limit_page = 8;
$page = @$_GET['page'] ? $_GET['page'] : 1;


$num_page = $total_result / $limit_page;
if (!($num_page == (int)$num_page))
    $num_page = (int)$num_page + 1;

if ($page > $num_page)
    $page = $num_page;

$limit_start = ($page * $limit_page) - $limit_page;
// End calc pagination

$sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT {$limit_start},{$limit_page}";
$query =  mysqli_query($conn, $sql);

?>
<div class="py-3"></div>

<div class="container">
    <div class="row g-3 justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-6">
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
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">
                        โพสต์ทั้งหมด
                    </h3>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPost">
                        Add Post
                    </button>

                    <!-- Add Post Modal -->
                    <div class="modal fade" id="addPost" tabindex="-1" aria-labelledby="addPostLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addPost">เพิ่มโพสต์</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="addPost.php" method="post">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title...">
                                        </div>

                                        <div class="mb-3">
                                            <select name="cat_id" class="form-select" aria-label="categories">
                                                <option selected>เลือกหมวดหมู่</option>
                                                <?php
                                                $sql_cat = "SELECT * FROM categories";
                                                $query_cat = mysqli_query($conn, $sql_cat);
                                                if (mysqli_num_rows($query_cat) > 0) :
                                                    while ($row_cat = mysqli_fetch_assoc($query_cat)) :
                                                ?>
                                                        <option value="<?php echo $row_cat['cat_id']; ?>"><?php echo $row_cat['cat_name']; ?></option>
                                                <?php
                                                    endwhile;
                                                endif;

                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="content" class="form-label">content</label>
                                            <textarea name="content" class="form-control" id="content" placeholder="content..."></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">image</label>
                                            <input type="text" name="image" class="form-control" id="image" placeholder="Image(input link example.com/example.jpg) ..." value="https://images.pexels.com/photos/3812944/pexels-photo-3812944.jpeg">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <input class="btn btn-success" role="button" name="addPost" type="submit" value="เพิ่มโพสต์">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($query) > 0) :
                                while ($result1 = mysqli_fetch_assoc($query)) :
                            ?>

                                    <tr>
                                        <th scope="row"><?php echo $result1['post_id'] ?></th>
                                        <td><?php echo $result1['title'] ?></td>
                                        <td><?php echo $result1['content'] ?></td>
                                        <td>
                                            <img class="card-img" src="<?php echo $result1['image'] ?>" width="20px" height="80px" alt="">
                                        </td>
                                        <td class="text-center">
                                            <button class="btn" style="color: blue;" data-bs-toggle="modal" data-bs-target="#view_modalId<?php echo $result1['post_id']; ?>"><i class="bi bi-eye"></i></button>
                                            <button class="btn" style="color: red;" data-bs-toggle="modal" data-bs-target="#delete_modalId<?php echo $result1['post_id']; ?>"><i class="bi bi-trash"></i></button>
                                            <!-- View Modal -->
                                            <div class="modal fade text-start" id="view_modalId<?php echo  $result1['post_id']; ?>" tabindex="-1" aria-labelledby="view_modalId" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="view_modalId">แก้ไขโพสต์</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="updatePost.php?post_id=<?php echo $result1['post_id']; ?>"" method="post">
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title..." value="<?php echo $result1['title'] ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="category" class="form-label">หมวดหมู่</label>
                                                                    <select name="cat_id" class="form-select" id="category" aria-label="categories">
                                                                        <!-- <option selected>เลือกหมวดหมู่</option> -->
                                                                        <?php
                                                                        $sql_cat = "SELECT * FROM categories c";
                                                                        $query_cat = mysqli_query($conn, $sql_cat);
                                                                        if (mysqli_num_rows($query_cat) > 0) :
                                                                            while ($row_cat = mysqli_fetch_assoc($query_cat)) :
                                                                        ?>
                                                                                <option value=" <?php echo $row_cat['cat_id']; ?> " <?php if ($row_cat['cat_id'] == $result1['cat_id']) { echo 'selected';  } ?>> <?php echo $row_cat['cat_name']; ?></option>
                                                                        <?php
                                                                            endwhile;
                                                                        endif;

                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="content" class="form-label">content</label>
                                                                    <textarea name="content" class="form-control" id="content" placeholder="content..."><?php echo $result1['content'] ?></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">image</label>
                                                                    <input type="text" name="image" class="form-control" id="image" value="<?php echo $result1['image'] ?>">
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <input class="btn btn-warning" role="button" name="updatePost" type="submit" value="แก้ไข">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Modal -->
                                            <div class="modal fade text-start" id="delete_modalId<?php echo  $result1['post_id']; ?>" tabindex="-1" aria-labelledby="delete_modalId" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_modalId">ลบโพสต์</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            คุณต้องการลบโพสต์ <b><?php echo $result1['title']; ?></b> หรือไม่?
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                            <form action="deletePost.php?post_id=<?php echo $result1['post_id']; ?>" method="post">
                                                                <input class="btn btn-danger" role="button" name="deletePost" type="submit" value="ลบ">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                endwhile;
                            else :
                                ?>
                                <h1 class="text-center text-danger">
                                    No Data!!
                                </h1>
                            <?php

                            endif;
                            ?>
                        </tbody>
                    </table>

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
                            // Check pagination


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
        </div>
    </div>
</div>


<?php
require_once('layouts/footer.php');
?>