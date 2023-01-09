
<div style="margin-left: 30%"  class="col-sm-12 col-lg-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Thêm món ăn</h4>
            </div>
        </div>
        <form enctype="multipart/form-data" method="post" class="card-body">
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Tên món ăn</label>
                <input name="ten_mon_an" type="text" class="form-control" id="exampleInputReadonly"  value="<?php echo $ten ?>" placeholder="Nhập tên của món ăn">
            </div>
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Giá tiền</label>
                <input name="gia_tien" type="text" class="form-control" id="exampleInputReadonly"  value="<?php echo $gia_tien ?>" placeholder="Nhập giá tiền của món ăn">
            </div>
            <div class="form-group">
                <label class="form-label" for="exampleFormControlSelect1">Chọn kiểu món ăn</label>
                <select  name="id_danh_muc" class="form-select" id="exampleFormControlSelect1">
                    <option value="0" selected="" disabled="">Chọn kiểu món ăn</option>
                    <?php foreach ($danhmucs as $danhmuc){?>
                    <option value="<?php echo $danhmuc->id_danh_muc?>"><?php echo $danhmuc->ten_danh_muc?></option>
                    <?php } ?>
                    <script>document.getElementById("exampleFormControlSelect1").selectedIndex = <?php echo $kieu_mon_an; ?>;</script>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="exampleFormControlTextarea1">Thêm mô tả về món ăn</label>
                <textarea name="mo_ta" class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $mo_ta ?></textarea>
            </div>
            <div class="form-group">
                <label for="customFile" class="form-label custom-file-input">Chọn hình ảnh của món ăn</label>
                <input name="image" class="form-control" type="file" id="customFile" accept="image/*" onchange="previewImage()">
                <?php
                $path='../public/assets/images/layouts/';
                $hinh_anh=($hinh_anh=='')?' ':$path.$hinh_anh;
                ?>
                <img style="width: 100px" id="preview" src="<?php echo $hinh_anh; ?>"></img>
            </div>

            <button name="submit" type="submit" class="btn btn-primary rounded">Submit</button>
        </form>
    </div>
</div>
</div>