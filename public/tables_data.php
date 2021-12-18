<?php

$servidor_local = 'localhost';
$base_de_datos = 'softhaus_store';
$password = '5P513S-9j@';
$servidor = 'http://www.softhaus.com.mx';
$path_app = '/logistik/app/';
$path_admin = '/store/';
   
$controller = $_GET['controller'];
$view = $_GET['view'];
$id_lang = $_GET['id_lang'];
$id_warehouse = $_GET['id_warehouse'];
$pedido = $_GET['reference'];
$estilo = $_GET['reference'];
$id_supply_order_detail = $_GET['id_supply_order_detail'];

        if(isset($_POST['mi_correo']) && isset($_POST['su_correo'])) {
            $email_from = $_POST['mi_correo'];
            $email_to = $_POST['su_correo'];
            $link = $_POST['link'];
            $email_subject = "Tu amigo te recomendó este cupón de descuento.";
            $email_message = "Aprobecha este cupón de descuento que te recomendó tu amigo:\n\n";
            $email_message .= "Para verlo visita: ".$link."\n\n";
            $headers = 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            @mail($email_to, $email_subject, $email_message, $headers);
            echo "¡El formulario se ha enviado con éxito!";
        }
        switch ($controller) {
            case 'CustomerOrders':
                    $titulo = 'Almacén - Salidas';
                    $subtitulo = 'Control de la salida de productos - Ordenes de entrega';            
            break;
            case 'CustomerOrderDetail':
                    $titulo = 'Almacén - Salidas';
                    $subtitulo = 'Control de la salida de productos - Detalle de la órden de entrega';            
            break;
            case 'SupplyOrders':
                    $titulo = 'Almacén - Entradas';
                    $subtitulo = 'Control de la entrada de productos - Ordenes de compra';            
            break;
            case 'SupplyOrderDetail':
                    $titulo = 'Almacén - Entradas';
                    $subtitulo = 'Control de la entrada de productos - Detalle de la órden de compra';            
            break;
            case 'SupplyOrderHistory':
                    $titulo = 'Almacén - Entradas';
                    $subtitulo = 'Control de la entrada de productos - Detalle de movimientos de stock';            
            break;
        }

        echo '                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <div class="pull-left">
                                <h1 class="title">'.$titulo.'</h1>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">'.$subtitulo.'</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">';
                                    
        switch ($controller) {
            case 'CustomerOrders': /*Preparacion de la informacion que se mostrara en la vista*/
                /*SELECT store_orders.*, store_customer.*, store_order_detail.*, store_warehouse.name AS warehouse, store_order_state_lang.name AS state, store_order_state.color 
                FROM `store_orders`
                LEFT JOIN store_customer 
                ON (store_orders.id_customer = store_customer.id_customer)                 
                LEFT JOIN store_order_detail 
                ON (store_orders.id_order = store_order_detail.id_order) 
                LEFT JOIN store_warehouse 
                ON (store_order_detail.id_warehouse = store_warehouse.id_warehouse) 
                LEFT JOIN store_order_state_lang 
                ON ((store_order_state_lang.id_lang = 2) AND (store_orders.current_state = store_order_state_lang.id_order_state))
                LEFT JOIN store_order_state 
                ON (store_order_state.id_order_state = store_orders.current_state)
                WHERE ((store_orders.id_lang = 2) AND (store_order_detail.id_warehouse = 1)) GROUP BY store_orders.id_order 
                */
                $con = mysql_connect($servidor_local, $base_de_datos, $password);
                mysql_select_db($base_de_datos, $con);

                $consulta =  "SELECT store_orders.*, store_customer.*, store_order_detail.*, store_warehouse.name AS warehouse, store_order_state_lang.name AS state, store_order_state.color "; 
                $consulta =  $consulta."FROM `store_orders` ";
                $consulta =  $consulta."LEFT JOIN store_customer ";
                $consulta =  $consulta."ON (store_orders.id_customer = store_customer.id_customer) ";                
                $consulta =  $consulta."LEFT JOIN store_order_detail ";
                $consulta =  $consulta."ON (store_orders.id_order = store_order_detail.id_order) ";
                $consulta =  $consulta."LEFT JOIN store_warehouse ";
                $consulta =  $consulta."ON (store_order_detail.id_warehouse = store_warehouse.id_warehouse) ";
                $consulta =  $consulta."LEFT JOIN store_order_state_lang ";
                $consulta =  $consulta."ON ((store_order_state_lang.id_lang = 2) AND (store_orders.current_state = store_order_state_lang.id_order_state)) ";
                $consulta =  $consulta."LEFT JOIN store_order_state ";
                $consulta =  $consulta."ON (store_order_state.id_order_state = store_orders.current_state) ";
                $consulta =  $consulta."WHERE ((store_orders.id_lang = ".$id_lang.") AND (store_order_detail.id_warehouse = ".$id_warehouse.")) GROUP BY store_orders.id_order";
            
                $sql_order_list = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'ListOrders': /*Muestra la lista de todas las ordenes de compra pendientes de surtir*/
                        $contar = mysql_num_rows($sql_order_list);
                        if($contar == 0){
?>
                                            No se encontraron resultados para esta selección.
<?php  
                        }else{
?> 
                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                        <th>Referencia</th>
                                                        <th>Cliente</th>
                                                        <th>Almacén</th>
                                                        <th>Estado</th>
                                                        <th>Creada el día</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                        <th>Referencia</th>
                                                        <th>Cliente</th>
                                                        <th>Almacén</th>
                                                        <th>Estado</th>
                                                        <th>Creada el día</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
<?php    
                            while($row=mysql_fetch_array($sql_order_list)){
                                $reference = $row['reference'];
                                $customer = $row['firstname']." ".$row['lastname'];
                                $warehouse_name = $row['warehouse'];
                                $state = $row['state'];
                                $color = $row['color'];
                                $date_add = $row['date_add'];
?>                                                    
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo $servidor.$path_app;?>index.php?controller=CustomerOrderDetail&view=ListItems&reference=<?php echo $reference;?>&id_lang=1">
                                                                <span class="co-name"><?php echo $reference;?></span>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $customer;?></td>
                                                        <td><?php echo $warehouse_name;?></td>
                                                        <td class="center"><button style="color:black; background-color:<?php echo $color;?>;" class="btn btn-default"><?php echo $state;?></button></td>
                                                        <td class="center"><?php echo $date_add;?></td>
                                                    </tr>
<?php 
                            }
?>
                                            </tbody>
                                        </table>
<?php 
                        }
                    break;
                }
                break;
            case 'CustomerOrderDetail': /*Muestra los detalles de la orden seleccionada*/
                /*SELECT store_orders.*, store_customer.*, store_order_detail.*, store_warehouse.name AS warehouse, store_order_state_lang.name AS state, store_order_state.color 
                FROM `store_orders`
                LEFT JOIN store_customer 
                ON (store_orders.id_customer = store_customer.id_customer)                 
                LEFT JOIN store_order_detail 
                ON (store_orders.id_order = store_order_detail.id_order) 
                LEFT JOIN store_warehouse 
                ON (store_order_detail.id_warehouse = store_warehouse.id_warehouse) 
                LEFT JOIN store_order_state_lang 
                ON ((store_order_state_lang.id_lang = 2) AND (store_orders.current_state = store_order_state_lang.id_order_state))
                LEFT JOIN store_order_state 
                ON (store_order_state.id_order_state = store_orders.current_state)
                WHERE ((store_orders.id_lang = 2) AND (store_order.reference = 1)) 
                */
                $con = mysql_connect($servidor_local, $base_de_datos, $password);
                mysql_select_db($base_de_datos, $con);

                $consulta =  "SELECT store_orders.*, store_customer.*, store_order_detail.*, store_warehouse.name AS warehouse, store_order_state_lang.name AS state, store_order_state.color "; 
                $consulta =  $consulta."FROM `store_orders` ";
                $consulta =  $consulta."LEFT JOIN store_customer ";
                $consulta =  $consulta."ON (store_orders.id_customer = store_customer.id_customer) ";                
                $consulta =  $consulta."LEFT JOIN store_order_detail ";
                $consulta =  $consulta."ON (store_orders.id_order = store_order_detail.id_order) ";
                $consulta =  $consulta."LEFT JOIN store_warehouse ";
                $consulta =  $consulta."ON (store_order_detail.id_warehouse = store_warehouse.id_warehouse) ";
                $consulta =  $consulta."LEFT JOIN store_order_state_lang ";
                $consulta =  $consulta."ON ((store_order_state_lang.id_lang = 2) AND (store_orders.current_state = store_order_state_lang.id_order_state)) ";
                $consulta =  $consulta."LEFT JOIN store_order_state ";
                $consulta =  $consulta."ON (store_order_state.id_order_state = store_orders.current_state) ";
                $consulta =  $consulta."WHERE ((store_orders.id_lang = ".$id_lang.") AND (store_orders.reference = '".$pedido."'))";
            
                $sql_order_list = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'ListItems': /*Muestra el detalle de la orden seleccionada.*/
                        $contar = mysql_num_rows($sql_order_list);
                        if($contar == 0){
?>
                                        <small>
                                                            Detalle de la orden de compra: <?php echo $pedido;?>.<br><br>
                                        </small>
                                        No se encontraron resultados para esta selección.
<?php  
                        }else{
?>
                                        <small>
                                                            Detalle de la orden de compra: <?php echo $pedido;?>.<br><br>
                                                            <div class="form-group">
                                                                                1.- <input id="cantidad" type="text" placeholder="Escanee un producto" value="0"><br><br>
                                                                                2.- <button class="btn label-success actualizar">Actualizar el inventario</button><br><br>

                                                                                <div id="resultado"></div>
                                                            </div>
                                        </small>
                                        
                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                            <th>Estilo</th>
                                                            <th>Descripción</th>
                                                            <th>Código</th>
                                                            <th>Cantidad</th>
                                                            <th>Cantidad escaneada</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                            <th>Estilo</th>
                                                            <th>Descripción</th>
                                                            <th>Código</th>
                                                            <th>Cantidad</th>
                                                            <th>Cantidad escaneada</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>

<?php    
                            while($row=mysql_fetch_array($sql_order_list)){
                                $id_order_detail = $row['id_order_detail'];
                                $id_product = $row['product_id'];
                                $id_product_attribute = $row['product_attribute_id'];
                                $id_order = $row['id_order'];
                                $estilo = $row['reference'];
                                $descripcion = $row['product_name'];
                                $ean13 = $row['product_ean13'];
                                $quantity = $row['product_quantity'];

?>

                <tr class="gradeA">
                    <td><a href="<?php echo $servidor.$path_app;?>index.php?controller=OrderHistory&view=ItemHistory&$id_order=<?php echo $id_order;?>&id_order_detail=<?php echo $id_order_detail;?>"><?php echo $estilo;?></a></td>
                    <td><?php echo $descripcion;?></td>
                    <td><input class="ean13" data-idorderdetail="<?php echo $id_order_detail;?>" id="<?php echo $ean13;?>" type="text" value="<?php echo $ean13;?>" readonly size="13"></td>
                    <td class="center"><input class="cantidad_esperada <?php echo $ean13;?>" id="cantidad_esperada<?php echo $ean13;?>" type="text" value="<?php echo $quantity;?>" readonly size="6"></td>
                    <td><input class="cantidad_recibida <?php echo $ean13;?>" id="cantidad<?php echo $ean13;?>" type="text" value="0" size="6"></td>
                </tr>

<?php 
                            }
?>
                                            </tbody>
                                        </table>
<?php                            
                        }
                    break;
                }
                break;
            case 'SupplyOrders': /*Preparacion de la informacion que se mostrara en la vista*/
                /*SELECT store_supply_order.reference, store_supply_order.supplier_name, store_supply_order.date_delivery_expected, store_warehouse.name AS warehouse, store_supply_order_state_lang.name AS state, store_supply_order_state.color 
                FROM `store_supply_order` 
                LEFT JOIN store_warehouse 
                ON (store_supply_order.id_warehouse = store_warehouse.id_warehouse) 
                LEFT JOIN store_supply_order_state_lang 
                ON ((store_supply_order_state_lang.id_lang = 2) AND (store_supply_order.id_supply_order_state = store_supply_order_state_lang.id_supply_order_state))
                LEFT JOIN store_supply_order_state 
                ON (store_supply_order_state.id_supply_order_state = store_supply_order.id_supply_order_state)
                WHERE ((store_supply_order.id_lang = 2) AND (ps_supply_order.id_warehouse = 1)) 
                */
                $con = mysql_connect($servidor_local, $base_de_datos, $password);
                mysql_select_db($base_de_datos, $con);

                $consulta =  "SELECT store_supply_order.reference, store_supply_order.supplier_name, store_supply_order.date_delivery_expected, store_warehouse.name AS warehouse, store_supply_order_state_lang.name AS state, store_supply_order_state.color "; 
                $consulta =  $consulta."FROM `store_supply_order` ";
                $consulta =  $consulta."LEFT JOIN store_warehouse "; 
                $consulta =  $consulta."ON (store_supply_order.id_warehouse = store_warehouse.id_warehouse) "; 
                $consulta =  $consulta."LEFT JOIN store_supply_order_state_lang "; 
                $consulta =  $consulta."ON ((store_supply_order_state_lang.id_lang = 2) AND (store_supply_order.id_supply_order_state = store_supply_order_state_lang.id_supply_order_state)) ";
                $consulta =  $consulta."LEFT JOIN store_supply_order_state "; 
                $consulta =  $consulta."ON (store_supply_order_state.id_supply_order_state = store_supply_order.id_supply_order_state) ";
                $consulta =  $consulta."WHERE ((store_supply_order.id_lang = ".$id_lang.") AND (store_supply_order.id_warehouse = ".$id_warehouse.")) ";
            
                $sql_order_list = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'ListOrders': /*Muestra la lista de todas las ordenes de compra pendientes de surtir*/
                        $contar = mysql_num_rows($sql_order_list);
                        if($contar == 0){
?>
                                        No se encontraron resultados para esta selección.
<?php  
                        }else{
?>
                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                        <th>Referencia</th>
                                                        <th>Proveedor</th>
                                                        <th>Almacén</th>
                                                        <th>Estado</th>
                                                        <th>Creada el día</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                        <th>Referencia</th>
                                                        <th>Proveedor</th>
                                                        <th>Almacén</th>
                                                        <th>Estado</th>
                                                        <th>Creada el día</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
<?php
                            while($row=mysql_fetch_array($sql_order_list)){
                                $reference = $row['reference'];
                                $supplier_name = $row['supplier_name'];
                                $warehouse_name = $row['warehouse'];
                                $state = $row['state'];
                                $color = $row['color'];
                                $date_delivery_expected = $row['date_delivery_expected'];


?>

                <tr class="gradeA">
                    <td><a href="<?php echo $servidor.$path_app;?>index.php?controller=SupplyOrderDetail&view=ListItems&reference=<?php echo $reference;?>"><?php echo $reference;?></a></td>
                    <td><?php echo $supplier_name;?></td>
                    <td><?php echo $warehouse_name;?></td>
                    <td class="center"><button style="color:black; background-color:<?php echo $color;?>;" class="btn btn-default"><?php echo $state;?></button></td>
                    <td class="center"><?php echo $date_delivery_expected;?></td>
                </tr>

<?php 
                            }
?>
                                            </tbody>
                                        </table>
<?php                             
                        }
                    break;
            }
            break;  
            case 'SupplyOrderDetail': /*Muestra los detalles de la orden seleccionada*/
                /*SELECT store_supply_order_detail.id_product, store_supply_order_detail.id_product_attribute, store_supply_order_detail.reference, store_supply_order_detail.name, store_supply_order_detail.ean13, store_supply_order_detail.quantity_expected, store_supply_order_detail.quantity_received
                FROM `store_supply_order_detail` 
                LEFT JOIN store_supply_order
                ON (store_supply_order.id_supply_order = store_supply_order_detail.id_supply_order) 
                WHERE (store_supply_order.reference = 'PED0003') 
                */
                $con = mysql_connect($servidor_local, $base_de_datos, $password);
                mysql_select_db($base_de_datos, $con);

                $consulta =  "SELECT store_supply_order_detail.id_supply_order, store_supply_order_detail.id_supply_order_detail, store_supply_order_detail.id_product, store_supply_order_detail.id_product_attribute, store_supply_order_detail.reference, store_supply_order_detail.name, store_supply_order_detail.ean13, store_supply_order_detail.quantity_expected, store_supply_order_detail.quantity_received ";
                $consulta =  $consulta."FROM `store_supply_order_detail` "; 
                $consulta =  $consulta."LEFT JOIN store_supply_order ";
                $consulta =  $consulta."ON (store_supply_order.id_supply_order = store_supply_order_detail.id_supply_order) "; 
                $consulta =  $consulta."WHERE (store_supply_order.reference = '".$pedido."') ";
            
                $sql = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'ListItems': /*Muestra el detalle de la orden seleccionada.*/
                        $contar = mysql_num_rows($sql);
                        if($contar == 0){
?>
                                        No se encontraron resultados para esta selección.
<?php  
                        }else{
?>
                                        <small>
                                                            Detalle de la orden de compra: <?php echo $pedido;?>.<br><br>
                                                            <div class="form-group">
                                                                                1.- <input id="cantidad" type="text" placeholder="Escanee un producto" value="0"><br><br>
                                                                                2.- <button class="btn label-success actualizar">Actualizar el inventario</button><br><br>

                                                                                <div id="resultado"></div>
                                                            </div>
                                        </small>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {

        /* Add sorting icons */

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
                    cantidad_pendiente = parseInt($('#cantidad_pendiente'+ean13).val());
                    id_supply_order_detail = $(this).data('idorderdetail');
                    if (cantidad_recibida > 0) {
                        //actualizo el stock en las tablas relacionadas
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: "accion=actualizar&tabla=store_stock&ean13="+ean13+"&physical_quantity="+cantidad_recibida+"&id_supply_order_detail="+id_supply_order_detail,
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
                cantidad_pendiente = parseInt($('#cantidad_pendiente'+ean13).val());
                cantidad_recibida = parseInt($('#cantidad'+ean13).val());
                if (cantidad_pendiente > cantidad_recibida) {
                    $.calcular_cantidad_nueva();
                    $('#cantidad').val('');
                }else{
                    //guardar el dato en tabla store_supply_order_overflow
                    $.ajax({
			type: "POST",
			url: "ajax.php",
			data: "accion=guardar&tabla=store_supply_order_overflow&id_order=<?php echo $pedido;?>&ean13="+ean13,
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
            }else{
                //guardar el dato en tabla store_supply_order_no_barcode
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "accion=guardar&tabla=store_supply_order_no_barcode&id_order=<?php echo $pedido;?>&ean13="+ean13,
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

                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                            <th>Estilo</th>
                                                            <th>Descripción</th>
                                                            <th>Código</th>
                                                            <th>Cantidad esperada</th>
                                                            <th>Cantidad pendiente</th>
                                                            <th>Cantidad escaneada</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                            <th>Estilo</th>
                                                            <th>Descripción</th>
                                                            <th>Código</th>
                                                            <th>Cantidad esperada</th>
                                                            <th>Cantidad pendiente</th>
                                                            <th>Cantidad escaneada</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>

<?php    
                            while($row=mysql_fetch_array($sql)){
                                $id_supply_order_detail = $row['id_supply_order_detail'];
                                $id_product = $row['id_product'];
                                $id_product_attribute = $row['id_product_attribute'];
                                $id_supply_order = $row['id_supply_order'];
                                $estilo = $row['reference'];
                                $descripcion = $row['name'];
                                $ean13 = $row['ean13'];
                                $quantity_expected = $row['quantity_expected'];
                                $quantity_received= $row['quantity_received'];

?>
<script type="text/javascript">

    $(document).ready(function() {
        $('#cantidad<?php echo $ean13;?>').val(0);
    });

</script>

                <tr class="gradeA">
                    <td><a href="<?php echo $servidor.$path_app;?>index.php?controller=SupplyOrderHistory&view=ItemHistory&$id_supply_order=<?php echo $id_supply_order;?>&id_supply_order_detail=<?php echo $id_supply_order_detail;?>"><?php echo $estilo;?></a></td>
                    <td><?php echo $descripcion;?></td>
                    <td><input class="ean13" data-idorderdetail="<?php echo $id_supply_order_detail;?>" id="<?php echo $ean13;?>" type="text" value="<?php echo $ean13;?>" readonly size="13"></td>
                    <td class="center"><input class="cantidad_esperada <?php echo $ean13;?>" id="cantidad_esperada<?php echo $ean13;?>" type="text" value="<?php echo $quantity_expected;?>" readonly size="6"></td>
                    <td class="center"><input class="cantidad_pendiente <?php echo $ean13;?>" id="cantidad_pendiente<?php echo $ean13;?>" type="text" value="<?php echo $quantity_expected - $quantity_received;?>" readonly size="6"></td>
                    <td><input class="cantidad_recibida <?php echo $ean13;?>" id="cantidad<?php echo $ean13;?>" type="text" value="0" size="6"></td>
                </tr>

<?php 
                            }
?>
                                            </tbody>
                                        </table>
<?php                            
                        }
                    break;
                }
                break;
            case 'SupplyOrderHistory': /*Muestra los detalles de la orden seleccionada*/
                /*SELECT store_supply_order_receipt_history.employee_lastname, store_supply_order_receipt_history.employee_firstname, store_supply_order_receipt_history.quantity, store_supply_order_receipt_history.date_add
                FROM `store_supply_order_receipt_history` 
                WHERE (store_supply_order_receipt_history.id_supply_order_detail = 7) 
                */
                $con = mysql_connect($servidor_local, $base_de_datos, $password);
                mysql_select_db($base_de_datos, $con);

                $consulta =  "SELECT store_supply_order_receipt_history.employee_lastname, store_supply_order_receipt_history.employee_firstname, store_supply_order_receipt_history.quantity, store_supply_order_receipt_history.date_add ";
                $consulta =  $consulta."FROM `store_supply_order_receipt_history` ";
                $consulta =  $consulta."WHERE (store_supply_order_receipt_history.id_supply_order_detail = ".$id_supply_order_detail.")";
            
                $sql = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'ItemHistory': /*Muestra el historico de arribos del item seleccionado.*/
                        $contar = mysql_num_rows($sql);
                        if($contar == 0){
?>
                                        No se encontraron resultados para esta selección.
<?php  
                        }else{
?>
                                        <small>
                                                            Detalle de movimientos de stock
                                                            <div class="form-group">
                                                                                <div id="resultado"></div>
                                                            </div>
                                        </small>
                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                            <tr>
                                                                                <th>Usuario</th>
                                                                                <th>Cantidad</th>
                                                                                <th>Fecha</th>
                                                            </tr>
                                            </thead>

                                            <tfoot>
                                                            <tr>
                                                                                <th>Usuario</th>
                                                                                <th>Cantidad</th>
                                                                                <th>Fecha</th>
                                                            </tr>
                                            </tfoot>

                                            <tbody>

<?php    
                            while($row=mysql_fetch_array($sql)){
                                $usuario = $row['employee_firstname']." ".$row['employee_lastname'];
                                $quantity = $row['quantity'];
                                $date_add= $row['date_add'];

?>

                                                            <tr class="gradeA">
                                                                                <td><?php echo $usuario;?></td>
                                                                                <td><?php echo $quantity;?></td>
                                                                                <td class="center" ><?php echo $date_add;?></td>
                                                            </tr>

<?php 
                            }
?>
                                            </tbody>
                                        </table>
<?php                            
                        }
                    break;
                }
                break;
            
        }            
?>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    