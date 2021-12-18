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

switch($controller)
{
case 'Login': include("login.php"); break;
case 'Register': include("register.php"); break;
}
    
if ($controller == 'Dashboard2' || $controller == 'Charts' || $controller == 'Forms' || $controller == 'Tables' || $controller == 'CustomerOrders' || $controller == 'CustomerOrderDetail'
     || $controller == 'SupplyOrders' || $controller == 'SupplyOrderDetail' || $controller == 'SupplyOrderHistory') {
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

include("dashboard.php");
    
switch($controller)
{
case 'Dashboard':
    include("dashboard.php");
    break;
case 'Forms': 
    include("form_components.php");
    include("form_elements.php");
    include("form_fileupload.php");
    include("form_masks.php");
    include("form_validation.php");
    include("form_wizard.php");

    include("charts_chartjs.php");
    include("charts_easypiechart.php");
    include("charts_flot.php");
    include("charts_morris.php");
    include("charts_rickshaw.php");
    include("charts_sparkline.php");
    break;    
case 'SupplyOrders':
    include("tables_data.php");    


    include("charts_flot.php");
    include("charts_morris.php");
 
    break;
case 'CustomerOrders':
    include("tables_data.php");    


    include("charts_flot.php");
    include("charts_morris.php");
 
    break;
case 'SupplyOrderDetail':
    include("tables_data.php");    


    include("charts_flot.php");
    include("charts_morris.php");
 
    break;
case 'CustomerOrderDetail': 
    include("tables_data.php");    


    include("charts_flot.php");
    include("charts_morris.php");
 
    break;
case 'SupplyOrderHistory': 
    include("tables_data.php");    

    include("charts_flot.php");
    include("charts_morris.php");
 
    break;
case 'Tables':     
    include("tables_basic.php");
    include("tables_data.php");
    include("tables_responsive.php");
    break;    
case 'Maps':
//    include("maps_vectors.php");     
    break;
default:
}

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

}
include("librerias_java.php");
include("modal_window.php");
?>

    </body>
</html>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {

        $('#cantidad').val('');
        $('#cantidad').focus();
        $.calcular_cantidad_nueva = function() {
            
            cantidad = parseInt($('#cantidad'+ean13).val()) + 1;
            $('#cantidad'+ean13).val(cantidad);

        };
        $('.actualizar').click(function(){
            //actualizar el stock de los productos de cada linea, si todos los pendientes
            //de recibir son 0 entonces cambia estado de orden a Completly, si no lo pone a Parciality


            linea_completa = 0;
            $('.ean13').each(
                function(index, value) {
                    ean13 = eval($(this).val());
                    cantidad_recibida = parseInt($('#cantidad'+ean13).val());
                    id_order_detail = $(this).data('idorderdetail');
                    if (cantidad_recibida > 0) {
                        //actualizo el stock en las tablas relacionadas
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: "accion=actualizarOrder&tabla=store_stock&ean13="+ean13+"&physical_quantity="+cantidad_recibida+"&id_order_detail="+id_order_detail,
                            dataType: "html",
                            beforeSend: function(){
//imagen de carga
                                $("#resultado").html("<p align='center'><img src='img/ajax-loader.gif' /></p>");
                            },
                            error: function(){
                                alert("error petición ajax");
                            },
                            success: function(data){                                                   
                                $("#resultado").empty();
                                $("#resultado").append(data);
                            }
                        });                        
                    }
                }
            );
        });
       
        $('#cantidad').change(function(){
            ean13 = $('#cantidad').val();
            if ($('#cantidad'+ean13).length) {
                cantidad_esperada = parseInt($('#cantidad_esperada'+ean13).val());
                cantidad_recibida = parseInt($('#cantidad'+ean13).val());
                if (cantidad_esperada > cantidad_recibida) {
                    $.calcular_cantidad_nueva();
                    $('#cantidad').val('');
                }else{
                    //muestra la alerta en pantalla de order_overflow
                    alert("Ya se llegó a la cantidad pedida en la orden de compra");
                    $('#cantidad').val(''); 
                }
            }else{
                //guardar el dato en tabla store_order_no_barcode
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "accion=guardar&tabla=store_order_no_barcode&id_order=<?php echo $pedido;?>&ean13="+ean13,
                    dataType: "html",
                    beforeSend: function(){
//imagen de carga
                        $("#resultado").html("<p align='center'><img src='img/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                            alert("error petición ajax");
                    },
                    success: function(data){                                                   
                        $("#resultado").empty();
                        $("#resultado").append(data);
                    }
		});                
                $('#cantidad').val('');    
            }
            $('#cantidad').focus();
        });
    });

</script>