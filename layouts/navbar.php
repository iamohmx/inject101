<?php 
    session_start();

?>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Blog-101</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">โพสต์</a>
                    </li>
                    
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            หมวดหมู่
                        </a>
                        <ul class="dropdown-menu">
                            <?php 
                            if (mysqli_num_rows($query_cat) > 0) :
                                while ($row_cat = mysqli_fetch_assoc($query_cat)) :
                            ?>
                            <li><a class="dropdown-item" href="index.php?cat_id=<?php echo $row_cat['cat_id'] ?>"><?php echo $row_cat['cat_name'] ?></a></li>

                            <?php 
                                endwhile;
                            else:
                                echo "No Data";    
                            endif;
                            ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">เกี่ยวกับ</a>
                    </li>
                    
                </ul>
                <!-- <form class="d-flex" method="get" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <?php 
                            if(!isset($_SESSION['user_id'])):
                        
                        ?>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            สมาชิก
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./login.php">เข้าสู่ระบบ</a></li>
                            <li><a class="dropdown-item" href="./register.php">สมัครสมาชิก</a></li>
                        </ul>
                        <?php else: ?>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <b><?php echo $_SESSION['username']; ?></b>
                        </a>
                        <ul class="dropdown-menu">

                            <?php if($_SESSION['user_level'] === 'admin'): ?>
                                <li><a class="dropdown-item" href="admin/index.php">หน้าจัดการ</a></li>
                            <?php endif; ?>

                            <li><a class="dropdown-item" href="./logout.php">ออกจากระบบ</a></li>
                        </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>