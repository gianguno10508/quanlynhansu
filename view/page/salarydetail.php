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
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" target="_blank">
                <img src="./assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Salary Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <?php include('view/custom/sidebar.php'); ?>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include('view/custom/navbar.php'); ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-7 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Chi Tiết Lương tháng <?php echo $dataSalaryDetail['thangnam']; ?></h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Mức lương</h6>
                                        <span class="mb-2 text-xs">Lương Chính: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo FormatCurrency($dataSalaryDetail['luongchinh']) ?></span></span>
                                        <span class="text-xs"> Tổng Lương <span class="text-dark ms-sm-2 font-weight-bold"><?php echo FormatCurrency($dataSalaryDetail['luongchinh']) ?></span></span>
                                    </div>
                                </li>

                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Quỹ Nhân Viên</h6>
                                        <span class="text-xs"> Tổng các khoản quỹ và phạt: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo FormatCurrency($dataSalaryDetail['phat']) ?></span></span>
                                    </div>
                                </li>

                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">CÁC KHOẢN GIẢM TRỪ</h6>
                                        <span class="text-xs"> Tổng các khoản Giảm trừ (Bảo hiểm...): <span class="text-dark ms-sm-2 font-weight-bold"><?php echo FormatCurrency($dataSalaryDetail['baohiem']) ?></span></span>
                                    </div>
                                </li>


                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">CÁC KHOẢN NỢ LƯƠNG </h6>
                                        <strong>
                                            <span class="text-xs"> Tổng khấu trừ: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo FormatCurrency($dataSalaryDetail['no']) ?></span></span>
                                        </strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-4">
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Bảng Rút gọn</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <small><?php echo $dataSalaryDetail['thangnam']; ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Các Khoản Thu nhập</h6>
                            <ul class="list-group">


                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-plus"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm"><?php echo FormatCurrency($dataSalaryDetail['luongchinh']); ?></h6>
                                            <span class="text-xs">Lương Chính</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-minus"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm"><?php echo FormatCurrency($dataSalaryDetail['baohiem'] + $dataSalaryDetail['phat']) ?></h6>
                                            <span class="text-xs">Các khoản Bảo hiểm và phạt ( tháng hiện tại)</span>
                                        </div>
                                    </div>

                                </li>


                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-minus"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm"><?php echo FormatCurrency($dataSalaryDetail['no']) ?></h6>
                                            <span class="text-xs">Vay nợ Và tạm ứng lương</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-2 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="justify-content:center !important">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fa fa-money"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm"><?php echo FormatCurrency($dataSalaryDetail['thucnhan']) ?></h6>
                                            <span class="text-xs">Tổng Thực Nhận</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <?php include('view/custom/footer.php'); ?>