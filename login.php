<?php 

    require_once('layouts/header.php');
    require_once('layouts/navbar.php');
    if(isset($_SESSION['user_id'])){
        header("location: index.php");
    }
?>
    <div class="container py-5">
        <div class="row justify-content-center g-3">
            <div class="col-md-4">
            <?php 
                    if(isset($_SESSION['succ_msg'])){
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
                    if(isset($_SESSION['err_msg'])){
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
                        <h4 class="text-center">เข้าสู่ระบบ</h4>
                    </div>
                    <div class="card-body">
                        <form action="chk_login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username...">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password...">
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="btn btn-success" name="login" type="submit" value="เข้าสู่ระบบ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 

require_once('layouts/footer.php');

?>
