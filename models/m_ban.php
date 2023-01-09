<?php
include_once "database.php";
class m_ban extends database {
    public function read_ban(){
        $sql='select * from ban';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_ban_by_id($id){
        $sql='select * from ban where id_ban=?';
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
}