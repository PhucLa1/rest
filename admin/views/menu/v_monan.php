<?php include "v_danhmuc.php"; ?>
<div class="col-lg-6">
    <div class="card">
        <div style="display: flex" class="card-header ">
            <?php
            $danhmuc='';
            if(isset($_GET['id_danh_muc'])){
                $id=$_GET['id_danh_muc']-1;
                $danhmuc=$danhmucs[$id]->ten_danh_muc;
            }
            else{
                $danhmuc='Tất cả các món ăn';
            }
            ?>
            <h4 class="card-title list-main"><?php echo $danhmuc; ?></h4>
            <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="monan_add.php">
                                                            <span class="btn-inner">
                                                               <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                  <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                  <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                               </svg>
                                                            </span>
            </a>
        </div>
        <div class="card-body py-0">
            <ul class="list-inline chat-list-main1">
                <?php foreach ($monans as $monan){ ?>
                    <li class="py-5 border-bottom border-soft-primary">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="../public/assets/images/layouts/<?php echo $monan->hinh_anh; ?>" class="img-fluid avatar avatar-40" alt="profile-image">
                                <div class="d-flex justify-content-between ms-3">
                                    <div>
                                        <h6 class="mb-1 fw-bolder heading-title"><?php echo $monan->ten_mon_an; ?></h6>
                                        <small class="mb-0"><?php echo $monan->mo_ta; ?></small>
                                    </div>
                                    <div>
                                        <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="monan_add.php?id=<?php echo $monan->id_mon_an; ?>">
                                    <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                                        </a>
                                        <a class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="delete_monan.php?id=<?php echo $monan->id_mon_an; ?>">
                                    <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                          <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-end">
                                <small class="text-dark">$<?php echo $monan->gia_tien; ?></small>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-3">
    <div class="card" style="background: url('../public/assets/images/User-profile/02.png'); background-size: cover;">
        <div class="card-body">
            <div class="div">
                <div class="div">
                    <h2 class="text-primary text-special">Today’s<br> Special<br> Menu</h2>
                </div>
                <div class="text-center">
                    <div>
                        <img src="../public/assets/images/User-profile/5.png" class="img-fluid mt-5 w-75" alt="profile-image">
                    </div>
                    <button type="button" class="btn btn-primary rounded-pill mt-5">ORDER NOW!</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Special offer for you</h4>
            <div class="d-flex pt-3">
                <img src="../public/assets/images/layouts/1.png" class="img-fluid avatar-rounded avatar-100" alt="profile-image">
                <div class="d-flex justify-content-between ms-3 w-100">
                    <div>
                        <small class="text-dark fw-bolder heading-title">$7,99</small>
                        <h5 class="mt-4">Buy 1 Get 1 Free</h5>
                    </div>
                    <div>
                        <svg width="25" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.0902 13.864L23.0195 18.7932C23.41 19.1838 23.41 19.8169 23.0195 20.2075L18.0902 25.1367" stroke="#ADB5BD" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="19.5" cy="19.5" r="15.5" transform="rotate(-90 19.5 19.5)" stroke="#ADB5BD" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card iq-glass-card rounded border border-white">
        <div class="card-header bg-transparent d-flex justify-content-between">
            <h4 class="card-title list-main">Latest reviews</h4>
            <button type="button" class="btn btn-sm btn-primary rounded-pill ">View All </button>
        </div>
        <div class="card-body">
            <ul class="list-inline mb-0">
                <li class="pb-3  card rounded-1 mb-3 cusomer-card">
                    <div class="card-body px-2 py-2 menu-image">

                        <div class="d-flex">
                            <img src="../public/assets/images/layouts/1.png" class="img-fluid avatar-rounded avatar-40" alt="profile-image">
                            <div class="ms-2 w-100">
                                <div class="d-flex justify-content-between ">
                                    <h6 class="mb-1 heading-title fw-bolder">Jane Coper</h6>
                                    <small class="text-dark">1 Day ago</small>
                                </div>
                                <div class="d-flex mb-2">
                                    <div class="card-rating stars-ratings">

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

                                        <svg width="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.22826 17.4264L6.41543 25.2763C6.35929 25.514 6.37615 25.7631 6.46379 25.9911C6.55142 26.2191 6.70578 26.4153 6.90668 26.5542C7.10759 26.6931 7.34571 26.7682 7.58994 26.7696C7.83418 26.7711 8.07317 26.6988 8.27571 26.5623L14.9005 22.1458L21.5252 26.5623C21.7325 26.6999 21.9769 26.7708 22.2256 26.7653C22.4743 26.7599 22.7153 26.6784 22.9163 26.5318C23.1174 26.3853 23.2687 26.1807 23.3499 25.9456C23.4312 25.7105 23.4385 25.4561 23.3709 25.2167L21.1456 17.43L26.6644 12.4636C26.8412 12.3045 26.9674 12.097 27.0275 11.8668C27.0876 11.6367 27.0789 11.394 27.0025 11.1688C26.9261 10.9435 26.7854 10.7456 26.5977 10.5995C26.4101 10.4533 26.1837 10.3654 25.9466 10.3466L19.0104 9.79424L16.0088 3.15003C15.9131 2.93608 15.7576 2.75441 15.5609 2.62693C15.3642 2.49946 15.1348 2.43163 14.9005 2.43163C14.6661 2.43163 14.4367 2.49946 14.24 2.62693C14.0434 2.75441 13.8878 2.93608 13.7921 3.15003L10.7906 9.79424L3.85435 10.3454C3.6213 10.3639 3.39851 10.4491 3.21262 10.5908C3.02674 10.7326 2.88563 10.9249 2.80618 11.1448C2.72673 11.3646 2.71231 11.6027 2.76463 11.8306C2.81696 12.0584 2.93382 12.2664 3.10123 12.4295L8.22826 17.4264ZM11.6994 12.1631C11.9166 12.146 12.1251 12.0708 12.3032 11.9453C12.4813 11.8199 12.6224 11.6488 12.7117 11.4501L14.9005 6.60658L17.0892 11.4501C17.1785 11.6488 17.3196 11.8199 17.4977 11.9453C17.6758 12.0708 17.8843 12.146 18.1015 12.1631L22.9341 12.5463L18.9544 16.1282C18.6089 16.4397 18.4714 16.919 18.5979 17.3668L20.1224 22.7019L15.5769 19.6711C15.3774 19.5372 15.1426 19.4657 14.9023 19.4657C14.662 19.4657 14.4272 19.5372 14.2276 19.6711L9.47778 22.8381L10.7553 17.3072C10.8021 17.1037 10.7958 16.8917 10.737 16.6914C10.6782 16.4911 10.5689 16.3093 10.4195 16.1635L6.72325 12.5597L11.6994 12.1631Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                                <small class="text-dark">Nice place for having snacks.</small>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="py-3   card rounded-1 mb-3 cusomer-card">
                    <div class="card-body px-2 py-2 menu-image">

                        <div class="d-flex">
                            <img src="../public/assets/images/layouts/2.png" class="img-fluid avatar-rounded avatar-40" alt="profile-image">
                            <div class="ms-2 w-100">
                                <div class="d-flex justify-content-between ">
                                    <h6 class="mb-1 heading-title fw-bolder">Tom Potter</h6>
                                    <small class="text-dark">1 Day ago</small>
                                </div>
                                <div class="d-flex mb-2">
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
                                </div>
                                <small class="text-dark">NiceNice service and delicious food..</small>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="pt-3  pb-0  card rounded-1 cusomer-card mb-0">
                    <div class="card-body px-2 py-2 menu-image">

                        <div class="d-flex">
                            <img src="../public/assets/images/layouts/3.png" class="img-fluid avatar-rounded avatar-40" alt="profile-image">
                            <div class="ms-2 w-100">
                                <div class="d-flex justify-content-between ">
                                    <h6 class="mb-1 heading-title fw-bolder">Mira James</h6>
                                    <small class="text-dark">1 Day ago</small>
                                </div>
                                <div class="d-flex mb-2">
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
                                </div>
                                <small class="text-dark">Love the environment and food.</small>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>