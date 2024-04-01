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
                                            <p class="mb-0">Thông tin lương</p>
                                            <button class="btn btn-primary btn-sm ms-auto" type="submit" name="update-salary">Lưu Lại</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="manhanvien" class="form-control-label">Mã nhân viên</label>
                                                    <input class="form-control" type="text" id="manhanvien" name="manhanvien" disabled value="<?php echo $dataSalaryDetail['manhanvien'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="month" class="form-control-label">Tháng</label>
                                                    <select name="month" class="form-control" id="month">
                                                        <?php
                                                        for ($i = 1; $i <= 12; $i++) {
                                                            $formatted_month = sprintf('%02d', $i);
                                                        ?>
                                                            <option value="<?php echo $formatted_month; ?>"><?php echo $formatted_month; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="year" class="form-control-label">Năm</label>
                                                    <select name="year" class="form-control" id="year">
                                                        <?php
                                                        for ($i = 2024; $i <= 2035; $i++) {
                                                        ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="baohiem" class="form-control-label">Bảo hiểm</label>
                                                    <input class="form-control" type="number" id="baohiem" name="baohiem" placeholder="100000" value="<?php echo $dataSalaryDetail['baohiem'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="phat" class="form-control-label">Phạt</label>
                                                    <input class="form-control" type="number" id="phat" name="phat" placeholder="100000" value="<?php echo $dataSalaryDetail['phat'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="no" class="form-control-label">Nợ</label>
                                                    <input class="form-control" type="number" id="no" name="no" placeholder="100000" value="<?php echo $dataSalaryDetail['no'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="luongchinh" class="form-control-label">Lương chính</label>
                                                    <input class="form-control" placeholder="100000" name="luongchinh" min="0" id="luongchinh" type="number" value="<?php echo $dataSalaryDetail['luongchinh'] ?>">
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="thucnhan" class="form-control-label">Thực nhận</label>
                                                    <input class="form-control" type="number" id="thucnhan" name="thucnhan" placeholder="1000000" value="<?php echo $dataSalaryDetail['thucnhan'] ?>">
                                                </div>
                                            </div> -->
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