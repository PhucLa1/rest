<?php
include_once "database.php";
class m_monan extends database {
    public function read_mon_an(){
        $sql='select * from mon_an where trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function read_monan_by_id_danhmuc($id){
        $sql='select * from mon_an where id_danh_muc=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
    public function read_monan_by_id($id){
        $sql='select * from mon_an where id_mon_an=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function delete_mon_an_by_id($id){
        $sql='update mon_an set trang_thai=0 where id_mon_an=?';
        $this->setQuery($sql);
        $this->execute(array($id));
    }
}
