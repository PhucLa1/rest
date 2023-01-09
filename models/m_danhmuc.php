<?php
include_once "database.php";
class m_danhmuc extends database {
    public function read_danh_muc(){
        $sql='select * from danh_muc';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
