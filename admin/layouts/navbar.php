<?php 
    session_start();

?>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Admin Control</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">จัดการโพสต์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">จัดการผู้ใช้</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">เกี่ยวกับ</a>
                    </li>
                    
                </ul>
                <!-- <form class="d-flex" method="get" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <?php 
                            if(isset($_SESSION['user_id'])):
                        
                        ?>
                       
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <b><?php echo $_SESSION['username']; ?></b>
                        </a>
                        <ul class="dropdown-menu">

                            <?php if($_SESSION['user_level'] === 'admin'): ?>
                                <li><a class="dropdown-item" href="../index.php">Preview</a></li>
                            <?php endif; ?>

                            <li><a class="dropdown-item" href="../logout.php">ออกจากระบบ</a></li>
                        </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>