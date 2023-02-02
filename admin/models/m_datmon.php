<?php
include_once 'database.php';
class m_datmon extends database {
    public function read_datmon_id_ban($id_ban){
        $sql='select * from dat_mon where id_ban=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadRow(array($id_ban));
    }
    public function read_datmon_by_id_ban($id_ban){
        $sql='select * from dat_mon where id_ban=?';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_ban));
    }
    public function read_datmon(){
        $sql='select * from dat_mon';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function read_datmon_id($id){
        $sql='select * from dat_mon where id_dat_mon=?';
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function insert_data($id_ban,$id_group,$thoi_gian_vao){
        $sql="INSERT INTO `dat_mon` (`id_dat_mon`, `id_ban`, `id_group`, `qrCode`, `thoi_gian_vao`, `thoi_gian_ra`, `trang_thai`) VALUES (NULL, ?, ?, NULL, ?, NULL, '1');";
        $this->setQuery($sql);
        $this->execute(array($id_ban,$id_group,$thoi_gian_vao));
    }
    public function delete_datmon($id_ban){
        $sql="update dat_mon set trang_thai=0 where id_ban=?";
        $this->setQuery($sql);
        $this->execute(array($id_ban));
    }
    public function update_thoi_gian_ra_by_id_ban($thoi_gian_ra,$id_ban){
        $sql="update dat_mon set thoi_gian_ra=? where id_ban=?;";
        $this->setQuery($sql);
        $this->execute(array($thoi_gian_ra,$id_ban));
    }
    public function update_qrcode($qrcode,$id_dat_mon){
        $sql="update dat_mon set qrCode=? where id_dat_mon=?;";
        $this->setQuery($sql);
        $this->execute(array($qrcode,$id_dat_mon));
    }
    public function read_datmon_by_thoi_gian_vao($thoi_gian_vao){
        $sql="SELECT * FROM dat_mon WHERE thoi_gian_vao LIKE ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($thoi_gian_vao));
    }
}



