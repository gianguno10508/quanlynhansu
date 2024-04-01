<?php
require_once "db.php";

class Model extends Db
{
    public function GetDataUser()
    {
        $sql = "SELECT * FROM user";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetDataUserRole()
    {
        $sql = "SELECT * FROM role_user";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetDataUserLevel()
    {
        $sql = "SELECT * FROM level";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetDataUserStatus()
    {
        $sql = "SELECT * FROM status_user";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function RegisterUser($manhanvien, $fullname, $email, $password, $chucvu, $capbac, $trangthai, $phone, $address)
    {
        $sql = "INSERT INTO user(id, manhanvien, fullname, email, password, id_chucvu, id_level, id_status, phone, address, about) VALUES(NULL,'$manhanvien', '$fullname','$email', '$password', '$chucvu', '$capbac', '$trangthai', '$phone', '$address', '')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateProfile($manhanvien, $fullname, $phone, $address, $about)
    {
        $sql = "UPDATE user SET fullname = '$fullname',phone='$phone', address = '$address', about='$about' WHERE manhanvien = '$manhanvien'";
        $conn = $this->connect();
        return $conn->query($sql);
    }

    public function UpdateUser($manhanvien, $fullname, $email, $password, $chucvu, $capbac, $trangthai, $phone, $address)
    {
        $sql = "UPDATE user SET manhanvien ='$manhanvien', fullname = '$fullname', email='$email', password='$password', id_chucvu='$chucvu', id_level='$capbac', id_status='$trangthai', phone='$phone', address = '$address' WHERE manhanvien = '$manhanvien'";
        $conn = $this->connect();
        return $conn->query($sql);
    }

    public function DeleteUser($manhanvien)
    {
        $sql = "DELETE FROM user WHERE manhanvien = '$manhanvien'";
        $conn = $this->connect();
        return $conn->query($sql);
    }

    public function GetInforUser($manhanvien)
    {
        $sql = "SELECT * FROM user WHERE manhanvien = '$manhanvien' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data = $datas;
            }
        }
        return $data;
    }
    public function GetSalaryUser($manhanvien)
    {
        $sql = "SELECT * FROM salary WHERE manhanvien = '$manhanvien' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetDetailSalaryUser($id)
    {
        $sql = "SELECT * FROM salary WHERE id = '$id' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data = $datas;
            }
        }
        return $data;
    }

    public function GetDetailListSalaryUser($manhanvien)
    {
        $sql = "SELECT * FROM salary WHERE manhanvien = '$manhanvien' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddSalary($manhanvien, $thangnam, $luongchinh, $baohiem, $phat, $no, $thucnhan)
    {
        $sql = "INSERT INTO salary(id, manhanvien, thangnam, luongchinh, baohiem, phat, no, thucnhan) VALUES(NULL,'$manhanvien', '$thangnam','$luongchinh', '$baohiem', '$phat', '$no', '$thucnhan')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateSalary($id, $manhanvien, $thangnam, $luongchinh, $baohiem, $phat, $no, $thucnhan)
    {
        $sql = "UPDATE salary SET manhanvien ='$manhanvien', thangnam = '$thangnam', luongchinh='$luongchinh', baohiem='$baohiem', phat='$phat', no='$no', thucnhan='$thucnhan' WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DeleteSalary($id)
    {
        $sql = "DELETE FROM salary WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }

    /**----------TEAM-------- */
    // public function GetAllTeam()
    // {
    //     $sql = "SELECT * FROM team";
    //     $con = $this->connect();
    //     $ketqua = $con->query($sql);

    //     if ($ketqua->num_rows == 0) {
    //         $data = 0;
    //     } else {
    //         while ($datas = mysqli_fetch_assoc($ketqua)) {
    //             $data[] = $datas;
    //         }
    //     }
    //     return $data;
    // }
    // public function AddTeam($mateam, $tenteam, $thanhvien)
    // {
    //     $sql = "INSERT INTO team(id, mateam, tenteam, thanhvien) VALUES(NULL,'$mateam', '$tenteam','$thanhvien')";
    //     $conn = $this->connect();
    //     return $conn->query($sql);
    // }
    /**-----------END TEAM--------- */


    /**--------------ROLE----------------- */
    public function RegisterRole($chucvu)
    {
        $sql = "INSERT INTO role_user(id, chucvu) VALUES(NULL,'$chucvu')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateRole($id, $chucvu)
    {
        $sql = "UPDATE role_user SET chucvu ='$chucvu' WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetInforRole($id)
    {
        $sql = "SELECT * FROM role_user WHERE id = '$id' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data = $datas;
            }
        }
        return $data;
    }
    public function DeleteRole($id)
    {
        $sql = "DELETE FROM role_user WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    /**--------------END ROLE----------------- */





    /**--------------LEVEL----------------- */
    public function RegisterLevel($level)
    {
        $sql = "INSERT INTO level(id, level) VALUES(NULL,'$level')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateLevel($id, $level)
    {
        $sql = "UPDATE level SET level ='$level' WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetInforLevel($id)
    {
        $sql = "SELECT * FROM level WHERE id = '$id' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data = $datas;
            }
        }
        return $data;
    }
    public function DeleteLevel($id)
    {
        $sql = "DELETE FROM level WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    /**--------------END LEVEL----------------- */




    /**--------------STATUS----------------- */
    public function RegisterStatus($status)
    {
        $sql = "INSERT INTO status_user(id, status) VALUES(NULL,'$status')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateStatus($id, $status)
    {
        $sql = "UPDATE status_user SET status ='$status' WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetInforStatus($id)
    {
        $sql = "SELECT * FROM status_user WHERE id = '$id' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data = $datas;
            }
        }
        return $data;
    }
    public function DeleteStatus($id)
    {
        $sql = "DELETE FROM status_user WHERE id = '$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    /**--------------END STATUS----------------- */
}
