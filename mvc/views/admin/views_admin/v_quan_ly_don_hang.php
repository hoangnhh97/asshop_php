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
                    <p>
                        <a href="<?php echo $root; ?>/Admin/QuanLyDonHang/Them" class="btn btn-primary"><i class="fa fa-plus-square"></i> Thêm mới</a>
                    </p>
                    <table class="table table-striped table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ngày giao hàng</th>
                                <th>Tình trạng</th>
                                <th>Phương thức thanh toán</th>
                                <th>Ghi chú</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $row = $data["orders"];
                                $index = 1;
                                foreach($row as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $index; ?></td>
                                    <td><?php Common::checkEmptyStr($item["full_name"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["order_email"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["order_phone"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["order_address"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["shipping_date"]); ?></td>
                                    <td>
                                        <?php if($item["shipping_status"] == 0) { 
                                            echo 'Đang xử lý';
                                        } else if($item["shipping_status"] == 1) {
                                            echo 'Đơn hàng đã giao cho shipper';
                                        } else if($item["shipping_status"] == 2) {
                                            echo 'Đơn hàng đang được vận chuyển';
                                        } else if($item["shipping_status"] == 3) {
                                            echo 'Đơn hàng hoàn tất';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if($item["payment_method"] == 0) { 
                                            echo 'Thanh toán ngân hàng';
                                        } else if($item["payment_method"] == 1) {
                                            
                                            echo 'Thanh toán tiền mặt';
                                        } ?>
                                    </td>
                                    <td><?php Common::checkEmptyStr($item["order_notes"]); ?></td>
                                    <td>
                                        <a href="<?php echo $root; ?>/Admin/QuanLyDonHang/Sua/<?php echo $item["order_id"]; ?>" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                        <!-- <a href="<?php echo $root; ?>/Admin/QuanLyDonHang/ChiTiet/<?php echo $item["order_id"]; ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a> -->
                                        <a href="javascript:;" class="btnDelete btn btn-danger" data-toggle="modal" data-target="#deleteData" data-id="<?php echo $item["order_id"] ?>"><i class="fa fa-trash-alt"></i></a>
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
                    <h3>Cập nhật đơn hàng</h3>
                </div>
                <div class="card-body">
                    <?php 
                        $values = $data["singleOrder"];
                    ?>
                    <form action="<?php echo $root; ?>/Admin/QuanLyDonHang/Sua/<?php echo $values["order_id"]; ?>" method="post" id="create-new-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Họ tên" value="<?php echo $values["full_name"]; ?>" name="txtName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" placeholder="Email" value="<?php echo $values["order_email"]; ?>" name="txtEmail" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Số điện thoại" value="<?php echo $values["order_phone"]; ?>" name="txtPhone" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input placeholder="Địa chỉ" name="txtAddress" value="<?php echo $values["order_address"]; ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Ngày giao hàng" value="<?php echo $values["shipping_date"]; ?>" name="txtShippingDate" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <?php 
                                    $select1 = "";
                                    $select2 = "";
                                    $select3 = "";
                                    $select4 = "";

                                    if($values["shipping_status"] == 0) {
                                        $select1="selected";
                                    } else if($values["shipping_status"] == 1) {
                                        $select2="selected";
                                    }else if($values["shipping_status"] == 2) {
                                        $select3="selected";
                                    }else if($values["shipping_status"] == 3) {
                                        $select4="selected";
                                    }

                                ?>
                                <select name="ddlStatus" class="form-control">
                                    <option>--Chọn tình trạng--</option>
                                    <option value="0" <?php echo $select1; ?>>Đang xử lý</option>
                                    <option value="1" <?php echo $select2; ?>>Đơn hàng đã giao cho shipper</option>
                                    <option value="2" <?php echo $select3; ?>>Đơn hàng đang được vận chuyển</option>
                                    <option value="3" <?php echo $select4; ?>>Đơn hàng đã hoàn tất</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6"><?php 
                                    $select1 = "";
                                    $select2 = "";

                                    if($values["payment_method"] == 0) {
                                        $select1="selected";
                                    } else if($values["payment_method"] == 1) {
                                        $select2="selected";
                                    }

                                ?>
                                <select name="ddlPaymentMethod" class="form-control">
                                    <option>--Chọn phương thức thanh toán--</option>
                                    <option value="0" <?php echo $select1; ?>>Chuyển khoản ngân hàng</option>
                                    <option value="1" <?php echo $select2; ?>>Thanh toán tiền mặt</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea type="text" placeholder="Ghi chú" name="txtNotes" class="form-control" id="summernote"><?php echo $values["order_notes"]; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSua" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLyDonHang">Trở về</a>
                </div>
            </div>
            <?php } else if($data["action"] == 1) { ?>
            <div class="card">
                <div class="card-header">
                    <h3>Thêm đơn hàng</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo $root; ?>/Admin/QuanLyDonHang/Them" method="post" id="create-new-form">
                    <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Họ tên" name="txtName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" placeholder="Email" name="txtEmail" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Số điện thoại" name="txtPhone" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input placeholder="Địa chỉ" name="txtAddress" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Ngày giao hàng" name="txtShippingDate" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="ddlStatus" class="form-control">
                                    <option>--Chọn tình trạng--</option>
                                    <option value="0">Đang xử lý</option>
                                    <option value="1">Đơn hàng đã giao cho shipper</option>
                                    <option value="2">Đơn hàng đang được vận chuyển</option>
                                    <option value="3">Đơn hàng đã hoàn tất</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="ddlPaymentMethod" class="form-control">
                                    <option>--Chọn phương thức thanh toán--</option>
                                    <option value="0">Chuyển khoản ngân hàng</option>
                                    <option value="1">Thanh toán tiền mặt</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea type="text" placeholder="Ghi chú" name="txtNotes" class="form-control" id="summernote"></textarea>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnThem" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLyDonHang">Trở về</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php 
    
    include_once("./mvc/views/admin/shared_admin/v_footer.php");
?>  