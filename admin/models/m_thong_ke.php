<?php
require_once ("database.php");
class m_khach_hang extends database{
    public function read_khach_hang(){
        $sql = "SELECT * FROM khach_hang where trang_thai=1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
