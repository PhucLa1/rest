<?php
require_once ("database.php");
class m_ban extends database{
    public function read_ban(){
        $sql = "SELECT * FROM ban where trang_thai=1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function add_ban($ten_ban,$so_cho_ngoi){
        $sql = "INSERT INTO `ban` (`id_ban`, `ten_ban`, `so_cho_ngoi`, `trang_thai`) VALUES (NULL, ?, ?, '0');";
        $this->setQuery($sql);
        return $this->execute(array($ten_ban,$so_cho_ngoi));
    }

    public function read_ban_by_id_ban($id_ban){
        $sql = "SELECT * FROM ban WHERE id_ban = ? and trang_thai = 1";
        $this->setQuery($sql);
        return $this->loadRow(array($id_ban));
    }
    public function read_ban_by_only_id_ban($id_ban){
        $sql = "SELECT * FROM ban WHERE id_ban = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id_ban));
    }
    public function read_ban_by_id_ban_trangthai($id_ban){
        $sql = "SELECT * FROM ban WHERE id_ban = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id_ban));
    }

    public function edit_ban($ten_ban,$so_cho_ngoi,$id_ban) {
        $sql = "update ban set ten_ban = ?,so_cho_ngoi=?where id_ban = ?";
        $this->setQuery($sql);
        return $this->execute(array($ten_ban,$so_cho_ngoi,$id_ban));
    }

    public function delete_ban($id_ban){
        $sql = "DELETE FROM ban WHERE id_ban=?";
        $this->setQuery($sql);
        $this->execute(array($id_ban));
    }
    public function read_danh_sach_ban(){
        $sql = "SELECT * FROM ban";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function update_ban($id_ban){
        $sql = "update ban set trang_thai = 1 where id_ban = ?";
        $this->setQuery($sql);
        return $this->execute(array($id_ban));
    }
}
