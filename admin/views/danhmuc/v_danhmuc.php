
<div style="margin-left: 30%"  class="col-sm-12 col-lg-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Thêm danh mục</h4>
            </div>
        </div>
        <form enctype="multipart/form-data" method="post" class="card-body">
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Tên danh mục</label>
                <input name="name" type="text" class="form-control" id="exampleInputReadonly"  value="<?php echo $ten; ?>" placeholder="Nhập tên của danh mục">
            </div>
            <div class="form-group">
                <label for="customFile" class="form-label custom-file-input">Chọn hình ảnh của danh mục</label>
                <input accept="image/*"  value="" name="image" class="form-control" type="file" id="customFile" onchange="previewImage()">
                <?php
                $path='../public/assets/images/layouts/';
                $hinh_anh=($hinh_anh=='')?' ':$path.$hinh_anh;
                ?>
                <img style="width: 100px" id="preview" src="<?php echo $hinh_anh; ?>">
            </div>

            <button type="submit" class="btn btn-primary rounded" name="submit">Thêm vào danh mục</button>
        </form>
    </div>
</div>
