<?php
include_once 'database.php';
class m_nhoman extends database{
    public function read_nhoman(){
        $sql='select * from nhom_an ';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insert_data(){
        $sql="INSERT INTO `nhom_an` (`id_group`, `ten_group`, `trang_thai`) VALUES (NULL, NULL, '1');";
        $this->setQuery($sql);
        $this->execute();
    }
}
