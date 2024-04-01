<?php
require_once "Model/dbmodel.php";
session_start();
class Controller extends Model
{
    public function MainControl()
    {
        $dataUser = $this->GetDataUser();
        $dataUserRole = $this->GetDataUserRole();
        $dataLevel = $this->GetDataUserLevel();
        $dataStatus = $this->GetDataUserStatus();
        $dataTeam = $this->GetAllTeam();

        function isLoggedIn()
        {
            return isset($_SESSION['manhanvien']);
        }
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'login': {
                        if (isset($_POST['login'])) {
                            $count = 0;
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            foreach ($dataUser as $value) {
                                if ($value['email'] == $email && $value['password'] == $password) {
                                    $_SESSION['email'] = $email;
                                    $_SESSION['role'] = $value['id_chucvu'];
                                    $_SESSION['manhanvien'] = $value['manhanvien'];
                                    $count++;
                                    break;
                                }
                            }
                        }
                        require_once('View/page/login.php');
                        break;
                    }
                case 'logout': {
                        unset($_SESSION['email']);
                        unset($_SESSION['role']);
                        unset($_SESSION['manhanvien']);
                        header('location: http://localhost/quanlynhansu/?action=login');
                        break;
                    }
                case 'add-new': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);

                            if (isset($_POST['save-user'])) {
                                $check = 1;
                                foreach ($dataUser as $user) {
                                    if ($user['manhanvien'] === $_POST['manhanvien'] || $user['email'] === $_POST['email']) {
                                        $check = 0;
                                        break;
                                    }
                                }
                                if ($check == 1) {
                                    if ($this->RegisterUser($_POST['manhanvien'], $_POST['fullname'],  $_POST['email'], $_POST['password'], $_POST['chucvu'], $_POST['level'], $_POST['status'], $_POST['phone'], $_POST['address'])) {
                                        echo '<script>alert("Success");</script>';
                                    }
                                }
                            }
                            require_once('View/page/adduser.php');
                            break;
                        }
                    }
                case 'update-user': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $manhanvienUpdate = $_GET['id'];
                                $dataNVUpdate = $this->GetInforUser($manhanvienUpdate);
                                if (isset($_POST['update-user'])) {
                                    if ($this->UpdateUser($manhanvienUpdate, $_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['chucvu'], $_POST['level'], $_POST['status'], $_POST['phone'], $_POST['address'])) {
                                        echo '<script>alert("Success");</script>';
                                        header('location: http://localhost/quanlynhansu/?action=update-user');
                                    }
                                }
                            }
                            require_once('View/page/updateuser.php');
                            break;
                        }
                    }
                case 'delete-user': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $manhanvienDelete = $_GET['id'];
                                if ($this->DeleteUser($manhanvienDelete)) { {
                                        echo '<script>alert("Success");</script>';
                                        header('location: http://localhost/quanlynhansu/?action=user');
                                    }
                                }
                                require_once('View/page/profile.php');
                                break;
                            }
                        }
                    }
                case 'role': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            require_once('View/page/role.php');
                            break;
                        }
                    }
                case 'add-new-role': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_POST['save-role'])) {
                                if ($this->RegisterRole($_POST['chucvu'])) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=role');
                                }
                            }
                            require_once('View/page/addrole.php');
                            break;
                        }
                    }
                case 'update-role': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $dataRole = $this->GetInforRole($_GET['id']);
                                if (isset($_POST['update-role'])) {
                                    if ($this->UpdateRole($_GET['id'], $_POST['chucvu'])) {
                                        echo '<script>alert("Success");</script>';
                                        header('location: http://localhost/quanlynhansu/?action=role');
                                    }
                                }
                            }
                            require_once('View/page/updaterole.php');
                            break;
                        }
                    }
                case 'delete-role': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                if ($this->DeleteRole($_GET['id'])) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=role');
                                }
                            }
                            require_once('View/page/role.php');
                            break;
                        }
                    }
                case 'level': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            require_once('View/page/level.php');
                            break;
                        }
                    }
                case 'add-new-level': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_POST['save-level'])) {
                                if ($this->RegisterLevel($_POST['level'])) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=level');
                                }
                            }
                            require_once('View/page/addlevel.php');
                            break;
                        }
                    }
                case 'update-level': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $dataLevelID = $this->GetInforLevel($_GET['id']);
                                if (isset($_POST['update-level'])) {
                                    if ($this->UpdateLevel($_GET['id'], $_POST['level'])) {
                                        echo '<script>alert("Success");</script>';
                                        header('location: http://localhost/quanlynhansu/?action=level');
                                    }
                                }
                            }
                            require_once('View/page/updatelevel.php');
                            break;
                        }
                    }
                case 'delete-level': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                if ($this->DeleteLevel($_GET['id'])) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=level');
                                }
                            }
                            require_once('View/page/level.php');
                            break;
                        }
                    }
                case 'status': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            require_once('View/page/status.php');
                            break;
                        }
                    }
                case 'add-new-status': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_POST['save-status'])) {
                                if ($this->RegisterStatus($_POST['status'])) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=status');
                                }
                            }
                            require_once('View/page/addstatus.php');
                            break;
                        }
                    }
                case 'update-status': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $dataStatusID = $this->GetInforStatus($_GET['id']);
                                if (isset($_POST['update-status'])) {
                                    if ($this->UpdateStatus($_GET['id'], $_POST['status'])) {
                                        echo '<script>alert("Success");</script>';
                                        header('location: http://localhost/quanlynhansu/?action=status');
                                    }
                                }
                            }
                            require_once('View/page/updatestatus.php');
                            break;
                        }
                    }
                case 'delete-status': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                if ($this->DeleteStatus($_GET['id'])) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=status');
                                }
                            }
                            require_once('View/page/status.php');
                            break;
                        }
                    }

                case 'user': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            // Hàm để lấy thông tin chức vụ từ ID
                            function getChucVuById($id, $dataUserRole)
                            {
                                foreach ($dataUserRole as $chucvu) {
                                    if ($chucvu['id'] == $id) {
                                        return $chucvu['chucvu'];
                                    }
                                }
                                return 'N/A';
                            }
                            // Hàm để lấy thông tin cấp bậc từ ID
                            function getLevelById($id, $dataLevel)
                            {
                                foreach ($dataLevel as $level) {
                                    if ($level['id'] == $id) {
                                        return $level['level'];
                                    }
                                }
                                return 'N/A';
                            }

                            // Hàm để lấy thông tin trạng thái từ ID
                            function getStatusById($id, $dataStatus)
                            {
                                foreach ($dataStatus as $status) {
                                    if ($status['id'] == $id) {
                                        return $status['status'];
                                    }
                                }
                                return 'N/A';
                            }

                            // Thêm thông tin chức vụ, cấp bậc, trạng thái vào mảng người dùng
                            foreach ($dataUser as &$user) {
                                $user['chucvu'] = getChucVuById($user['id_chucvu'], $dataUserRole);
                                $user['level'] = getLevelById($user['id_level'], $dataLevel);
                                $user['status'] = getStatusById($user['id_status'], $dataStatus);
                            }
                            require_once('View/page/user.php');
                            break;
                        }
                    }
                case 'salary': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_POST['save-salary'])) {
                                $thucnhan = $_POST['luongchinh'] - $_POST['baohiem'] - $_POST['phat'] - $_POST['no'];
                                $thangnam = $_POST['month'] . '/' . $_POST['year'];
                                if ($this->AddSalary($_POST['manhanvien'], $thangnam, $_POST['luongchinh'], $_POST['baohiem'], $_POST['phat'], $_POST['no'], $thucnhan)) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=user');
                                }
                            }
                        }
                        require_once('View/page/salary.php');
                        break;
                    }
                case 'salary_detail': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $dataSalaryDetail = $this->GetDetailSalaryUser($_GET['id']);
                            }
                        }
                        require_once('View/page/salarydetail.php');
                        break;
                    }
                case 'view-salary': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $dataListSalaryDetail = $this->GetDetailListSalaryUser($_GET['id']);
                            }
                        }
                        require_once('View/page/viewsalary.php');
                        break;
                    }
                case 'update-salary': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                $dataSalaryDetail = $this->GetDetailSalaryUser($_GET['id']);
                                if (isset($_POST['update-salary'])) {
                                    $thucnhan = $_POST['luongchinh'] - $_POST['baohiem'] - $_POST['phat'] - $_POST['no'];
                                    $thangnam = $_POST['month'] . '/' . $_POST['year'];
                                    if ($this->UpdateSalary($_GET['id'], $manhanvien, $thangnam, $_POST['luongchinh'], $_POST['baohiem'], $_POST['phat'], $_POST['no'], $thucnhan)) {
                                        echo '<script>alert("Success");</script>';
                                        header('location: http://localhost/quanlynhansu/?action=user');
                                    }
                                }
                            }
                        }
                        require_once('View/page/updatesalary.php');
                        break;
                    }
                case 'delete-salary': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_GET['id'])) {
                                if ($this->DeleteSalary($_GET['id'])) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=user');
                                }
                            }
                            require_once('View/page/user.php');
                            break;
                        }
                    }
                case 'profile': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            $chucvu = '';
                            foreach ($dataUserRole as $role) {
                                if ($role['id'] == $dataNV['id_chucvu']) {
                                    $chucvu = $role['chucvu'];
                                    break;
                                }
                            }
                            $dataNV['chucvu'] = $chucvu;


                            $level = '';
                            foreach ($dataLevel as $lvl) {
                                if ($lvl['id'] == $dataNV['id_level']) {
                                    $level = $lvl['level'];
                                    break;
                                }
                            }
                            $dataNV['level'] = $level;
                            if (isset($_POST['save-update-account'])) {
                                $fullname = $_POST['fullname'];
                                $phone = $_POST['phone'];
                                $address = $_POST['address'];
                                $about = $_POST['about'];
                                if ($this->UpdateProfile($manhanvien, $fullname, $phone, $address, $about)) {
                                    $success = $this->UpdateProfile($manhanvien, $fullname, $phone, $address, $about);
                                }
?>
                                <script>
                                    <?php if (isset($success) && $success) : ?>
                                        alert("Cập nhật thông tin thành công!");
                                        window.location.href = 'http://localhost/quanlynhansu/';
                                    <?php endif; ?>
                                </script>
<?php
                            }
                            require_once('View/page/profile.php');
                            break;
                        }
                    }

                case 'team': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                        }
                        require_once('View/page/team.php');
                        break;
                    }
                case 'new-team': {
                        if (isset($_SESSION['manhanvien'])) {
                            $manhanvien = $_SESSION['manhanvien'];
                            $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                            $dataNV = $this->GetInforUser($manhanvien);
                            if (isset($_POST['save-team'])) {
                                $thanhvien = serialize($_POST['thanhvien']);
                                if ($this->AddTeam($_POST['mateam'], $_POST['tenteam'], $thanhvien)) {
                                    echo '<script>alert("Success");</script>';
                                    header('location: http://localhost/quanlynhansu/?action=team');
                                }
                            }
                        }
                        require_once('View/page/addteam.php');
                        break;
                    }
            }
        } else {
            if (isset($_SESSION['manhanvien'])) {
                $manhanvien = $_SESSION['manhanvien'];
                $dataSalaryNV = $this->GetSalaryUser($manhanvien);
                $dataNV = $this->GetInforUser($manhanvien);

                $chucvu = '';
                foreach ($dataUserRole as $role) {
                    if ($role['id'] == $dataNV['id_chucvu']) {
                        $chucvu = $role['chucvu'];
                        break;
                    }
                }
                $dataNV['chucvu'] = $chucvu;


                $level = '';
                foreach ($dataLevel as $lvl) {
                    if ($lvl['id'] == $dataNV['id_level']) {
                        $level = $lvl['level'];
                        break;
                    }
                }
                $dataNV['level'] = $level;
                require_once('view/page/dashboard.php');
            } else {
                header('location: http://localhost/quanlynhansu/?action=login');
            }
        }
    }
}
