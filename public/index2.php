<?php
$controller = $_REQUEST['controller'];
$titulo = $controller;
?>

<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Logistik - Responsive Application
         * @Subpackage: Server
         * @Version: 1.0
         * This file is part of Logistik Application.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Logistik : <?php echo $titulo;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->

<?php
include("librerias_estilo.php");

 echo '   </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
';

echo '    <body class=" ">
        <!-- START TOPBAR -->
';

include("top_bar.php");

echo '
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
';

include("side_bar.php");

echo '
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style="margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;">
';


echo '                </section>
            </section>
            <!-- END CONTENT -->
';
include("chat_bar.php");
 echo '
        </div>
        <!-- END CONTAINER -->
        
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
';

include("librerias_java.php");
include("modal_window.php");
?>

    </body>
</html>

<script type="text/javascript">

</script>