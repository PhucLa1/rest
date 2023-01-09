<?php
class c_datmon
{
    public function index()
    {
        include "models/m_datmon.php";
        $m_datmon=new m_datmon();
        $datmons= $m_datmon->read_dat_mon();
        $view = 'views/dat_mon/v_datmon.php';
        include 'templates/layout.php';
    }

}