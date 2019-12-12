<?php 
    include_once("./mvc/views/shared/v_header.php");
?>
<section id="order-detail" class="pt-5 pb-5">
    
    <div class="container">
        <h3>Theo dõi đơn hàng</h3>
        <hr>    
        <?php 
            $check_Order = $data["singleOrder"]; 
            if($check_Order == true) {
        ?>
            <div class="card mb-3">
                <div class="card-body">
                    <dl>
                        <dt>Đơn hàng:</dt>
                        <dd><span>#</span><?php echo $check_Order["order_id"]; ?></dd>
                        <dt>Tên người nhận:</dt>
                        <dd><?php echo $check_Order["full_name"]; ?></dd>
                        <dt>Email:</dt>
                        <dd><?php echo $check_Order["order_email"]; ?></dd>
                        <dt>Số điện thoại</dt>
                        <dd><?php echo $check_Order["order_phone"]; ?></dd>
                        <dt>Địa chỉ nhận hàng</dt>
                        <dd><?php echo $check_Order["order_address"]; ?></dd>
                        <dt>Thời gian dự kiến</dt>
                        <dd>
                            <?php echo $check_Order["shipping_date"]; ?>
                        </dd>
                        <dt>Tình trạng</dt>
                        <dd>
                            <?php if($check_Order["shipping_status"] == 0) { 
                                echo 'Đang xử lý';
                            } else if($check_Order["shipping_status"] == 1) {
                                echo 'Đơn hàng đã giao cho shipper';
                            } else if($check_Order["shipping_status"] == 2) {
                                echo 'Đơn hàng đang được vận chuyển';
                            } else if($check_Order["shipping_status"] == 3) {
                                echo 'Đơn hàng hoàn tất';
                            } ?>
                        </dd>
                        
                    </dl>     
                </div>
            </div>
        <?php } ?>
        <div class="container">
            <form action="" method="post">
                <div class="form-group m-auto bg-secondary p-5">
                    <div class="row">
                        <input type="text" class="form-control col-md-10" name="txtOrderId" placeholder="Nhập mã đơn hàng (VD: 17)"/>
                        <button type="submit" class="btn btn-warning col-md-2" name="btnPreviewOrder">Xem đơn hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<?php 
    include_once("./mvc/views/shared/v_footer.php");
?>