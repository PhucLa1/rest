<?php
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['user'])){
    class c_danhmuc{
        public function index(){
            $ten='';
            $hinh_anh='';
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                include 'models/m_danhmuc.php';
                $m_danhmuc=new m_danhmuc();
                $danhmuc=$m_danhmuc->read_danhmuc_by_id($id);
                $ten=$danhmuc->ten_danh_muc;
                $hinh_anh=$danhmuc->hinh_anh;
            }
            $view='views/danhmuc/v_danhmuc.php';
            include 'templates/layout.php';
        }
        public function read_all_danhmuc(){
            include "models/m_danhmuc.php";
            $m_danhmuc=new m_danhmuc();
            $danhmucs=$m_danhmuc->read_danhmuc();
        }



        public function add_anh($path='../public/assets/images/layouts/'){
            $image = $_FILES['image']['name'];
            $target =$path.basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                return 1;
            }else{
                return 0;
            }
        }

        public function update_danh_muc(){
            if(isset($_POST['submit'])){
            //Them cac du lieu vao database
                if(isset($_GET['id'])){
                    include_once "models/m_danhmuc.php";
                    $m_danhmuc=new m_danhmuc();
                    if($this->add_anh()==1){
                        echo '<script language="javascript">alert("Đã upload thành công");</script>';
                        $m_danhmuc->update_danhmuc_by_id($_POST['name'],$_FILES['image']['name'],$_GET['id']);
                        echo '<script language="javascript">window.location.href="menu.php"</script>';
                    }
                    else{
                        echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
                    }
                }
            }
        }


        public function add_danh_muc(){
            if(isset($_POST['submit'])){
                //Them cac du lieu vao database
                include "models/m_danhmuc.php";
                $m_danhmuc=new m_danhmuc();
                if($this->add_anh()==1){
                    echo '<script language="javascript">alert("Đã upload thành công");</script>';
                    $m_danhmuc->add_danhmuc($_POST['name'],$_FILES['image']['name']);
                    echo '<script language="javascript">window.location.href="menu.php"</script>';
                }
                else{
                    echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
                }
            }
        }


        public function delete_danhmuc(){
            if(isset($_GET['id'])){
                include "models/m_danhmuc.php";
                $m_danhmuc=new m_danhmuc();
                $m_danhmuc->delete_danhmuc_by_id($_GET['id']);

                header('location: menu.php');
            }
        }
    }


}
else{
    header('location :login.php');
}


