<?php
session_start();
//session_destroy();
$_SESSION['tien_an']=0;
$_SESSION['order-history']=[];
class c_monan{
    public function index(){
        require 'models/m_danhmuc.php';
        $m_danhmuc=new m_danhmuc();
        $danhmucs=$m_danhmuc->read_danh_muc();
        $monans=$this->read_monan_by_id_danhmuc();
        $view='views/menu/v_monan.php';
        include 'templates/layout.php';
    }

    public function read_monan_by_id_danhmuc(){
        require "models/m_monan.php";
        $m_monan=new m_monan();
        if(isset($_POST['index'])){
            return $m_monan->read_monan_by_id_danhmuc($_POST['index']);
        }
        else{
            $m_monan=new m_monan();
            return  $m_monan->read_mon_an();
        }
    }

    public function read_monan_by_id_danh_muc(){
        if(isset($_POST['id_danhmuc'])){
            include_once "../models/m_monan.php";
            $m_monan=new m_monan();
            $id=explode("_",$_POST['id_danhmuc'])[1];
            $_SESSION['id_danh_muc']=$id;
            $monans=$m_monan->read_monan_by_id_danhmuc($id);
            foreach ($monans as $monan){
                $string='<div  id="monan_'. $monan->id_mon_an .'" onclick="addCart(`monan_'. $monan->id_mon_an .'`)"  class="col "
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
                                                <img src="public/assets/images/layouts/'. $monan->hinh_anh .'" class="img-fluid rounded-pill avatar-170 blur-shadow position-bottom"
                                                     alt="profile-image">
                                                <img src="public/assets/images/layouts/'. $monan->hinh_anh .'" class="img-fluid rounded-pill avatar-170 hover-image " alt="profile-image"
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
                                                <h6 class="heading-title fw-bolder mt-4 mb-0">'.$monan->ten_mon_an.'</h6>
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
                                                        <span class="text-primary fw-bolder me-2">'. $monan->gia_tien .'</span>
                                                        <small class="text-decoration-line-through">$8.49</small>
                                                    </div>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect class="circle-1" width="24" height="24" rx="12" fill="currentColor"/>
                                                        <rect class="circle-2" x="11.168" y="7" width="1.66667" height="10" rx="0.833333" fill="currentColor"/>
                                                        <rect class="circle-3" x="7" y="12.834" width="1.66666" height="10" rx="0.833332" transform="rotate(-90 7 12.834)" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>                  </div>';
                echo $string;
            }
        }
    }


    public function add_to_cart(){
        if(isset($_POST['id_them'])){
            include_once "../models/m_monan.php";
            $m_monan=new m_monan();
            $id=explode("_",$_POST['id_them'])[1];
            $monan=$m_monan->read_monan_by_id($id);
            $_SESSION['ten_mon_an'][]=$monan->ten_mon_an;
            $_SESSION['hinh_anh'][]=$monan->hinh_anh;
            $_SESSION['gia_tien'][]=$monan->gia_tien;
            $_SESSION['id_mon_an'][]=$monan->id_mon_an;


            $this->fetch_data();
            $this->bill();


        }
    }

