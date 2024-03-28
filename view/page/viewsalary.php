<?php include('view/custom/header.php'); ?>
<?php
function FormatCurrency($number)
{
    $formatted_number = number_format($number, 0, ',', '.');
    return ($formatted_number . 'đ');
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
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            ?>
                <table id="productTable" class="display bg-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã nhân viên</th>
                            <th>Tháng năm</th>
                            <th>Lương chính</th>
                            <th>Bảo hiểm</th>
                            <th>Phạt</th>
                            <th>Nợ</th>
                            <th>Thực nhận</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dataListSalaryDetail as $key => $value) {
                            # code...
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['manhanvien']; ?></td>
                                <td><?php echo $value['thangnam']; ?></td>
                                <td><?php echo FormatCurrency($value['luongchinh']); ?></td>
                                <td><?php echo FormatCurrency($value['baohiem']); ?></td>
                                <td><?php echo FormatCurrency($value['phat']); ?></td>
                                <td><?php echo FormatCurrency($value['no']); ?></td>
                                <td><?php echo FormatCurrency($value['thucnhan']); ?></td>
                                <td>
                                    <a href="?action=update-salary&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có chắc muốn sửa?')"><i class="fa fa-pencil text-primary icon-custom"></i></a>
                                    <a href="?action=delete-salary&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash text-danger icon-custom"></i></a>
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