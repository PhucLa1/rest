<?php
session_start();
$_SESSION['user']=1;
if($_SESSION['user']==1){
    ?>
    <p>Hello</p>
<?php } ?>