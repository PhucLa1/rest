<?php
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['user'])){
    class c_home{
        public function index(){
            $view= 'views/home/v_home.php';
            include 'templates/layout.php';
        }
    }
}
else{
    header('location: login.php');
}
