
<div style="margin-left: 30%"  class="col-sm-12 col-lg-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Sửa bàn</h4>
            </div>
        </div>
        <form enctype="multipart/form-data" method="post" class="card-body">
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Tên bàn</label>
                <input name="name" type="text" class="form-control" id="exampleInputReadonly" value="<?php echo $ban_detail-> ten_ban; ?>" placeholder="Nhập tên bàn">
            </div>
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly" >Số chỗ ngồi</label>
                <input name="sochongoi" type="number" class="form-control" id="exampleInputReadonly" value="<?php echo $ban_detail->so_cho_ngoi; ?>"  placeholder="Nhập số chỗ ngồi">
            </div>
            <button type="submit" class="btn btn-primary rounded" name="submit">Sửa bàn</button>
            <button type="submit" class="btn btn-primary rounded" name="cancle">Danh sách bàn</button>
        </form>
    </div>
</div>
