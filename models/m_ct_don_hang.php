<?php
include_once 'database.php';
class m_ct_don_hang extends database{
    public function read_ct_don_hang_by_id_datmon($id){
        $sql='select * from chi_tiet_don_hang where id_dat_mon=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
    public function read_ct_don_hang_by_lan_goi_mon_and_id_datmon($lan_goi_mon,$id_dat_mon){
        $sql='select * from chi_tiet_don_hang where lan_goi_mon=? and id_dat_mon=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows(array($lan_goi_mon,$id_dat_mon));
    }
    public function insert_data($so_luong,$id_mon_an,$id_dat_mon,$ten_mon_an,$lan_goi_mon){
        $sql="INSERT INTO `chi_tiet_don_hang` (`id_ct_don_hang`, `so_luong`, `da_len_mon`, `id_mon_an`, `id_dat_mon`, `ten_mon_an`, `lan_goi_mon`, `trang_thai`) VALUES (NULL, ?, '0', ?, ?, ?, ?, '1');";
        $this->setQuery($sql);
        $this->execute(array($so_luong,$id_mon_an,$id_dat_mon,$ten_mon_an,$lan_goi_mon));
    }
}