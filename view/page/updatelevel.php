<?php include('view/custom/header.php'); ?>

<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url(''); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <?php include('view/custom/sidebar.php'); ?>
    <div class="main-content position-relative max-height-vh-100 h-100">
        <?php include('view/custom/navbar.php'); ?>
        <div class="container-fluid py-8">
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            ?>
                <form method="post">
                    <div class="card shadow-lg mx-4 card-profile-bottom">
                        <div class="card-body p-3">
                            <div class="row gx-4">
                                <div class="col-auto my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1"><?php echo $dataNV['fullname'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Thông tin cấp bậc</p>
                                                <button class="btn btn-primary btn-sm ms-auto" type="submit" name="update-level">Lưu Lại</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="level" class="form-control-label">Tên cấp bậc</label>
                                                    <input class="form-control" id="level" type="text" placeholder="Senior" name="level" value="<?php echo $dataLevelID['level']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            } else {
            ?>
                <div class="main-content position-relative max-height-vh-100 h-100">
                    <h3>Bạn không có quyền truy cập</h3>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php include('view/custom/footer.php'); ?>