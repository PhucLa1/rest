<?php
include ("models/m_khach_hang.php");
class c_khach_hang
{
    public function khach_hang_list()
    {
        if (isset($_POST['submit'])) {
            header('location: khach_hang-add.php');
        }
        $m_khach_hang = new m_khach_hang();
        $khach_hang = $m_khach_hang->read_khach_hang();
        $view = "views/khach_hang/v_khach_hang-list.php";
        include "templates/layout.php";
    }

}
?>