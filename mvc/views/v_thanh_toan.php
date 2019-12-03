<?php 
    include_once("./mvc/views/shared/v_header.php");
?>
<section id="order-detail" class="pt-5 pb-5">
    
    <div class="container">
        <h3>Giỏ hàng</h3>
        <hr>    
        <form action="<?php echo Common::template_directory(); ?>/ThanhToan/Index" method="post">
           
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Thông tin đặt hàng</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="txtFirstName" placeholder="Tên (*)" class="form-control"/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="txtFirstName" placeholder="Họ (*)" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="txtEmail" placeholder="Địa chỉ email (*)" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="txtAddress" placeholder="Địa chỉ (*)" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="txtCity" placeholder="Huyện/Thành phố (*)" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="" placeholder="Đất nước (Tùy chọn)" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="txtPhoneNumber" placeholder="Số điện thoại (*)" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="txtNote" placeholder="Ghi chú (Tùy chọn)" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="txtUserId" value="<?php Common::checkEmptyStr($_SESSION["userid"]); ?>" class="form-control"/>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Thông tin thanh toán</h4>
                        </div>
                        <div class="card-body">
                            
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <td>Sản phẩm</td>
                                        <td>Tổng tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(isset($_COOKIE["_product_in_cart"]))
                                        {
                                            $total = 0;
                                            $cookie_data = stripslashes($_COOKIE['_product_in_cart']);
                                            $cart_data = json_decode($cookie_data, true);
                                            $index = 0;
                                            foreach($cart_data as $keys => $values) {
                                                $total += ($values["item_price"] * $values["item_quantity"]);
                                                $subtotal = $values["item_price"] * $values["item_quantity"];
                                    ?>
                                        <tr>
                                        
                                            <td><?php echo $values["item_name"] . ' x ' . '<span class="badge badge-primary">'. $values["item_quantity"] .'</span>'; ?></td>
                                            <td><?php echo number_format($subtotal); ?> <span>₫</span></td>
                                        </tr>
                                    <?php 
                                                $index++;
                                            }
                                        }
                                    ?>
                                    <tr>
                                        <td>Tổng tiền</td>
                                        <td><?php echo number_format($total); ?> <span>₫</span></td>
                                    </tr>
                                    <tr>
                                        <td>Phí vận chuyển</td>
                                        <td>30,000 <span>₫</span></td>
                                    </tr>
                                    <tr>
                                        <td>Thành tiền</td>
                                        <td><?php echo number_format($total + 30000); ?> <span>₫</span></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <hr/>
                            
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <input type="radio" name="rdPaymentMethod" id="rdPaymentBank" checked data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" />
                                        <label for="rdPaymentBank">Thanh toán qua ngân hàng</label>
                                    </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. 
                                        Vui lòng ghi ID đơn hàng của bạn vào nội dung chuyển khoản. 
                                        Đơn hàng của bạn sẽ không được giao cho đến khi tiền đã nhận được trong tài khoản của chúng tôi.
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <input type="radio" name="rdPaymentMethod" id="rdPaymentDelevery" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <label for="rdPaymentDelevery">Thanh toán khi giao hàng</label>
                                    
                                    </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        Thanh toán bằng tiền mặt khi giao hàng
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<?php 
    include_once("./mvc/views/shared/v_footer.php");
?>