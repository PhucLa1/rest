<?php
include("models/m_thong_ke.php");
class c_thong_ke
{
    public function don_hang_list()
    {
        $view = "views/thong_ke/v_thong_ke_don_hang.php";
        include "templates/layout.php";
    }

    public function ban_list(){
        $view = "views/thong_ke/v_thong_ke_ban.php";
        include "templates/layout.php";
    }
}

?>