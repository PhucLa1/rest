<?php
if(!isset($_SESSION)){
    @session_start();
}
if(isset($_SESSION['user'])){
    class c_monan{
        private $image;
        private $ten_mon_an;
        private $gia_tien;
        private $mo_ta;
        private $id_danh_muc;

        public function set_value(){
            $this->image=$_FILES['image']['name'];
            $this->ten_mon_an=$_POST['ten_mon_an'];
            $this->gia_tien=$_POST['gia_tien'];
            $this->mo_ta=$_POST['mo_ta'];
            $this->id_danh_muc=$_POST['id_danh_muc'];
        }

        public function index(){
            include_once "models/m_danhmuc.php";
            include_once 'models/m_monan.php';
            $m_monan=new m_monan();
            $m_danhmuc=new m_danhmuc();
            $danhmucs=$m_danhmuc->read_danhmuc();
            $ten='';
            $gia_tien='';
            $kieu_mon_an=0;
            $mo_ta='';
            $hinh_anh='';
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $monan=$m_monan->read_monan_by_id($id);
                $ten=$monan->ten_mon_an;
                $gia_tien=$monan->gia_tien;
                $kieu_mon_an=$monan->id_danh_muc;
                $mo_ta=$monan->mo_ta;
                $hinh_anh=$monan->hinh_anh;
                echo $kieu_mon_an;
            }
            $view='views/monan/v_monan.php';
            include 'templates/layout.php';
        }

        public function index_list(){
            include_once "models/m_danhmuc.php";
            include_once "models/m_monan.php";
            $m_danhmuc=new m_danhmuc();
            $danhmucs=$m_danhmuc->read_danhmuc();
            $m_monan=new m_monan();
            $count=$m_monan->read_count_monan();
            $monans=$this->read_monan_by_id_danhmuc();
            $view='views/menu/v_monan.php';
            include 'templates/layout.php';
        }

        public function read_monan_by_id_danhmuc(){
            require_once "models/m_monan.php";
            $m_monan=new m_monan();
            if(isset($_GET['id_danh_muc'])){
                $id=$_GET['id_danh_muc'];
                return $m_monan->read_monan_by_id_danhmuc($id);
            }
            else{
                $m_monan=new m_monan();
                return  $m_monan->read_monan();
            }
        }
        public function add_mon_an($path='../public/assets/images/layouts/'){
            if(isset($_POST['submit'])){
                $image = $_FILES['image']['name'];
                $target =$path.basename($image);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    echo '<script language="javascript">alert("Đã upload thành công");</script>';
                    $this->add_database();
                    echo '<script language="javascript">window.location.href="menu.php"</script>';
                }else{
                    echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
                }
            }
        }

        public function update_mon_an($path='../public/assets/images/layouts/'){
            if(isset($_POST['submit'])){
                $image = $_FILES['image']['name'];
                $target =$path.basename($image);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    echo '<script language="javascript">alert("Đã upload thành công");</script>';
                    $this->update_database();
                    echo '<script language="javascript">window.location.href="menu.php"</script>';
                }else{
                    echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
                }
            }
        }
        public function add_database(){
            //Khoi tao gia tri cho mon an
            $this->set_value();

            //Add them mon an vao trong
            include_once "models/m_monan.php";
            $m_monan=new m_monan();
            $m_monan->add_monan($this->gia_tien,$this->id_danh_muc,$this->mo_ta,$this->ten_mon_an,$this->image);
        }

        public function update_database(){
            //Khoi tao gia tri cho mon an
            if(isset($_GET['id'])){
                $this->set_value();

                //Add them mon an vao trong
                include_once "models/m_monan.php";
                $m_monan=new m_monan();
                $m_monan->update_by_id($this->gia_tien,$this->id_danh_muc,$this->mo_ta,$this->ten_mon_an,$this->image,$_GET['id']);
            }

        }


        public function delete_monan_by_id(){
            if(isset($_GET['id'])){
                require_once "models/m_monan.php";
                $m_monan=new m_monan();
                $m_monan->delete_by_id($_GET['id']);
                header('location: menu.php');
            }
        }

    }
}
else{
    header('location:login.php');
}




