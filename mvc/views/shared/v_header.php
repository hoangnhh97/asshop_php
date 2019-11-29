
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Home</title>

        <link href="http://localhost:8888/asshop/assets/css/all.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/owl.carousel.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/owl.theme.default.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/styles.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    </head>
    <body>

    <?php 
        if(isset($_POST["messageAlert"])) {
            echo Common::getPOST("messageAlert");
        }
    ?>


    <div class="modal fade" id="form-user" tabindex="-1" role="dialog" aria-labelledby="form-user" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-home" aria-selected="true">Đăng nhập</a>
                        <a class="nav-item nav-link" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-profile" aria-selected="false">Đăng ký</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                        <div class="container">
                            <form action="" class="mt-3" method="post">
                                <div class="form-group">
                                    <input type="text" name="txtUsername" placeholder="Tên tài khoản" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtPassword" placeholder="Mật khẩu" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="btnLogin" class="btn btn-primary">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                        <div class="container">
                            <form action="dangky.php" class="mt-3" method="post">
                                <div class="form-group">
                                    <input type="text" name="txtUsername" placeholder="Tên tài khoản" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtPassword" placeholder="Mật khẩu" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtRePass" placeholder="Nhập lại mật khẩu" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="btnRegister" class="btn btn-warning">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                            <li><a href=""><i class="fas fa-truck"></i> Theo dõi đơn hàng</a></li>
                            <li><a href=""><i class="fa fa-shopping-bag"></i> Cửa hàng</a></li>
                            <?php if(empty($_SESSION["email"])) { ?>
                                <li><a href="javascript:;" data-toggle="modal" data-target="#form-user"><i class="fa fa-user"></i> Đăng nhập/Đăng ký</a></li>
                            <?php }  else { ?>
                                <li><a href="javascript:;" data-toggle="modal" data-target="#form-user"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            
        <?php include_once("mvc/views/shared/v_navbar.php") ?>
        <div id="wrapper">