<?php
class c_nhoman{
    public function update_ten_nhom_an(){
        include_once 'models/m_nhoman.php';
        include_once 'models/m_datmon.php';
        if(isset($_POST['name'])){
            $m_datmon=new m_datmon();
            $datmon=$m_datmon->read_datmon_id($_POST['id_dat_mon']);
            $id_group=$datmon->id_group;
            $m_nhoman=new m_nhoman();
            $m_nhoman->update_nhoman_by_id($_POST['name'],$id_group);
            header('location: monan.php?id_dat_mon='.$_POST['id_dat_mon']);
        }
    }
}