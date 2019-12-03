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
                    <h3>Danh sách đơn hàng</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $row = $data["orderdetails"];
                                $index = 1;
                                foreach($row as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $index; ?></td>
                                    <td><?php Common::checkEmptyStr($item["order_id"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["name"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["quantity"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["total"]); ?></td>
                                    <td>
                                        <a href="<?php echo $root; ?>/Admin/QuanLyChiTietDonHang/Sua/<?php echo $item["order_detail_id"]; ?>" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="javascript:;" class="btnDelete btn btn-danger" data-toggle="modal" data-target="#deleteData" data-id="<?php echo $item["order_detail_id"] ?>"><i class="fa fa-trash-alt"></i></a>
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
                    <h3>Cập nhật chi tiết đơn hàng</h3>
                </div>
                <div class="card-body">
                    <?php 
                        $data_od = $data["singleOrderDetail"];
                    ?>
                    <form action="<?php echo $root; ?>/Admin/QuanLyChiTietDonHang/Sua/<?php echo $data_od["order_detail_id"]; ?>" method="post" id="create-new-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <?php 
                                    $order_id = $data_od["order_id"];
                                    $row = $data["orders"];
                                ?>
                                <select name="ddlOrder" class="form-control">
                                    <option>--Chọn đơn hàng--</option>
                                    <?php foreach($row as $values) { ?>
                                        
                                        <option value="<?php Common::checkEmptyStr($values["order_id"]) ?>" <?php echo $values["order_id"]==$order_id?"selected":""; ?>>Đơn hàng #<?php Common::checkEmptyStr($values["order_id"]) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <?php 
                                    $product_id = $data_od["product_id"];
                                    $row = $data["products"];    
                                ?>
                                <select name="ddlProduct" class="form-control">
                                    <option>--Chọn sản phẩm--</option>
                                    <?php foreach($row as $values) { ?>
                                        <option value="<?php Common::checkEmptyStr($values["product_id"]) ?>" <?php echo $values["product_id"]==$product_id?"selected":""; ?>><?php Common::checkEmptyStr($values["name"]) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" placeholder="Số lượng" value="<?php echo !empty($data_od["quantity"])?$data_od["quantity"]:"1" ?>" name="txtQuantity" min="1" max="50" class="form-control"/>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSua" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLyChiTietDonHang">Trở về</a>
                </div>
            </div>
            <?php } ?>
    </div>
</section>

<?php 
    
    include_once("./mvc/views/admin/shared_admin/v_footer.php");
?>  