    public function fetch_data(){

        $array=[];
        $_SESSION['mieu_ta'] =[]; //Dung de luu mon an
        foreach ($_SESSION['ten_mon_an'] as $i =>$value){
            $_SESSION['tien_an']+=$_SESSION['gia_tien'][$i];
            $array[]=$_SESSION['ten_mon_an'][$i];
            $so_luong=array_count_values($array)[$_SESSION['ten_mon_an'][$i]];
            $_SESSION['mieu_ta'][$_SESSION['ten_mon_an'][$i]]=$so_luong.'+'.$_SESSION['hinh_anh'][$i].'+'.$_SESSION['gia_tien'][$i].'+'.$_SESSION['id_mon_an'][$i];
        }
        $mieu_ta=$_SESSION['mieu_ta'];
        foreach($mieu_ta as $key => $value){
            $mieu_ta_mon_an=explode("+",$value); //mang : 0:so luong, 1:hinh anh ,2: gia tien ,3 :id_mon_an ,key :ten mon an
            $string='                                <div id="monan_'.$mieu_ta_mon_an[3].'" class="rounded-pill bg-soft-primary iq-my-cart">
                                    <div class="d-flex align-items-center justify-content-between profile-img4">
                                        <div class="profile-img11">
                                            <img src="public/assets/images/layouts/'.$mieu_ta_mon_an[1].'" class="img-fluid rounded-pill avatar-115 blur-shadow position-end" alt="img">
                                            <img src="public/assets/images/layouts/'.$mieu_ta_mon_an[1].'" class="img-fluid rounded-pill avatar-115"  alt="img"
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
                                                <h6 class="mb-1 heading-title fw-bolder">'.$key.'</h6>
                                                <span class="d-flex align-items-center "><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="0.875" y="2.05469" width="1.66667" height="10" rx="0.833333" transform="rotate(-45 0.875 2.05469)" fill="#EA6A12"/>
                                 <rect x="2.05469" y="9.125" width="1.66666" height="10" rx="0.833332" transform="rotate(-135 2.05469 9.125)" fill="#EA6A12"/>
                                 </svg><small class="text-dark ms-1">'.$mieu_ta_mon_an[0].'</small>
                              </span>
                                            </div>
                                        </div>
                                        <div class="me-4 text-end">
                           <span onclick="deleteCart(`monan_'. $mieu_ta_mon_an[3] .'`)" class="mb-1">
                              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.4" d="M19.6449 9.48924C19.6449 9.55724 19.112 16.298 18.8076 19.1349C18.6169 20.8758 17.4946 21.9318 15.8111 21.9618C14.5176 21.9908 13.2514 22.0008 12.0055 22.0008C10.6829 22.0008 9.38936 21.9908 8.1338 21.9618C6.50672 21.9228 5.38342 20.8458 5.20253 19.1349C4.88936 16.288 4.36613 9.55724 4.35641 9.48924C4.34668 9.28425 4.41281 9.08925 4.54703 8.93126C4.67929 8.78526 4.86991 8.69727 5.07026 8.69727H18.9408C19.1402 8.69727 19.3211 8.78526 19.464 8.93126C19.5973 9.08925 19.6644 9.28425 19.6449 9.48924" fill="#E60A0A"/>
                              <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="#E60A0A"/>
                              </svg>
                           </span>
                                            <p class="mb-0 text-dark">$'.$mieu_ta_mon_an[2].'</p>
                                        </div>
                                    </div>
                                </div>';

            echo $string;
        }
    }
    public function bill(){
        echo '                                <div class="text-center mt-5">
                                    <a onclick="dat_hang()" type="button" href="#" class="btn btn-primary rounded-pill">Gọi món</a>
                                    <span style="margin-left: 4rem" class="text-primary fw-bolder me-2">$'.$_SESSION['tien_an'].'</span>
                                </div>';
    }

    public function delete_cart(){
        if(isset($_POST['id_xoa'])){
            include_once "../models/m_monan.php";
            $m_monan=new m_monan();
            $id=explode("_",$_POST['id_xoa'])[1];
            $_SESSION['id_xoa']=$id;
            $monan=$m_monan->read_monan_by_id($id);
            $ten_mon_an=$monan->ten_mon_an;
            $keys=array_keys($_SESSION['ten_mon_an'],$ten_mon_an);
            $key=end($keys);
            unset($_SESSION['ten_mon_an'][$key]);
            unset($_SESSION['hinh_anh'][$key]);
            unset($_SESSION['gia_tien'][$key]);
            unset($_SESSION['id_mon_an'][$key]);

            $this->fetch_data();
            $this->bill();

        }
    }
}
$c_monan=new c_monan();
$c_monan->read_monan_by_id_danh_muc();
$c_monan->add_to_cart();
$c_monan->delete_cart();




