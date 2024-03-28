<?php include('view/custom/header.php'); ?>
<?php
function FormatCurrency($number)
{
    $formatted_number = number_format($number, 0, ',', '.');
    return ($formatted_number . 'đ');
}
?>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?php include('view/custom/sidebar.php'); ?>
    <main class="main-content position-relative border-radius-lg ">
        <?php include('view/custom/navbar.php'); ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Chức Vụ</p>
                                        <h5 class="font-weight-bolder"><?php echo $dataNV['chucvu'] ?></h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fa fa-thumbs-o-up text-success icon-custom"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Mã Nhân Viên</p>
                                        <h5 class="font-weight-bolder"><?php echo $dataNV['manhanvien']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fa fa-pencil text-primary icon-custom"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Cấp bậc</p>
                                        <h5 class="font-weight-bolder"><?php echo $dataNV['level'] ?> </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="fa fa-binoculars text-danger icon-custom"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Salary List</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chi Tiết</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã Nhân Viên</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Họ Và Tên</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tháng/năm</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lương Chính</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chức Vụ</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vi Phạm NQ</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bảo Hiểm</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ứng Lương</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thực Nhận</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (is_array($dataSalaryNV) && count($dataSalaryNV) > 0) {
                                        foreach ($dataSalaryNV as $key => $value) {
                                            # code...
                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column text-center">
                                                            <h6 class="mb-0 text-sm"><a href="?action=salary_detail&id=<?php echo $value['id']; ?>"> View</a></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column text-center">
                                                            <h6 class="mb-0 text-sm text-center"><?php echo $dataNV['manhanvien']; ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column text-center">
                                                            <h6 class="mb-0 text-sm"><?php echo $dataNV['fullname']; ?></h6>
                                                        </div>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm"><?php echo $value['thangnam'] ?></h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm"><?php echo FormatCurrency($value['luongchinh']); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm"></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm"><?php echo FormatCurrency($value['phat']); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm"><?php echo FormatCurrency($value['baohiem']); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm"><?php echo FormatCurrency($value['no']); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm"><?php echo FormatCurrency($value['thucnhan']); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--   Core JS Files   -->

    <?php include('view/custom/footer.php'); ?>