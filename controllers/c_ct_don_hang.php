<?php

session_start();
class c_ct_don_hang{
    public function dat_mon(){
        if(isset($_POST['dat_mon']) && isset($_POST['id_dat_mon'])){
            //Xử lí gọi món trong trang khách hàng
            include_once 'models/m_datmon.php';
            $m_datmon=new m_datmon();
            $datmon=$m_datmon->read_datmon_id($_POST['id_dat_mon']);
            if((empty($_SESSION['ten_mon_an']))){
                echo 1;  //Ở đây nghĩa là khách chưa chọn bất cứ món gì mà đã bấm đặt món
            }
            elseif (empty($datmon)){
                echo 2;  //Tuc la ban da thanh toan va khong the dat mon
            }
            else{
                include_once 'models/m_ct_don_hang.php';
                $m_ct_don_hang=new m_ct_don_hang();
                $ct_don_hang=$m_ct_don_hang->read_ct_don_hang_by_id_datmon($_POST['id_dat_mon']);
                $array_mon_an= $m_ct_don_hang->read_id_monan_by_id_datmon($_POST['id_dat_mon']);
                $mieu_ta=$_SESSION['mieu_ta'];
                foreach($mieu_ta as $key => $value) {
                    //Mỗi lần nhấn gọi món thì dữ liệu sẽ được thêm vào trong database chi tiết đơn hàng
                    $mieu_ta_mon_an = explode("+", $value); //mang : 0:so luong, 1:hinh anh ,2: gia tien ,3 :id_mon_an ,key :ten mon an
                    if(in_array($mieu_ta_mon_an[3],$array_mon_an)){
                        $so_luong=$m_ct_don_hang->read_so_luong_by_id_monan_and_id_datmon($mieu_ta_mon_an[3],$_POST['id_dat_mon'])->so_luong;
                        $m_ct_don_hang->update_so_luong_by_id_monan_and_id_dat_mon($so_luong+$mieu_ta_mon_an[0],$mieu_ta_mon_an[3],$_POST['id_dat_mon']);
                    }
                    else{
                        $m_ct_don_hang->insert_data($mieu_ta_mon_an[0],$mieu_ta_mon_an[3],$_POST['id_dat_mon'],$key,$mieu_ta_mon_an[2]);
                    }
                }
                //Sau khi đặt món xong thì nó sẽ reset lại cái giỏ hàng(Nghĩa là sẽ hủy đi hết tất cả các biến SESSION)
                session_destroy();
                include_once 'controllers/c_monan.php';
                $c_monan=new c_monan();
                $c_monan->bill();

                //Sau khi hoàn thành bên trang khách,thì hiện thông báo về trang admin
                require_once  'vendor/autoload.php';
                $this->showDatMon();
            }

        }
    }


    public function showHistory(){
        if(isset($_POST['orderHistory']) && isset($_POST['id_dat_mon'])){
            include_once 'models/m_monan.php';
            include_once 'models/m_ct_don_hang.php';
            $m_ct_don_hang=new m_ct_don_hang();
            $ct_don_hang=$m_ct_don_hang->read_ct_don_hang_by_id_datmon($_POST['id_dat_mon']);
            if(!empty($ct_don_hang)){
                //Nếu mảng chi tiết đơn hàng được đọc bởi id_dat_mon mà rỗng thì sẽ không thực hiện in ra,vì khi đó nó sẽ không có lần gọi món, thì no
                //in ra thông báo là warning nếu làm như vậy
                $tong_tien=0;


                    $string='';
                    foreach ($ct_don_hang as $value){
                        $color=$value->da_len_mon<$value->so_luong?'red':'green';
                        $m_monan=new m_monan();
                        $monan=$m_monan->read_monan_by_id($value->id_mon_an);
                        $tong_tien+=$monan->gia_tien*$value->so_luong;  //Tong so tien phai tra cho bua an do
                        $string.='                                <div id="monan_'.$value->id_mon_an.'" class="rounded-pill bg-soft-primary iq-my-cart">
                                    <div class="d-flex align-items-center justify-content-between profile-img4">
                                        <div class="profile-img11">
                                            <img src="public/assets/images/layouts/'.$monan->hinh_anh.'" class="img-fluid rounded-pill avatar-115 blur-shadow position-end" alt="img">
                                            <img src="public/assets/images/layouts/'.$monan->hinh_anh.'" class="img-fluid rounded-pill avatar-115"  alt="img"
                                                 data-iq-gsap="onStart"
                                                 data-iq-opacity="0"
                                                 data-iq-scale=".6"
                                                 data-iq-rotate="180"
                                                 data-iq-duration="1"
                                                 data-iq-delay="1"
                                                 data-iq-trigger="scroll"
                                                 data-iq-ease="none"
                                                     >
                                        </div>
                                        <div class="d-flex align-items-center profile-content">
                                            <div>
                                                <h6 class="mb-1 heading-title fw-bolder">'.$value->ten_mon_an.'</h6>
                                                <span class="d-flex align-items-center "><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="0.875" y="2.05469" width="1.66667" height="10" rx="0.833333" transform="rotate(-45 0.875 2.05469)" fill="#EA6A12"/>
                                 <rect x="2.05469" y="9.125" width="1.66666" height="10" rx="0.833332" transform="rotate(-135 2.05469 9.125)" fill="#EA6A12"/>
                                 </svg><small class="text-dark ms-1">'.$value->so_luong.'</small>
                              </span>
                                            </div>
                                        </div>
                                        <div class="me-4 text-end">
                              <path opacity="0.4" d="M19.6449 9.48924C19.6449 9.55724 19.112 16.298 18.8076 19.1349C18.6169 20.8758 17.4946 21.9318 15.8111 21.9618C14.5176 21.9908 13.2514 22.0008 12.0055 22.0008C10.6829 22.0008 9.38936 21.9908 8.1338 21.9618C6.50672 21.9228 5.38342 20.8458 5.20253 19.1349C4.88936 16.288 4.36613 9.55724 4.35641 9.48924C4.34668 9.28425 4.41281 9.08925 4.54703 8.93126C4.67929 8.78526 4.86991 8.69727 5.07026 8.69727H18.9408C19.1402 8.69727 19.3211 8.78526 19.464 8.93126C19.5973 9.08925 19.6644 9.28425 19.6449 9.48924" fill="#E60A0A"/>
                              <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="#E60A0A"/>
                              </svg>
                           </span>
                                            <p class="mb-0 text-dark">$'.$monan->gia_tien.'</p>
                                            <span  style="color: '.$color.'" id="lenmon_'.$value->id_ct_don_hang.'"  class="mb-1">Đã lên món X '.$value->da_len_mon.'</span>
                                        </div>
                                    </div>
                                </div>';
                    }
                    echo $string;
                }
                echo '<br><br> Tổng tiền phải thanh toán cho bữa ăn là :'.$tong_tien;
            }
        }


    public function showDatMon(){
        //Hàm này dùng để hỗ trợ khi mà mình click vào đặt hàng thì bên phía admin sẽ hiện ra được những gì mình chọn
        //Hiện thông báo sang bên admin
        //Hàm lấy id_ban
        include_once 'models/m_datmon.php';
        $m_datmon=new m_datmon();
        $datmon=$m_datmon->read_datmon_id($_POST['id_dat_mon']);
        $id_ban=$datmon->id_ban;
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
        $data['id_dat_mon']=$_POST['id_dat_mon'];
        $data['id_ban']=$id_ban;
        $pusher->trigger('restaurant_MVC', 'show-food', $data);
    }

}
