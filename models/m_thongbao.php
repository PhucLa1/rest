<?php
include_once 'database.php';
class m_thongbao extends database{
    public function add_thong_bao($id_ban,$loai_thong_bao,$thoi_gian_nhan){
        $sql="INSERT INTO `thong_bao` (`id_thong_bao`, `id_ban`, `loai_thong_bao`, `thoi_gian_nhan`, `trang_thai`) VALUES (NULL, ?, ?, ?, '1');";
        $this->setQuery($sql);
        $this->execute(array($id_ban,$loai_thong_bao,$thoi_gian_nhan));
    }
}