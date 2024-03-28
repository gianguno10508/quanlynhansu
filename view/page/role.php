<?php include('view/custom/header.php'); ?>

<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url(''); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <?php include('view/custom/sidebar.php'); ?>
    <div class="main-content position-relative max-height-vh-100 h-100">
        <?php include('view/custom/navbar.php'); ?>
        <div class="container-fluid py-8">
            <a class="btn btn-primary btn-sm mb-14" href="?action=add-new-role" type="button">Thêm chức vụ mới</a>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            ?>
                <table id="productRole" class="display bg-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Chức vụ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dataUserRole as $key => $value) {
                            # code...
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['chucvu']; ?></td>
                                <td>
                                    <a href="?action=update-role&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có chắc muốn sửa?')"><i class="fa fa-pencil text-primary icon-custom"></i></a>
                                    <a href="?action=delete-role&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash text-danger icon-custom"></i></a>
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
                        $('#productRole').DataTable();
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