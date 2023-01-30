<?php
include 'controllers/c_thongbao.php';
$c_thongbao=new c_thongbao();
$c_thongbao->show_notice();
$c_thongbao->read_thongbao();