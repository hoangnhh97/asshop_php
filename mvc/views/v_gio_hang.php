<?php 
    include_once("./mvc/views/shared/v_header.php");
?>
<section id="cart-detail" class="pt-5 pb-5">
    
    <div class="container">
        <h3>Giỏ hàng</h3>
        <hr>    
        <form action="<?php echo Common::template_directory(); ?>/GioHang/Update" method="post">
            <table class="table table-bordered table-hover table-dark" width="100%">
                <thead>
                    <tr>
                        <td width="5%">STT</td>
                        <td width="40%">Tên sản phẩm</td>
                        <td width="10%">Số lượng</td>
                        <td width="20%">Đơn giá</td>
                        <td width="15%">Tổng</td>
                        <td width="10%"></td>
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
                    ?>
                        <tr>
                            <td><?php echo $index+1; ?></td>
                            <td>
                                <a href="<?php echo Common::template_directory(); ?>/SanPham/<?php echo Common::generateSlug($values["item_name"]); ?>/<?php echo $values["item_id"]; ?>">
                                    <?php echo $values["item_name"]; ?>
                                </a>
                            </td>
                            <td><div class="quantity">
                                    <input type="number" name="list_item_quantity[]" value="<?php echo $values["item_quantity"]; ?>" min="1" max="50" step="1" value="1">
                                </div></td>
                            <td><?php echo $values["item_quantity"] .' x '. number_format($values["item_price"]); ?></td>
                            <td><?php echo number_format($values["item_price"] * $values["item_quantity"]); ?> <span>₫</span></td>
                            <td class="text-center">
                                    <input type="hidden" name="list_item_id[]" value="<?php echo $values["item_id"]; ?>"/>
                                    <a href="<?php echo Common::template_directory(); ?>/GioHang/Delete/<?php echo $values["item_id"]; ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php 
                        $index++; 
                        } 
                    ?>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Thành tiền: </strong></td>
                            <td>
                                <?php echo number_format($total); ?>
                                <span>₫</span>
                            </td>
                            <td></td>
                        </tr>
                    <?php } else { ?>
                        <tr class="text-center">
                            <td colspan="6">Không có sản phẩm nào trong giỏ hàng</td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="row">
                                <input type="text" placeholder="Mã giảm giá" class="form-control col-md-2 ml-3"/>
                                <span><bututon type="submit" href="" class="form-control btn btn-primary ml-1">Áp dụng</button></span>
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary b-block">
                                Tính lại
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <div class="col-md-6">
            <form action="<?php echo Common::template_directory(); ?>/ThanhToan/Index" method="post">
            
                <?php if(isset($_COOKIE["_product_in_cart"])) { ?>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Thông tin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Phí vận chuyển</td>
                            <td>
                                Đồng giá 30,000 <span>₫</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Thành tiền</td>
                            <td><strong><?php echo number_format($total + 30000); ?> <span>₫</span></strong></td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td><button type="submit" class="btnCheckout btn btn-primary btn-block">Tiến hành thanh toán</button></td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
            </form>
        </div>
    </div>
</section>


<?php 
    include_once("./mvc/views/shared/v_footer.php");
?>