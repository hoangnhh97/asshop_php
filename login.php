<?php 
    include_once("views/shared/v_header.php");
    include_once("configs/Router.php");

    $router = new Router(__DIR__);
    $router->router();
?>

<div class="container">
    <form action="<?php echo $router->createUrl("login") ?>">
        <div class="form-group">
            <label>Email:</label>
            <div class="col-10">
                <input type="email" name="txtUsername" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <label>Mật khẩu:</label>
            <div class="col-10">
                <input type="password" name="txtPassword" class="form-control"/>
            </div>
        </div>
    </form>
</div>

<?php 
    include_once("views/shared/v_footer.php");
?>

