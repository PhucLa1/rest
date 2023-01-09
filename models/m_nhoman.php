<?php
include_once 'database.php';
class m_nhoman extends database {
    public function update_nhoman_by_id($ten,$id){
        $sql="update nhom_an set ten_group=? where id_group=?";
        $this->setQuery($sql);
        $this->execute(array($ten,$id));
    }
}

