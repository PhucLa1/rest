<?php
require  '../vendor/autoload.php';
class c_ct_don_hang{
    public function showFood(){
        if(isset($_POST['show_food'])){
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
                        $string.='<div onclick="Served('.$value->id_ct_don_hang.')" class="d-flex">
                            <img src="../public/assets/images/layouts/'.$monan->hinh_anh.'" class="img-fluid rounded-pill avatar-60" alt="">
                            <div class="ms-4 order-history">
                                <h6 class="mb-2 heading-title fw-bolder">'.$monan->ten_mon_an.'</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="heading-title fw-bolder">$'.$monan->gia_tien.'</h6>
                                    <h6 style="margin-left: 1rem" class="heading-title fw-bolder">Số lượng: '.$value->so_luong.'</h6>
                                </div>
                                                                <div id="lenmon_'.$value->id_ct_don_hang.'">
                                    <small style="color: '.$color .'"  class="float-start font-size-12">Đã lên món X '.$value->da_len_mon .'</small>
                                </div>
                                <p><input type="number"></p>
                                <hr class="my-4">
                            </div>
                        </div>';
                    }
                    echo $string;
                }
            echo 'pay $'.$tong_tien;
            }

        }


    public function Served(){
        //Hàm thực hiện khi mà món ăn được phục vụ xong thì nó sẽ +1 vào phần đã lên món
        if(isset($_POST['id_ct_don_hang'])){
            include_once 'models/m_ct_don_hang.php';
            $m_ct_don_hang= new m_ct_don_hang();
            $ct_don_hang=$m_ct_don_hang->read_ct_don_hang_by_id($_POST['id_ct_don_hang']);
            $da_len_mon=$ct_don_hang->da_len_mon;
            $so_luong=$ct_don_hang->so_luong;
            if($da_len_mon==$so_luong){
                echo false;
            }
            else{
                $da_len_mon+=1;
                $m_ct_don_hang->update_da_len_mon_by_id($da_len_mon,$_POST['id_ct_don_hang']);
                $color=$da_len_mon<$so_luong?'red':'green';
                echo '<small style="color: '.$color.'"  class="float-start font-size-12">Đã lên món X '.$da_len_mon.'</small>';
            }

            //Gửi dữ liệu sang cho trang khách hàng để nó có thể hiện ra được những món ăn nào mà đã lên,những món nào mà chưa lên
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
            $data['so_luong']=$so_luong;
            $data['da_len_mon']=$da_len_mon;
            $data['id_ct_don_hang'] = $_POST['id_ct_don_hang'];
            $pusher->trigger('restaurant_MVC', 'da_len_mon', $data);
        }
    }
}
