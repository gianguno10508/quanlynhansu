<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <img src="./assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Dashboard</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/quanlynhansu">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-money text-primary icon-custom"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="?action=user">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-primary icon-custom"></i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lý Nhân Sự</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=role">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-thumbs-o-up text-primary icon-custom"></i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lý Chức Vụ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=level">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-binoculars text-primary icon-custom"></i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lý Cấp bậc</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=status">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-linux text-primary icon-custom"></i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lý Trạng Thái</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=salary">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-money text-primary icon-custom"></i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lý Lương</span>
                    </a>
                </li>
            <?php
            }
            ?>
            <!-- <li class="nav-item">
                <a class="nav-link " href="?action=team">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-group text-primary icon-custom"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý Team</span>
                </a>
            </li> -->

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?action=profile">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-primary icon-custom"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="?action=logout">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-sign-out text-primary icon-custom"></i>
                    </div>
                    <span class="nav-link-text ms-1">Log out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>