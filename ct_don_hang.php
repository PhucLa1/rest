<?php
include 'controllers/c_ct_don_hang.php';
$c_ct_don_hang=new c_ct_don_hang();
$c_ct_don_hang->dat_mon();
$c_ct_don_hang->showHistory();