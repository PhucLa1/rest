<?php
include_once "database.php";
class m_datmon extends database {
    public function read_dat_mon_by_idgroup_and_idban($id_ban,$id_group){
        $sql='select * from `dat_mon`  where trang_thai=1 and id_ban=? and id_group=?';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_ban,$id_group));
    }
    public function insert_data(){
        $sql="INSERT INTO `dat_mon` (`id_dat_mon`, `id_ban`, `id_group`, `trang_thai`) VALUES (NULL, '1', '1', '1');";
        $this->setQuery($sql);
        $this->execute();
    }
    public function read_datmon_id($id){
        $sql='select * from dat_mon where id_dat_mon=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

}