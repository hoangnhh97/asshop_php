<div id="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li><a href="tel:"><i class="fa fa-phone-alt"></i> 0123456789</a></li>
                    <li><a href="mailto:contact@asshop.com"><i class="far fa-envelope"></i> contact@asshop.com</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="text-right">
                    <li><a href=""><i class="fa fa-map-marked"></i> Địa chỉ</a></li>
                    <li><a href="TheoDoiDonHang/Index"><i class="fas fa-truck"></i> Theo dõi đơn hàng</a></li>
                    <li><a href=""><i class="fa fa-shopping-bag"></i> Cửa hàng</a></li>
                    <?php if(empty($_SESSION["email"])) { ?>
                        <li><a href="javascript:;" data-toggle="modal" data-target="#form-user"><i class="fa fa-user"></i> Đăng nhập/Đăng ký</a></li>
                    <?php }  else { ?>
                        <li>
                            <a href="javascript:;" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> Tài khoản
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Thông tin</a>
                                <a class="dropdown-item" href="#">Cài đặt</a>
                                <a class="dropdown-item" href="<?php echo Common::template_directory(); ?>/User/Logout">Đăng xuất</a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>