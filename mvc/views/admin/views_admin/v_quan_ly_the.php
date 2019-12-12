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
                    <h3>Danh sách Thẻ</h3>
                </div>
                <div class="card-body">
                    <p>
                        <a href="<?php echo $root; ?>/Admin/QuanLyThe/Them" class="btn btn-primary"><i class="fa fa-plus-square"></i> Thêm mới</a>
                    </p>
                    <table class="table table-striped table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã thẻ</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $row = $data["tags"];
                                $index = 1;
                                foreach($row as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $index; ?></td>
                                    <td><?php Common::checkEmptyStr($item["tag_id"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["product_id"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["tag_name"]); ?></td>
                                    <td>
                                        <a href="<?php echo $root; ?>/Admin/QuanLyThe/Sua/<?php echo $item["tag_id"]; ?>" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                        <!-- <i href="" class="btn btn-warning"><i class="fa fa-eye"></i></a> -->
                                        <a href="javascript:;" class="btnDelete btn btn-danger" data-toggle="modal" data-target="#deleteData" data-id="<?php echo $item["tag_id"] ?>"><i class="fa fa-trash-alt"></i></a>
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
                    <h3>Cập nhật Thẻ</h3>
                </div>
                <div class="card-body">
                    <?php 
                        $values = $data["singleTag"];
                    ?>
                    <form action="<?php echo $root; ?>/Admin/QuanLyThe/Sua/<?php echo $values["tag_id"]; ?>" method="post" id="create-new-form" enctype="multipart/form-data">
                        <div class="row">
                            
                            <div class="form-group col-md-12">
                                <input type="text" placeholder="Mã sản phẩm" value="<?php echo $values["product_id"]; ?>" name="txtTagName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-12">
                                <?php 
                                    $pd = $data["products"];
                                ?>
                                <select class="form-control" name="ddlProduct">
                                    <option>--Chọn sản phẩm--</option>
                                    <?php foreach($pd as $item)  { ?>
                                        <option value="<?php echo $item["product_id"] ?>" <?php echo $values["product_id"]==$item["product_id"]?"selected":""; ?>><?php echo $item["name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" placeholder="Tên thẻ" value="<?php echo $values["tag_name"]; ?>" name="txtTagName" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSua" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLyThe">Trở về</a>
                </div>
            </div>
            <?php } else if($data["action"] == 1) { ?>
            <div class="card">
                <div class="card-header">
                    <h3>Thêm thẻ</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo $root; ?>/Admin/QuanLyThe/Them" method="post" id="create-new-form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" placeholder="Tên thẻ" name="txtTagName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-12">
                                <?php 
                                    $pd = $data["products"];
                                ?>
                                <select class="form-control" name="ddlProduct">
                                    <option>--Chọn sản phẩm--</option>
                                    <?php foreach($pd as $item)  { ?>
                                        <option value="<?php echo $item["product_id"] ?>"><?php echo $item["name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnThem" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLyThe">Trở về</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php 
    
    include_once("./mvc/views/admin/shared_admin/v_footer.php");
?>  