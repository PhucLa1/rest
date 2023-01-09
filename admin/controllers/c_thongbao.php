<?php
class c_thongbao{
    public function show_notice(){
        if(isset($_POST['thongbao'])){
            include_once 'models/m_thongbao.php';
            include_once 'models/m_ban.php';
            $m_ban=new m_ban();
            $m_thongbao=new m_thongbao();
            $thongbaos=$m_thongbao->read_thong_bao();
            for ($i=count($thongbaos)-1;$i>=0;$i--){
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y/m/d H:i:s');
                //Xử lí phần hiện thông báo với thời gian hiện tại
                $minute=round((strtotime($date)-strtotime($thongbaos[$i]->thoi_gian_nhan))/60);  //Thời gian nhận tin nhắn cách thời gian hiện tại tính theo phút
                $hour=round($minute/60);
                $day=round($hour/24);
                $time_content=($minute>60)?($hour>24?$day.' ngày trước':$hour.' tiếng trước'):$minute.' phút trước';

                $ban=$m_ban->read_ban_by_id_ban($thongbaos[$i]->id_ban);
                $ten_ban=$ban->ten_ban;
                $content=($thongbaos[$i]->loai_thong_bao)==1?$ten_ban.' cần thanh toán':$ten_ban.' cần giúp đỡ từ nhân viên';
                echo '<a href="#" class="iq-sub-card">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3 w-100">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">'.$content.'</p>
                                                        <small class="float-end font-size-12">'.$time_content.'</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>';
            }
        }
    }
}