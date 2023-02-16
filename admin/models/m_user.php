<?php
include_once ("database.php");
class m_user extends database {
    //xây dựng phương  thức để kiểm tra tài khoản và mật khẩu
    public function read_user_by_id_pass($username,$password) {
        $sql = "select * from nguoi_dung where ten_dang_nhap = ? and mat_khau =  ?";
        $this->setQuery($sql);
        return $this->loadRow(array($username,md5($password)));
        //lỗ hổng bảo mật web sql injection
    }

    public function read_user_by_username($username) {
        $sql = "select * from nguoi_dung where ten_dang_nhap = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($username));
    }

    public function read_user_by_password($password){
        $sql = "select * from nguoi_dung where mat_khau = ?";
        $this->setQuery($sql);
        return $this->loadRow(array(md5($password)));
    }
    public function add_user($username,$password,$email,$name){  //phuong thuc dang ki
        $sql="INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `ma_loai_nguoi_dung`, `ho_ten`, `ten_dang_nhap`, `mat_khau`, `email`, `ngay_dang_ky`, `ngay_dang_nhap_cuoi`, `active`) VALUES (NULL, ?, ?, ?, ?, ?, '2022-12-11', '2022-12-20', '1');";
        $this->setQuery($sql);
        $this->execute(array(24,$name,$username,$password,$email));
        echo 'hello';
    }
    public function read_all_user_list(){
        $sql='select * from nguoi_dung where active=1';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function delete_user_by_id($id){
        //Xoa mem
        $sql='UPDATE nguoi_dung SET active = 0 where ma_nguoi_dung=?';
        $this->setQuery($sql);
        $this->execute(array($id));
    }
    public function read_user_by_id($id){
        $sql='select * from nguoi_dung where ma_nguoi_dung=?';
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function update_user($username,$password,$email,$name,$id){
        $sql='update nguoi_dung set ten_dang_nhap=?,mat_khau=?,email=?,ho_ten=? where ma_nguoi_dung=?';
        $this->setQuery($sql);
        $this->execute(array($username,$password,$email,$name,$id));
    }

}