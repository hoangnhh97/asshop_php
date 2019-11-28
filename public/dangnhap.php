<?php 
    if(UserController::login() == 1) {
        BaseController::SetAlert("Thành công!", "success");
        header("Location:/");
    } else {
        echo 'Lỗi';
    }
?>