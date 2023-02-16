<?php
class c_datmon{
    public function index(){
        include_once 'models/m_ban.php';
        include_once 'models/m_datmon.php';
        include_once 'models/m_ct_don_hang.php';
        include_once 'models/m_monan.php';
        $m_ban=new m_ban();
        $bans=$m_ban->read_danh_sach_ban();
        $m_datmon=new m_datmon();
        $m_ct_don_hang=new m_ct_don_hang();
        $m_monan=new m_monan();
        if(!isset($_SESSION['user'])){
            $view='views/datmon/v_datmon.php';
            include 'templates/layout.php';
        }else{
            header('location: login.php');
        }
    }

}
