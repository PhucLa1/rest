<?php
include ("models/m_ban.php");
class c_ban
{
    public function ban_list()
    {
        if (isset($_POST['submit'])) {
            header('location: ban-add.php');
        }
        $m_ban = new m_ban();
        $bans = $m_ban->read_danh_sach_ban();
        $view = "views/ban/v_ban-list.php";
        include "templates/layout.php";
    }

    public function add_ban()
    {
        if (isset($_POST['cancle'])) {
            header('location: ban-list.php');
        } elseif (isset($_POST['submit'])) {
            $id_ban = NULL;
            $ten_ban = $_POST["name"];
            $so_cho_ngoi = $_POST["sochongoi"];
            $ban = new m_ban();
            $result = $ban->add_ban($ten_ban, $so_cho_ngoi);
            if ($result) {
                echo "<script>alert('Thêm thành công')</script>";
            } else {
                echo "<script>alert('Thêm không thành công')</script>";
            }
        }
        $view = "views/ban/v_ban-add.php";
        include "templates/layout.php";
    }

    public function edit_ban()
    {
        $m_ban = new m_ban();
        if (isset($_GET['id'])) {
            $id_ban = $_GET['id'];
            $ban_detail = $m_ban->read_ban_by_only_id_ban($id_ban);
            if (isset($_POST['cancle'])) {
                header('location: ban-list.php');
            } elseif (isset($_POST['submit'])) {
                $ten_ban = $_POST["name"];
                $so_cho_ngoi = $_POST["sochongoi"];
                $ban = new m_ban();
                $result = $ban->edit_ban( $ten_ban, $so_cho_ngoi,$id_ban);
                if ($result) {
                    echo "<script>alert('Sửa thành công')</script>";
                    header('location: ban-list.php');
                } else {
                    echo "<script>alert('Sửa không thành công')</script>";
                }
            }
        }
        $view = "views/ban/v_ban-edit.php";
        include "templates/layout.php";
    }

    public function delete_ban()
    {
        $m_ban = new m_ban();
        if (isset($_GET['id'])) {
            $id_ban = $_GET['id'];
            $delete = $m_ban->delete_ban($id_ban);
            if ($delete) {
                echo "<script>alert(Xóa thành công)</script>";
            } else {
                echo "<script>alert('Xóa không thành công')</script>";
            }
            header("location: ban-list.php");
        }
    }

    public function ban_trong(){
        //Hàm chạy giúp mình khi bàn đã thanh toán thì bàn sẽ quay trở về trạng thái =0,nghĩa là bàn trống
        if(isset($_POST['id_ban'])){
            include_once 'models/m_datmon.php';
            include_once 'models/m_ct_don_hang.php';
            include_once 'models/m_ban.php';
            $m_ban=new m_ban();
            $m_datmon=new m_datmon();
            $m_ct_don_hang=new m_ct_don_hang();
            $datmon=$m_datmon->read_datmon_id_ban($_POST['id_ban']);
            $id_datmon=$datmon->id_dat_mon;
            $ct_don_hang=$m_ct_don_hang->read_ct_don_hang_by_id_datmon($id_datmon);
            $ok=0;
            foreach ($ct_don_hang as $value){
                if($value->so_luong!=$value->da_len_mon){
                    $ok=1;
                }
            }
            if($ok==0){
                $m_ban->delete_ban($_POST['id_ban']);
                $m_datmon->delete_datmon($_POST['id_ban']);
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:i:s');
                $m_datmon->update_thoi_gian_ra_by_id_ban($date,$_POST['id_ban']);
                $m_ct_don_hang->update_trang_thai_by_id_datmon($id_datmon);
                echo ',$0';
            }
            else{
                echo 1;
                //truong hop nay la chua len day du mon cho ban do
            }
        }
    }

    public function dat_ban(){
        if(isset($_POST['id_ban_trong'])){
            //Xứ lí phần QrCode
            include_once '../phpqrcode/qrlib.php';
            include_once 'models/m_ban.php';
            include_once 'models/m_datmon.php';
            include_once 'models/m_nhoman.php';
            $m_ban=new m_ban();
            if($m_ban->read_ban_by_only_id_ban($_POST['id_ban_trong'])->trang_thai==0){
                //Xử lí phần đặt bàn
                $m_group=new m_nhoman();
                $m_group->insert_data(); //Khi mà khách chọn được bàn thì sẽ thêm khách vào trong database
                //Lấy id mới nhất của group đó
                $array=$m_group->read_nhoman();
                $id_group=end($array)->id_group;  //Và lấy id_group của nhóm khách vừa vào để lấy đó làm dữ liệu để thêm vào đặt món
                $m_datmon=new m_datmon();
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:i:s');
                $m_datmon->insert_data($_POST['id_ban_trong'],$id_group,$date); //
                $m_ban->update_ban($_POST['id_ban_trong']);  //Và chuyển trạng thái của bàn là 1, tức là bàn đó có người
                $datmon=$m_datmon->read_datmon();
                $id_dat_mon=end($datmon)->id_dat_mon;  //Id đặt món này là cái id mà chúng ta vừa thêm vào

                //Xử lí phần QRcode
                $content = 'http://localhost/rest/input_kh.php?id_dat_mon='.$id_dat_mon ;
                $path = '../images/';
                $qrcode = $path.time().".png";  //Đường dẫn đến file cần ghi
                QRcode::png($content,$qrcode) ;  //Lưu ảnh vào đường dẫn file
                $m_datmon->update_qrcode($qrcode,$id_dat_mon);

                echo $date.',';
                echo $qrcode;
            }
            else{
                echo 1;
            }
        }
    }


    public function show_lichsu_ban(){
        include_once 'models/m_ban.php';
        include_once 'models/m_datmon.php';
        include_once 'models/m_ct_don_hang.php';
        $m_ct_don_hang=new m_ct_don_hang();
        $m_ban=new m_ban();
        $m_datmon=new m_datmon();
        if(isset($_GET['id_ban']) && !isset($_GET['id_dat_mon'])){
            $ban=$m_ban->read_ban_by_only_id_ban($_GET['id_ban']);
            $datmons=$m_datmon->read_datmon_by_id_ban($_GET['id_ban']);
            $view = "views/lich_su/v_lich_su.php";
            include "templates/layout.php";
        }
        if(isset($_GET['id_dat_mon'])){
            $view = "views/lich_su/v_chi_tiet.php";
            include "templates/layout.php";
        }

    }
}
?>