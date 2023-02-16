<?php

if(!isset($_SESSION)){
    @session_start();
}
class c_user{
    public function checkLogin(){
        if(isset($_POST['btn-login'])){
            $user=$_POST['username'];
            $pass=$_POST['password'];

            include "models/m_user.php";
            $m_user=new m_user();
            $rowOfUser=$m_user->read_user_by_id_pass($user,$pass);
            if(!empty($rowOfUser)){  //tai khoan va mat khau duoc nhap dung
                $_SESSION['user']=$user;
                $_SESSION['typeOfUser']=$rowOfUser->ma_loai_nguoi_dung;
                $_SESSION['nameOfUser']=$rowOfUser->ho_ten;
                $_SESSION['idOfUser']=$rowOfUser->ma_nguoi_dung;
                if($_SESSION['typeOfUser']==1){
                    header('location: home.php');
                }else{
                    header('location: datmon.php');
                }

            }
            else{   //Tai khoan va mat khau bi nhap sai
                header('location:login.php');
            }
        }
    }
    public function logout(){
        unset($_SESSION['user']);
        header('location:login.php');
    }
    public function logup(){
        if(isset($_POST['btn-logup'])){
            $name=$_POST['fullname'];
            $username=$_POST['username'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            include "models/m_user.php";
            $m_user=new m_user();
            if($_GET['home']==0){
                header('location: logup.php');
            }
            else{
                $m_user->add_user($username,$pass,$email,$name);
                header('location: home.php');
            }
        }
    }
    public function user_list(){
        if(isset($_SESSION['user'])){
            include 'models/m_user.php';
            $m_user=new m_user();
            $users=$m_user->read_all_user_list();
            if($_SESSION['typeOfUser']==1){
                $view= 'views/user-list/v_user-list.php';
                include 'templates/layout.php';
            }
            else{
                header('location: error404.php');
            }
        }
        else{
            header('location : login.php');
        }

    }
    public function delete_user(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            include 'models/m_user.php';
            $m_user=new m_user();
            $m_user->delete_user_by_id($id);
            header('location: user-list.php');
        }
    }
    public function read_infor_user_by_id(){
        if(isset($_SESSION['user'])){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                include 'models/m_user.php';
                $m_user=new m_user();
                return $m_user->read_user_by_id($id);
            }
        }
        else{
            header('location: login.php');
        }

    }
    public function update_user_by_id(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];

            //Thong tin sau khi sua lai
            $name=$_POST['fullname'];
            $username=$_POST['username'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];

            include 'models/m_user.php';
            $m_user=new m_user();
            $m_user->update_user($username,$pass,$email,$name,$id);
            header('location: user-list.php');
        }
    }

}
