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
                                            <p class="mb-0">Thông tin nhân viên</p>
                                            <button class="btn btn-primary btn-sm ms-auto" type="submit" name="update-user">Lưu Lại</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="manhanvien" class="form-control-label">Mã nhân viên</label>
                                                    <input class="form-control" id="manhanvien" disabled type="text" placeholder="NV1" name="manhanvien" value="<?php echo $dataNVUpdate['manhanvien'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="fullname" class="form-control-label">Họ và Tên</label>
                                                    <input class="form-control" id="fullname" type="text" placeholder="ABC" name="fullname" value="<?php echo $dataNVUpdate['fullname'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email" class="form-control-label">Email</label>
                                                    <input class="form-control" type="email" id="email" name="email" placeholder="abc@gmail.com" value="<?php echo $dataNVUpdate['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password" class="form-control-label">Mật khẩu</label>
                                                    <input class="form-control" type="password" placeholder="*******" id="password" name="password" value="<?php echo $dataNVUpdate['password'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="chucvu" class="form-control-label block">Chức vụ</label>
                                                    <select name="chucvu" class="form-control" id="chucvu">
                                                        <?php
                                                        foreach ($dataUserRole as $key => $value) {
                                                            # code...
                                                        ?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['chucvu'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="level" class="form-control-label block">Cấp bậc</label>
                                                    <select name="level" class="form-control" id="level">
                                                        <?php
                                                        foreach ($dataLevel as $key => $value) {
                                                            # code...
                                                        ?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['level'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status" class="form-control-label block">Trạng thái</label>
                                                    <select name="status" class="form-control" id="status">
                                                        <?php
                                                        foreach ($dataStatus as $key => $value) {
                                                            # code...
                                                        ?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['status'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="phone" class="form-control-label">Số điện thoại</label>
                                                    <input class="form-control" placeholder="0123456789" name="phone" id="phone" type="number" value="<?php echo $dataNVUpdate['phone'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="address" class="form-control-label">Địa chỉ</label>
                                                    <input class="form-control" type="text" id="address" name="address" placeholder="Thái Nguyên" value="<?php echo $dataNVUpdate['address'] ?>">
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