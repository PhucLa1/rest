
<?php include 'v_danhmuc.php';?>
                        <div class="col-xl-12 col-lg-12 dish-card-horizontal mt-2">
                            <div id="mon_an"  class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
                                <script>
                                    function addCart(id){
                                        $.ajax({
                                            type: 'post',
                                            url:'controllers/c_monan.php',
                                            data:{
                                                id_them:id
                                            },
                                            success:function (respon){
                                                $('#gio_hang').html(respon);
                                            }
                                        })
                                    }
                                </script>
                                <?php foreach ($monans as $monan){?>
                                    <div onclick="addCart(`monan_<?php echo $monan->id_mon_an; ?>`)" id="monan_<?php echo $monan->id_mon_an; ?>"  class="col "
                                         data-iq-gsap="onStart"
                                         data-iq-opacity="0"
                                         data-iq-position-y="-40"
                                         data-iq-duration=".6"
                                         data-iq-delay=".6"
                                         data-iq-trigger="scroll"
                                         data-iq-ease="none"
                                    >
                                        <div class="card card-white dish-card profile-img mb-0">
                                            <div class="profile-img21">
                                                <img src="public/assets/images/layouts/<?php echo $monan->hinh_anh;?>" class="img-fluid rounded-pill avatar-170 blur-shadow position-bottom"
                                                     alt="profile-image">
                                                <img src="public/assets/images/layouts/<?php echo $monan->hinh_anh;?>" class="img-fluid rounded-pill avatar-170 hover-image " alt="profile-image"
                                                     data-iq-gsap="onStart"
                                                     data-iq-opacity="0"
                                                     data-iq-scale=".6"
                                                     data-iq-rotate="180"
                                                     data-iq-duration="1"
                                                     data-iq-delay=".6"
                                                     data-iq-trigger="scroll"
                                                     data-iq-ease="none"
                                                >
                                            </div>
                                            <div class="card-body menu-image">
                                                <h6 class="heading-title fw-bolder mt-4 mb-0"><?php echo $monan->ten_mon_an; ?></h6>
                                                <div class="card-rating stars-ratings">

                                                    <svg width="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M27.2035 11.1678C27.127 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.762 2.62662C15.5654 2.49904 15.336 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.449 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.7537 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.726 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.632 25.7104 23.6393 25.456 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z" fill="currentColor"/>
                                                    </svg>

                                                    <svg width="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M27.2035 11.1678C27.127 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.762 2.62662C15.5654 2.49904 15.336 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.449 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.7537 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.726 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.632 25.7104 23.6393 25.456 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z" fill="currentColor"/>
                                                    </svg>

                                                    <svg width="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M27.2035 11.1678C27.127 10.9426 26.9862 10.7446 26.7985 10.5985C26.6109 10.4523 26.3845 10.3643 26.1474 10.3453L19.2112 9.79418L16.2097 3.14996C16.1141 2.93597 15.9586 2.75421 15.762 2.62662C15.5654 2.49904 15.336 2.43108 15.1017 2.43095C14.8673 2.43083 14.6379 2.49853 14.4411 2.6259C14.2444 2.75327 14.0887 2.93486 13.9929 3.14875L10.9914 9.79418L4.05515 10.3453C3.82211 10.3638 3.59931 10.449 3.41343 10.5908C3.22754 10.7325 3.08643 10.9249 3.00699 11.1447C2.92754 11.3646 2.91311 11.6027 2.96544 11.8305C3.01776 12.0584 3.13462 12.2663 3.30204 12.4295L8.42785 17.4263L6.61502 25.2763C6.55997 25.5139 6.57762 25.7626 6.66566 25.99C6.7537 26.2175 6.90807 26.4132 7.10874 26.5519C7.30942 26.6905 7.54713 26.7656 7.79103 26.7675C8.03493 26.7693 8.27376 26.6978 8.47652 26.5623L15.1013 22.1458L21.726 26.5623C21.9333 26.6999 22.1777 26.7707 22.4264 26.7653C22.6751 26.7598 22.9161 26.6783 23.1171 26.5318C23.3182 26.3852 23.4695 26.1806 23.5507 25.9455C23.632 25.7104 23.6393 25.456 23.5717 25.2167L21.3464 17.43L26.8652 12.4635C27.2266 12.1375 27.3592 11.6289 27.2035 11.1678Z" fill="currentColor"/>
                                                    </svg>

                                                    <svg width="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.22826 17.4264L6.41543 25.2763C6.35929 25.514 6.37615 25.7631 6.46379 25.9911C6.55142 26.2191 6.70578 26.4153 6.90668 26.5542C7.10759 26.6931 7.34571 26.7682 7.58994 26.7696C7.83418 26.7711 8.07317 26.6988 8.27571 26.5623L14.9005 22.1458L21.5252 26.5623C21.7325 26.6999 21.9769 26.7708 22.2256 26.7653C22.4743 26.7599 22.7153 26.6784 22.9163 26.5318C23.1174 26.3853 23.2687 26.1807 23.3499 25.9456C23.4312 25.7105 23.4385 25.4561 23.3709 25.2167L21.1456 17.43L26.6644 12.4636C26.8412 12.3045 26.9674 12.097 27.0275 11.8668C27.0876 11.6367 27.0789 11.394 27.0025 11.1688C26.9261 10.9435 26.7854 10.7456 26.5977 10.5995C26.4101 10.4533 26.1837 10.3654 25.9466 10.3466L19.0104 9.79424L16.0088 3.15003C15.9131 2.93608 15.7576 2.75441 15.5609 2.62693C15.3642 2.49946 15.1348 2.43163 14.9005 2.43163C14.6661 2.43163 14.4367 2.49946 14.24 2.62693C14.0434 2.75441 13.8878 2.93608 13.7921 3.15003L10.7906 9.79424L3.85435 10.3454C3.6213 10.3639 3.39851 10.4491 3.21262 10.5908C3.02674 10.7326 2.88563 10.9249 2.80618 11.1448C2.72673 11.3646 2.71231 11.6027 2.76463 11.8306C2.81696 12.0584 2.93382 12.2664 3.10123 12.4295L8.22826 17.4264ZM11.6994 12.1631C11.9166 12.146 12.1251 12.0708 12.3032 11.9453C12.4813 11.8199 12.6224 11.6488 12.7117 11.4501L14.9005 6.60658L17.0892 11.4501C17.1785 11.6488 17.3196 11.8199 17.4977 11.9453C17.6758 12.0708 17.8843 12.146 18.1015 12.1631L22.9341 12.5463L18.9544 16.1282C18.6089 16.4397 18.4714 16.919 18.5979 17.3668L20.1224 22.7019L15.5769 19.6711C15.3774 19.5372 15.1426 19.4657 14.9023 19.4657C14.662 19.4657 14.4272 19.5372 14.2276 19.6711L9.47778 22.8381L10.7553 17.3072C10.8021 17.1037 10.7958 16.8917 10.737 16.6914C10.6782 16.4911 10.5689 16.3093 10.4195 16.1635L6.72325 12.5597L11.6994 12.1631Z" fill="currentColor"/>
                                                    </svg>

                                                    <svg width="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.22826 17.4264L6.41543 25.2763C6.35929 25.514 6.37615 25.7631 6.46379 25.9911C6.55142 26.2191 6.70578 26.4153 6.90668 26.5542C7.10759 26.6931 7.34571 26.7682 7.58994 26.7696C7.83418 26.7711 8.07317 26.6988 8.27571 26.5623L14.9005 22.1458L21.5252 26.5623C21.7325 26.6999 21.9769 26.7708 22.2256 26.7653C22.4743 26.7599 22.7153 26.6784 22.9163 26.5318C23.1174 26.3853 23.2687 26.1807 23.3499 25.9456C23.4312 25.7105 23.4385 25.4561 23.3709 25.2167L21.1456 17.43L26.6644 12.4636C26.8412 12.3045 26.9674 12.097 27.0275 11.8668C27.0876 11.6367 27.0789 11.394 27.0025 11.1688C26.9261 10.9435 26.7854 10.7456 26.5977 10.5995C26.4101 10.4533 26.1837 10.3654 25.9466 10.3466L19.0104 9.79424L16.0088 3.15003C15.9131 2.93608 15.7576 2.75441 15.5609 2.62693C15.3642 2.49946 15.1348 2.43163 14.9005 2.43163C14.6661 2.43163 14.4367 2.49946 14.24 2.62693C14.0434 2.75441 13.8878 2.93608 13.7921 3.15003L10.7906 9.79424L3.85435 10.3454C3.6213 10.3639 3.39851 10.4491 3.21262 10.5908C3.02674 10.7326 2.88563 10.9249 2.80618 11.1448C2.72673 11.3646 2.71231 11.6027 2.76463 11.8306C2.81696 12.0584 2.93382 12.2664 3.10123 12.4295L8.22826 17.4264ZM11.6994 12.1631C11.9166 12.146 12.1251 12.0708 12.3032 11.9453C12.4813 11.8199 12.6224 11.6488 12.7117 11.4501L14.9005 6.60658L17.0892 11.4501C17.1785 11.6488 17.3196 11.8199 17.4977 11.9453C17.6758 12.0708 17.8843 12.146 18.1015 12.1631L22.9341 12.5463L18.9544 16.1282C18.6089 16.4397 18.4714 16.919 18.5979 17.3668L20.1224 22.7019L15.5769 19.6711C15.3774 19.5372 15.1426 19.4657 14.9023 19.4657C14.662 19.4657 14.4272 19.5372 14.2276 19.6711L9.47778 22.8381L10.7553 17.3072C10.8021 17.1037 10.7958 16.8917 10.737 16.6914C10.6782 16.4911 10.5689 16.3093 10.4195 16.1635L6.72325 12.5597L11.6994 12.1631Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <div class="d-flex align-items-center">
                                                        <span class="text-primary fw-bolder me-2"><?php echo $monan->gia_tien; ?>></span>
                                                        <small class="text-decoration-line-through">$8.49</small>
                                                    </div>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect class="circle-1" width="24" height="24" rx="12" fill="currentColor"/>
                                                        <rect class="circle-2" x="11.168" y="7" width="1.66667" height="10" rx="0.833333" fill="currentColor"/>
                                                        <rect class="circle-3" x="7" y="12.834" width="1.66666" height="10" rx="0.833332" transform="rotate(-90 7 12.834)" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>                  </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mt-5">
                <div class="row">

                    <div class="col-md-12 col-lg-12">
                        <div class="card"
                             data-iq-gsap="onStart"
                             data-iq-opacity="0"
                             data-iq-position-y="-40"
                             data-iq-duration=".6"
                             data-iq-delay="1.2"
                             data-iq-trigger="scroll"
                             data-iq-ease="none"
                        >
                            <div style="display: flex; justify-content: space-around" class="card-header">
                                <div class="text-center mt-5">
                                    <a  onclick="show('gio_hang','lich_su_goi_mon')"   type="button"  class="gio_hang btn btn-primary rounded-pill">Giỏ hàng</a>
                                    <a      style="margin-left: 3rem; color: black; background-color: white" type="button"  class="lich_su_goi_mon btn btn-primary rounded-pill">Lịch sử gọi món</a>
                                </div>

                            </div>
                            <div id="gio_hang" class="card-body">

                                    <?php
                                    if(isset($_SESSION['mieu_ta'])){
                                        $this->fetch_data();
                                    }
                                    ?>
<!--                                    Ajax xử lí phần xóa món ăn-->
                                    <script>
                                        function deleteCart(id){
                                            $.ajax({
                                                type: 'post',
                                                url:'controllers/c_monan.php',
                                                data:{
                                                    id_xoa:id
                                                },
                                                success:function (respon){
                                                    $('#gio_hang').html(respon);
                                                }
                                            })
                                        }
                                    </script>

<!--                                Đoạn script xử lí phần đã lên món-->
                                <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
                                <script>
                                    // Enable pusher logging - don't include this in production
                                    Pusher.logToConsole = true;

                                    var pusher = new Pusher('4e07d084fadbca3b217a', {
                                        cluster: 'ap1'
                                    });

                                    var channel = pusher.subscribe('restaurant_MVC');
                                    channel.bind('da_len_mon', function(data) {
                                        let color=data.da_len_mon<data.so_luong?'red':'green';
                                        $(`#lenmon_${data.id_ct_don_hang}`).css("color",color)
                                        $(`#lenmon_${data.id_ct_don_hang}`).html(`Đã lên món X ${data.da_len_mon}`)
                                    });
                                </script>
                                <div class="text-center mt-5">
                                    <a onclick="dat_hang()" type="button" href="#" class="btn btn-primary rounded-pill">Gọi món</a>

                                    <script>
                                        function dat_hang(){
                                            $.ajax({
                                                type:'post',
                                                url:'ct_don_hang.php',
                                                data:{
                                                    id_dat_mon:x,
                                                    dat_mon:"dat_mon"
                                                },
                                                success:function(response) {
                                                    if(response==1){
                                                        alert("Bạn không thế gọi món vì chưa chọn món nào cả")
                                                    }
                                                    else if(response==2){
                                                        alert("Bạn đã thanh toán nên không thể gọi món");
                                                    }
                                                    else{
                                                        alert("Bạn đã gọi món thành công");
                                                        $('#gio_hang').html(response);
                                                    }
                                                }
                                            })
                                        }
                                        function show(var1,var2){
                                            document.querySelector(`.${var1}`).style.color='white';
                                            document.querySelector(`.${var1}`).style.backgroundColor='#EA6A12';
                                            document.querySelector(`.${var2}`).style.color='black';
                                            document.querySelector(`.${var2}`).style.backgroundColor='white';
                                            document.querySelector(`#${var1}`).style.display='block';
                                            document.querySelector(`#${var2}`).style.display='none';
                                        }
                                        document.querySelector('.lich_su_goi_mon').onclick=function (){
                                            show('lich_su_goi_mon','gio_hang')
                                            $.ajax({
                                                type:'post',
                                                url:'ct_don_hang.php',
                                                data:{
                                                    orderHistory:'showHistory',
                                                    id_dat_mon:x
                                                },
                                                success:function(response) {
                                                    $('#lich_su_goi_mon').html(response)
                                                }
                                            })
                                        }


                                    </script>
                                    <span style="margin-left: 4rem" class="text-primary fw-bolder me-2">$<?php echo $_SESSION['tien_an']; ?></span>
                                </div>
                            </div>
                            <div style="display: none" id="lich_su_goi_mon">
                                <?php
                                include_once 'models/m_monan.php';
                                include_once 'models/m_ct_don_hang.php';
                                $m_ct_don_hang=new m_ct_don_hang();
                                $ct_don_hang=$m_ct_don_hang->read_ct_don_hang_by_id_datmon($_GET['id_dat_mon']);
                                if(!empty($ct_don_hang)){
                                    //Nếu mảng chi tiết đơn hàng được đọc bởi id_dat_mon mà rỗng thì sẽ không thực hiện in ra,vì khi đó nó sẽ không có lần gọi món, thì no
                                    //in ra thông báo là warning nếu làm như vậy
                                    $lan_goi_mon=end($ct_don_hang)->lan_goi_mon;
                                    $tong_tien=0;

                                    for($i=1;$i<=$lan_goi_mon;$i++){
                                        echo '<br>';
                                        echo 'Lần gọi món '.$i;
                                        echo '<br>';
                                        $chi_tiet_don_hang=$m_ct_don_hang->read_ct_don_hang_by_lan_goi_mon_and_id_datmon($i,$_GET['id_dat_mon']);
                                        $string='';
                                        foreach ($chi_tiet_don_hang as $value){
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
                                            <span  id="lenmon_'.$value->id_ct_don_hang.'"  class="mb-1" style="color: '.$color.'">Đã lên món X '.$value->da_len_mon.'</span>
                                        </div>
                                    </div>
                                </div>';
                                        }
                                        echo $string;
                                    }
                                    echo '<br><br> Tổng tiền phải thanh toán cho bữa ăn là :'.$tong_tien;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section Start -->
    <footer class="footer">
        <div class="footer-body">
            <ul class="left-panel list-inline mb-0 p-0">
                <li class="list-inline-item"><a href="extra/privacy-policy.html">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="extra/terms-of-service.html">Terms of Use</a></li>
            </ul>
            <div class="right-panel">
                ©<script>document.write(new Date().getFullYear())</script> Aprycot, Made with
                <span class="text-gray">
                      <svg width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z" fill="currentColor"></path>
                      </svg>
                  </span> by <a href="https://iqonic.design/">IQONIC Design</a>.
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->    </main>