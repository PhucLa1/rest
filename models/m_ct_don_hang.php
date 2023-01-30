<?php
include_once 'database.php';
class m_ct_don_hang extends database{
    public function read_ct_don_hang_by_id_datmon($id){
        $sql='select * from chi_tiet_don_hang where id_dat_mon=? and trang_thai=1';
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
    public function insert_data($so_luong,$id_mon_an,$id_dat_mon,$ten_mon_an,$gia_tien){
        $sql="INSERT INTO `chi_tiet_don_hang` (`id_ct_don_hang`, `so_luong`, `da_len_mon`, `id_mon_an`, `id_dat_mon`, `ten_mon_an`, `gia_tien`, `trang_thai`) VALUES (NULL, ?, '0', ?, ?, ?, ?, '1');";
        $this->setQuery($sql);
        $this->execute(array($so_luong,$id_mon_an,$id_dat_mon,$ten_mon_an,$gia_tien));
    }
    public function read_id_monan_by_id_datmon($id_dat_mon){
        $sql="SELECT id_mon_an FROM chi_tiet_don_hang where id_dat_mon=?";
        $this->setQuery($sql);
        $array=[];
        foreach ($this->loadAllRows(array($id_dat_mon)) as $value){
            $array[]=$value->id_mon_an;
        }
        return $array;
    }
    public function read_so_luong_by_id_monan_and_id_datmon($id_mon_an,$id_dat_mon){
        $sql="SELECT so_luong FROM chi_tiet_don_hang where id_mon_an=? and id_dat_mon=?";
        $this->setQuery($sql);
        return $this->loadRow(array($id_mon_an,$id_dat_mon));
    }
    public function update_so_luong_by_id_monan_and_id_dat_mon($so_luong,$id_mon_an,$id_dat_mon){
        $sql="UPDATE chi_tiet_don_hang SET so_luong=? where id_mon_an=? and id_dat_mon=?";
        $this->setQuery($sql);
        $this->execute(array($so_luong,$id_mon_an,$id_dat_mon));
    }
}
