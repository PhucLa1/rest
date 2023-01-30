<?php
class c_nhoman{
    public function update_ten_nhom_an(){
        include_once 'models/m_nhoman.php';
        include_once 'models/m_datmon.php';
        include_once 'models/m_khachhang.php';
        if(isset($_POST['name'])){
            $m_datmon=new m_datmon();
            $datmon=$m_datmon->read_datmon_id($_POST['id_dat_mon']);
            if(empty($datmon)){
                header('location: error404.php?id_dat_mon='.$_POST['id_dat_mon']);
            }
            else{
                $id_group=$datmon->id_group;
                $m_nhoman=new m_nhoman();
                $m_khachang=new m_khachhang();
                $khach_hang=$m_khachang->read_khachhang_by_idgroup($id_group);
                if(empty($khach_hang)){
                    $m_nhoman->update_nhoman_by_id($_POST['name'],$id_group);
                    $m_khachang=new m_khachhang();
                    $m_khachang->add_khach_hang($id_group,$_POST['name']);
                    echo 1;
                }
                else{
                    $m_khachang->add_khach_hang($id_group,$_POST['name']);
                }

                header('location: monan.php?id_dat_mon='.$_POST['id_dat_mon']);
            }

        }
    }
}