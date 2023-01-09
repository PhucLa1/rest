<?php
require_once  'vendor/autoload.php';
class c_thongbao{
    public function Notification(){
        if(isset($_POST['loai_thong_bao'])){
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                '4e07d084fadbca3b217a',
                '30f6bfa0bfc4b528e1ec',
                '1531466',
                $options
            );
            if($_POST['loai_thong_bao']=='pay'){
                $this->add_thong_bao(1);
                $data['message'] = $this->get_ten_ban().' cần thanh toán';
            }
            else{
                $this->add_thong_bao(2);
                $data['message'] = $this->get_ten_ban().' cần giúp đỡ';
            }
            $pusher->trigger('restaurant_MVC', 'notification', $data);
        }
    }




    public function get_ten_ban(){
        include_once 'models/m_datmon.php';
        include_once 'models/m_ban.php';
        $m_datmon=new m_datmon();
        $datmon=$m_datmon->read_datmon_id($_POST['id_dat_mon']);
        $m_ban=new m_ban();
        $ban=$m_ban->read_ban_by_id($datmon->id_ban);
        return $ban->ten_ban;
    }

    public function add_thong_bao($loai_thong_bao){
        include_once 'models/m_thongbao.php';
        include_once 'models/m_datmon.php';
        $m_datmon=new m_datmon();
        $datmon=$m_datmon->read_datmon_id($_POST['id_dat_mon']);
        $id_ban=$datmon->id_ban;
        $m_thongbao=new m_thongbao();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y/m/d H:i:s');
        $m_thongbao->add_thong_bao($id_ban,$loai_thong_bao,$date);
    }
}
