<?php include('view/custom/header.php'); ?>
<?php
$countWorking = 0;
$countResigned = 0;

foreach ($dataUser as $employee) {
    if ($employee['id_status'] == 1) {
        $countWorking++;
    } else {
        $countResigned++;
    }
}
?>

<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url(''); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <?php include('view/custom/sidebar.php'); ?>
    <div class="main-content position-relative max-height-vh-100 h-100">
        <?php include('view/custom/navbar.php'); ?>
        <div class="container-fluid py-8">
            <div class="row mb-5">
                <div class="col-lg-4 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Thành viên</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">
                                    <?php
                                    if (count($dataUser) < 10) {
                                        echo '0' . count($dataUser);
                                    } else {
                                        echo count($dataUser);
                                    }
                                    ?>
                                </h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card gradient-8">
                        <div class="card-body">
                            <h3 class="card-title text-white">Đang làm việc</h3>
                            <div class="d-inline-block">
                                <?php
                                if ($countWorking < 10) {
                                ?>
                                    <h2 class="text-white"> 0<?php echo $countWorking; ?></h2>
                                <?php
                                } else {
                                ?>
                                    <h2 class="text-white"> 0<?php echo $countWorking; ?></h2>
                                <?php
                                }
                                ?>

                            </div>
                            <span class="float-right text-success display-5 opacity-5"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Đã nghỉ việc</h3>
                            <div class="d-inline-block">
                                <?php
                                if ($countResigned < 10) {
                                ?>
                                    <h2 class="text-white"> 0<?php echo $countResigned; ?></h2>
                                <?php
                                } else {
                                ?>
                                    <h2 class="text-white"> 0<?php echo $countResigned; ?></h2>
                                <?php
                                }
                                ?>
                            </div>
                            <span class="float-right text-success display-5 opacity-5"><i class="fa fa-minus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary btn-sm mb-14" href="?action=add-new" type="button">Thêm nhân viên mới</a>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            ?>
                <table id="productTable" class="display bg-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Chức vụ</th>
                            <th>Cấp bậc</th>
                            <th>Trạng thái</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dataUser as $key => $value) {
                            # code...
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['manhanvien']; ?></td>
                                <td><?php echo $value['fullname']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['password']; ?></td>
                                <td><?php echo $value['chucvu']; ?></td>
                                <td><?php echo $value['level']; ?></td>
                                <td><?php echo $value['status']; ?></td>
                                <td><?php echo $value['phone']; ?></td>
                                <td><?php echo $value['address']; ?></td>
                                <td>
                                    <a href="?action=view-salary&id=<?php echo $value['manhanvien']; ?>"><i class="fa fa-eye text-success icon-custom"></i></a>
                                    <a href="?action=update-user&id=<?php echo $value['manhanvien']; ?>" onclick="return confirm('Bạn có chắc muốn sửa?')"><i class="fa fa-pencil text-primary icon-custom"></i></a>
                                    <a href="?action=delete-user&id=<?php echo $value['manhanvien']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash text-danger icon-custom"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>

                        <!-- Thêm các hàng khác tại đây nếu cần -->
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#productTable').DataTable();
                    });
                </script>
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