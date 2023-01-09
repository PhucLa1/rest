<?php
include_once 'database.php';
class m_thongbao extends database {
    public function read_thong_bao(){
        $sql='select * from thong_bao where trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
