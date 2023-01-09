<?php
include_once "database.php";
class m_danhmuc extends database {
    public function add_danhmuc($name,$hinh_anh){
        $sql="INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`, `hinh_anh`, `trang_thai`) VALUES (NULL, ?, ?, '1');";
        $this->setQuery($sql);
        $this->execute(array($name,$hinh_anh));
    }
    public function read_danhmuc(){
        $sql='select * from danh_muc where trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_danhmuc_by_id($id){
        $sql='select * from danh_muc where id_danh_muc=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function delete_danhmuc_by_id($id){
        //Xoa mem
        $sql='update danh_muc set trang_thai=0 where id_danh_muc=?';
        $this->setQuery($sql);
        $this->execute(array($id));
    }
    public function update_danhmuc_by_id($name,$hinh_anh,$id){
        $sql='update danh_muc set ten_danh_muc=?,hinh_anh=? where id_danh_muc=?';
        $this->setQuery($sql);
        $this->execute(array($name,$hinh_anh,$id));
    }
}
