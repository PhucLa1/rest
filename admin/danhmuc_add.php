<?php
include "controllers/c_danhmuc.php";
$c_danhmuc= new c_danhmuc();
$c_danhmuc->index();
if(!isset($_GET['id'])){
    $c_danhmuc->add_danh_muc();
}
else{
    $c_danhmuc->update_danh_muc();
}
?>
