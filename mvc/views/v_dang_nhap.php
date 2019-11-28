<?php 
if(UserController::login() == 1) {
    
    if(isset($_GET["message"])) {
        echo '<div id="alert-box" class="alert '.$_GET["type"].' alert-dismissable" id="flash-msg">
                <h4>'.$_GET["message"].'</h4></div>';   
    }
} else {
    
}
?>