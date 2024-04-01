<?php include('view/custom/header.php'); ?>

<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url(''); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <?php include('view/custom/sidebar.php'); ?>
    <div class="main-content position-relative max-height-vh-100 h-100">
        <?php include('view/custom/navbar.php'); ?>
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
        <div class="container-fluid py-8">
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            ?>
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
                                        <a class="btn btn-primary btn-sm ms-auto" href="?action=new-team">Thêm team mới</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        foreach ($dataTeam as $key => $team) {
                                            # code...
                                        ?>
                                            <div class="col-md-4 mb-4">
                                                <a href="?action=edit-team&id=<?php echo $team['id']; ?>">
                                                    <div class="content-team card text-center bg-primary p-2 round-4">
                                                        <h4 class="text-white"><?php echo $team['mateam'] ?></h4>
                                                        <h2 class="text-white"><?php echo $team['tenteam'] ?></h2>
                                                        <h3 class="text-white">
                                                            <?php
                                                            $unser = unserialize($team['thanhvien']);
                                                            $count = count($unser);
                                                            if ($count < 10) {
                                                                $count = "0" . $count;
                                                            }
                                                            ?>
                                                            <?php echo $count; ?>
                                                        </h3>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

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