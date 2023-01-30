<?php
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['user'])){
    class c_home{
        public function index(){
            include_once 'models/m_ct_don_hang.php';
            include_once 'models/m_datmon.php';
            $m_datmon=new m_datmon();
            $datmons= $m_datmon->read_datmon();
            $view= 'views/home/v_home.php';
            include 'templates/layout.php';
        }
    }
}
else{
    header('location: login.php');
}
