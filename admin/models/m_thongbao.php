<?php
include_once 'database.php';
class m_thongbao extends database {
    public function read_thong_bao(){
        $sql='select * from thong_bao';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function update_trangthai_by_id($id_thongbao){
        $sql='update thong_bao set trang_thai=0 where id_thong_bao=?';
        $this->setQuery($sql);
        $this->execute(array($id_thongbao));
    }
}
