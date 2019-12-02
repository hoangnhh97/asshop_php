<?php 
    $rool = Common::template_directory();
    include_once("./mvc/views/admin/shared_admin/v_header.php");
?>
<!-- BEGIN Modal Delete -->

<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="deleteData" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteDataModalTitle">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa dữ liệu đang chọn không?
      </div>
      <div class="modal-footer">
        <a href="" type="button" class="btnAcceptDelete btn btn-primary">Đồng ý</a>
        <a href="javascript:;" type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
        
      </div>
    </div>
  </div>
</div>
<!-- END Modal Delete -->
<section>
    <div class="container">
        <?php if($data["action"] == 0) { ?>
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách người dùng</h3>
                </div>
                <div class="card-body">
                    <p>
                        <a href="<?php echo $root; ?>/Admin/QuanLySanPham/Them" class="btn btn-primary"><i class="fa fa-plus-square"></i> Thêm mới</a>
                    </p>
                    <table class="table table-striped table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên SP</th>
                                <th>Giá</th>
                                <th>Giá Mới</th>
                                <th>Xuất xứ</th>
                                <th>Nhãn</th>
                                <th>Hình ảnh</th>
                                <th>Loại</th>
                                <th>Ngày tạo</th>
                                <th>Tình trạng</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $row = $data["products"];
                                $index = 1;
                                foreach($row as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $index; ?></td>
                                    <td><?php Common::checkEmptyStr($item["name"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["price"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["new_price"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["brand"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["model"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["image"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["type"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["created_at"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["status"]); ?></td>
                                    <td>
                                        <a href="<?php echo $root; ?>/Admin/QuanLySanPham/Sua/<?php echo $item["product_id"]; ?>" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                        <!-- <i href="" class="btn btn-warning"><i class="fa fa-eye"></i></a> -->
                                        <a href="javascript:;" class="btnDelete btn btn-danger" data-toggle="modal" data-target="#deleteData" data-id="<?php echo $item["product_id"] ?>"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $index++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else if($data["action"] == 2) { ?>
            <div class="card">
                <div class="card-header">
                    <h3>Cập nhật sản phẩm</h3>
                </div>
                <div class="card-body">
                    <?php 
                        $values = $data["singleProduct"];
                    ?>
                    <form action="<?php echo $root; ?>/Admin/QuanLySanPham/Sua/<?php echo $values["product_id"]; ?>" method="post" id="create-new-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" placeholder="Tên sản phẩm" value="<?php Common::checkEmptyStr($values["name"]); ?>" name="txtName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea type="text" placeholder="Mô tả" value="<?php Common::checkEmptyStr($values["description"]); ?>" name="txtDesc" id="summernote" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" placeholder="Giá" value="<?php Common::checkEmptyStr($values["price"]); ?>" name="txtPrice" min="0" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                            <input type="number" placeholder="Giá mới" <?php Common::checkEmptyStr($values["new_price"]); ?> name="txtNewPrice" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Nhãn hiệu" <?php Common::checkEmptyStr($values["brand"]); ?> name="txtBrand" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Xuất xứ" <?php Common::checkEmptyStr($values["model"]); ?> name="txtModel" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" name="hdImage" value="<?php Common::checkEmptyStr($values["image"]); ?>"/>
                                <input type="file" name="fUpload" class="form-control"/>
                                <img src="<?php echo Common::template_directory(); ?>/assets/images/products/<?php Common::checkEmptyStr($values["image"]); ?>" width="80" height="120"/>
                            </div>
                            <div class="form-group col-md-6">
                            <?php 
                                $select1 = ""; $select2 = ""; $select3=""; $select4="";
                                
                                switch($values["type"]) {
                                    case 1:
                                        $select1 = "selected";
                                        break;
                                    case 2:
                                        $select2 = "selected";
                                        break;
                                    case 3:
                                        $select3 = "selected";
                                        break;
                                    case 4:
                                        $select4 = "selected";
                                        break; 
                                }
                            ?>
                                <select name="ddlType" class="form-control">
                                    <option value="">--Chọn loại--</option>
                                    <option value="1" <?php echo $select1; ?>>Hot</option>
                                    <option value="2" <?php echo $select2; ?>>Khuyến mãi</option>
                                    <option value="3" <?php echo $select3; ?>>Tặng</option>
                                    <option value="4" <?php echo $select4; ?>>Freeship</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <?php 
                                    $row = $data["categories"];
                                    $rowById = $data["categorybyid"];
                                ?>
                                <input type="hidden" class="arrCategories" name="arrCategories" />
                                <select name="ddlCategories" class="form-control" id="select-multi" multiple data-live-search="true">
                                    <?php 
                                        foreach($row as $item) { 
                                            $checked = false;
                                            foreach($rowById as $itemById) { 
                                                if($item["category_id"]==$itemById["category_id"]) {
                                                    $checked = true;
                                                }
                                            }
                                    ?>
                                        <?php if($checked == true) {?>
                                            <option value="<?php echo $item["category_id"]; ?>" selected><?php echo $item["cate_name"]; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $item["category_id"]; ?>"><?php echo $item["cate_name"]; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                            <?php 
                                $select1 = ""; $select2 = "";
                                
                                switch($values["status"]) {
                                    case 1:
                                        $select1 = "selected";
                                        break;
                                    case 2:
                                        $select2 = "selected";
                                        break;
                                }
                            ?>
                                <select name="ddlStatus" class="form-control">
                                    <option value="">--Chọn tình trạng--</option>
                                    <option value="1" <?php echo $select1; ?>>Đang hoạt động</option>
                                    <option value="2" <?php echo $select2; ?>>Ngưng hoạt động</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea type="text" placeholder="Mô tả ngắn" name="txtShortDesc" class="form-control"><?php Common::checkEmptyStr($values["short_desc"]); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSua" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLySanPham">Trở về</a>
                </div>
            </div>
            <?php } else if($data["action"] == 1) { ?>
            <div class="card">
                <div class="card-header">
                    <h3>Thêm sản phẩm</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo $root; ?>/Admin/QuanLySanPham/Them" method="post" id="create-new-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" placeholder="Tên sản phẩm" name="txtName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea type="text" placeholder="Mô tả" name="txtDesc" id="summernote" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" placeholder="Giá" name="txtPrice" min="0" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                            <input type="number" placeholder="Giá mới" name="txtNewPrice" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Nhãn hiệu" name="txtBrand" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Xuất xứ" name="txtModel" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="file" name="fUpload" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="ddlType" class="form-control">
                                    <option value="">--Chọn loại--</option>
                                    <option value="1">Hot</option>
                                    <option value="2">Khuyến mãi</option>
                                    <option value="3">Tặng</option>
                                    <option value="4">Freeship</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <?php 
                                    $row = $data["categories"];
                                ?>
                                <input type="hidden" class="arrCategories" name="arrCategories" />
                                <select name="ddlCategories" class="form-control" id="select-multi" multiple data-live-search="true">
                                    <?php foreach($row as $item) { ?>
                                        <option value="<?php echo $item["category_id"]; ?>"><?php echo $item["cate_name"]; ?></option>    
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="ddlStatus" class="form-control">
                                    <option value="">--Chọn tình trạng--</option>
                                    <option value="1">Đang hoạt động</option>
                                    <option value="2">Ngưng hoạt động</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea type="text" placeholder="Mô tả ngắn" name="txtShortDesc" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnThem" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLySanPham">Trở về</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php 
    
    include_once("./mvc/views/admin/shared_admin/v_footer.php");
?>  