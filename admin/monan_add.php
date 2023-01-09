<?php
include "controllers/c_monan.php";
$c_monan=new c_monan();
$c_monan->index();
if(!isset($_GET['id'])){
    $c_monan->add_mon_an();
}
else{
    $c_monan->update_mon_an();
}
