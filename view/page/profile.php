<?php include('view/custom/header.php'); ?>

<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url(''); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <?php include('view/custom/sidebar.php'); ?>
    <div class="main-content position-relative max-height-vh-100 h-100">
        <?php include('view/custom/navbar.php'); ?>
        <form method="post">
            <div class="card shadow-lg mx-4 card-profile-bottom">
                <div class="card-body p-3">
                    <div class="row gx-4">

                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1"><?php echo $dataNV['fullname'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?php echo $dataNV['chucvu']; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                            <i class="ni ni-app"></i>
                                            <span class="ms-2">App</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                            <i class="ni ni-email-83"></i>
                                            <span class="ms-2">Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                            <i class="ni ni-settings-gear-65"></i>
                                            <span class="ms-2">Settings</span>
                                        </a>
                                    </li>
                                </ul>
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
                                    <p class="mb-0">Thông tin cá nhân</p>
                                    <button class="btn btn-primary btn-sm ms-auto" type="submit" name="save-update-account">Lưu Lại</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Họ và Tên</label>
                                            <input class="form-control" type="text" name="fullname" value="<?php echo $dataNV['fullname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Số Điện thoại</label>
                                            <input class="form-control" type="number" name="phone" value="<?php echo $dataNV['phone']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Contact Information</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Địa chỉ</label>
                                            <input class="form-control" type="text" name="address" value="<?php echo $dataNV['address']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">About me</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">About me</label>
                                            <input class="form-control" type="text" name="about" value="<?php echo $dataNV['about']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <?php include('view/custom/footer.php'); ?>