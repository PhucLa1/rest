<?php
include_once 'database.php';
class m_khachhang extends database{
    public function add_khach_hang($id_group,$ho_ten){
        $sql="INSERT INTO `khach_hang` (`id_khach_hang`, `id_group`, `ho_ten`, `trang_thai`) VALUES (NULL, ?, ?, '1');";
        $this->setQuery($sql);
        $this->execute(array($id_group,$ho_ten));
    }
    public function read_khachhang_by_idgroup($id_group){
        $sql="select * from khach_hang WHERE id_group=?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_group));
    }
}