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
                        <a href="<?php echo $root; ?>/Admin/QuanLyNguoiDung/Them" class="btn btn-primary"><i class="fa fa-plus-square"></i> Thêm mới</a>
                    </p>
                    <table class="table table-striped table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Loại</th>
                                <th>Quyền</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $row = $data["listUser"];
                                $index = 1;
                                foreach($row as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $index; ?></td>
                                    <td><?php Common::checkEmptyStr($item["first_name"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["last_name"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["email"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["pass"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["user_address"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["phone_number"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["user_type"]); ?></td>
                                    <td><?php Common::checkEmptyStr($item["role_name"]); ?></td>
                                    <td>
                                        <a href="<?php echo $root; ?>/Admin/QuanLyNguoiDung/Sua/<?php echo $item["user_id"]; ?>" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                        <!-- <i href="" class="btn btn-warning"><i class="fa fa-eye"></i></a> -->
                                        <a href="javascript:;" class="btnDelete btn btn-danger" data-toggle="modal" data-target="#deleteData" data-id="<?php echo $item["user_id"] ?>"><i class="fa fa-trash-alt"></i></a>
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
                    <h3>Cập nhật người dùng</h3>
                </div>
                <div class="card-body">
                    <?php 
                        $values = $data["singleUser"];
                    ?>
                    <form action="<?php echo $root; ?>/Admin/QuanLyNguoiDung/Sua/<?php echo $data["userid"]; ?>" method="post" id="create-new-form">
                        <input type="hidden" value="<?php echo Common::checkEmptyStr($values["user_id"]); ?>"/>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Tên" name="txtFirstName" value="<?php echo Common::checkEmptyStr($values["first_name"]); ?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Họ" name="txtLastName" value="<?php echo Common::checkEmptyStr($values["last_name"]); ?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" placeholder="Email" readonly name="txtEmail" value="<?php echo Common::checkEmptyStr($values["email"]); ?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" placeholder="Mật khẩu" name="txtPass" value="<?php echo Common::checkEmptyStr($values["pass"]); ?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Địa chỉ" name="txtAddress" value="<?php echo Common::checkEmptyStr($values["user_address"]); ?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Số điện thoại" name="txtPhoneNumber" value="<?php echo Common::checkEmptyStr($values["phone_number"]); ?>" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <?php 
                                    $select = $values["user_type"];
                                    $selected1 = "";
                                    $selected2 = "";
                                    if($select == "1") {
                                        $selected1 = "selected";
                                    } else if($select == "2") {
                                        $selected2 = "selected";
                                    }
                                ?>
                                <select name="ddlType" class="form-control">
                                    <option value="">--Chọn loại--</option>
                                    <option value="1" <?php echo $selected1 ?>>1</option>
                                    <option value="2" <?php echo $selected2 ?>>2</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <?php 
                                    $row = $data["listRole"];
                                    $user_role = $values["role_id"];
                                ?>
                                <select name="ddlRole" class="form-control">
                                    <option value="">--Chọn quyền--</option>
                                    <?php foreach($row as $item) { ?>
                                        <option value="<?php echo $item["role_id"]; ?>" <?php echo $item["role_id"]==$user_role?"selected":""; ?>><?php echo $item["role_name"]; ?></option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSua" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $root; ?>/Admin/QuanLyNguoiDung">Trở về</a>
                </div>
            </div>
            <?php } else if($data["action"] == 1) { ?>
            <div class="card">
                <div class="card-header">
                    <h3>Thêm người dùng</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo $root; ?>/Admin/QuanLyNguoiDung/Them" method="post" id="create-new-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Họ" name="txtFirstName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Tên" name="txtLastName" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" placeholder="Email" name="txtEmail" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" placeholder="Mật khẩu" name="txtPass" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Địa chỉ" name="txtAddress" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" placeholder="Số điện thoại" name="txtPhoneNumber" class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="ddlType" class="form-control">
                                    <option value="">--Chọn loại--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <?php 
                                    $row = $data["listRole"];
                                ?>
                                <select name="ddlRole" class="form-control">
                                    <option value="">--Chọn quyền--</option>
                                    <?php foreach($row as $item) { ?>
                                        <option value="<?php echo $item["role_id"]; ?>"><?php echo $item["role_name"]; ?></option>    
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
                    <a href="<?php echo $root; ?>/Admin/QuanLyNguoiDung">Trở về</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php 
    
    include_once("./mvc/views/admin/shared_admin/v_footer.php");
?>  