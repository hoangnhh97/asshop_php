
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="<?php echo Common::template_directory(); ?>/assets/css/all.min.css" rel="stylesheet"/>
        <link href="<?php echo Common::template_directory(); ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="<?php echo Common::template_directory(); ?>/assets/css/styles-admin.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">


    </head>
    <body>

    <?php 
        if(isset($_POST["messageAlert"])) {
            echo Common::getPOST("messageAlert");
        }
    ?>

        <?php 
            include_once("./mvc/views/admin/shared_admin/v_navbar.php");
        ?>

        <div id="wrapper">
                        
            <!-- Page content holder -->
            <div class="page-content p-5" id="content">
                <!-- Toggle button -->
                <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
