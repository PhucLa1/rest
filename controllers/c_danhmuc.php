<?php
class c_danhmuc{
    public function index()
    {
        include "models/m_danhmuc.php";
        $m_danhmuc=new m_danhmuc();
        $danhmucs = $m_danhmuc->read_danh_muc();
        $view='views/menu/v_danhmuc.php';
        include 'templates/layout.php';

    }
}