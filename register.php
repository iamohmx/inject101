<?php 

    require_once('layouts/header.php');
    require_once('layouts/navbar.php');
    // ตรวจสอบว่าผู้ใช้ได้เข้าสู่ระบบหรือไม่
    if (isset($_SESSION["user_id"])) {
        // ผู้ใช้ได้เข้าสู่ระบบแล้ว
        header("Location: index.php");
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
                        <h4 class="text-center">สมัครสมาชิก</h4>
                    </div>
                    <div class="card-body">
                        <form action="chk_register.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username...">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email...">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password...">
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password...">
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="btn btn-success" name="register" type="submit" value="สมัครสมาชิก">
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
