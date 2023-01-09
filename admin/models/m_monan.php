<?php
include_once "database.php";
class m_monan extends database{
    public function read_monan(){
        $sql='select * from mon_an where trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function add_monan($gia_tien,$id_danh_muc,$mo_ta,$ten_mon_an,$hinh_anh){
        $sql="INSERT INTO `mon_an` (`gia_tien`, `id_mon_an`, `id_danh_muc`, `mo_ta`, `ten_mon_an`, `hinh_anh`, `trang_thai`) VALUES (?, NULL, ?, ?, ?, ?, '1');";
        $this->setQuery($sql);
        $this->execute(array($gia_tien,$id_danh_muc,$mo_ta,$ten_mon_an,$hinh_anh));
    }
    public function count_monan_by_id($id){
        $sql="SELECT COUNT(*) FROM `mon_an` WHERE id_danh_muc=? and trang_thai=1";
        $this->setQuery($sql);
        return $this->loadRecord(array($id));
    }
    public function read_count_monan(){
        $sql='select * from danh_muc where trang_thai=1';
        $this->setQuery($sql);
        $danhmucs=$this->loadAllRows();
        $count=[];
        foreach ($danhmucs as $danhmuc){
            $id=$danhmuc->id_danh_muc;
            $count[$id]=$this->count_monan_by_id($id);
        }
        return $count;
    }
    public function read_monan_by_id($id){
        $sql='select * from mon_an where id_mon_an=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function delete_by_id($id){
        $sql='update mon_an set trang_thai=0 where id_mon_an=?';
        $this->setQuery($sql);
        $this->execute(array($id));
    }
    public function update_by_id($gia_tien,$id_danh_muc,$mo_ta,$ten_mon_an,$hinh_anh,$id){
        $sql='update mon_an set gia_tien=?,id_danh_muc=?,mo_ta=?,ten_mon_an=?,hinh_anh=? where id_mon_an=?';
        $this->setQuery($sql);
        $this->execute(array($gia_tien,$id_danh_muc,$mo_ta,$ten_mon_an,$hinh_anh,$id));
    }
    public function read_monan_by_id_danhmuc($id){
        $sql='select * from mon_an where id_danh_muc=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
}
//$m_monan=new m_monan();
//echo $m_monan->read_count_monan();
