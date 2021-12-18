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
            case 'Orders': /*Preparacion de la informacion que se mostrara en la vista*/
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
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Salidas
                                <small>
                                    Control de la salida de productos.<br><br>
                                </small>
                            </h3>
                            No se encontraron resultados para esta selección.
                        </div>
                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->
<?php  
                        }else{
?>
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Salidas
                                <small>
                                    Control de la salida de productos.
                                </small>
                            </h3>
<!-- Data tables -->
<!--<link rel="stylesheet" type="text/css" href="assets-minified/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {
        $('#dynamic-table-example-1').dataTable();

        /* Add sorting icons */

        $("table.dataTable .sorting").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_asc").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_desc").append('<i class="glyph-icon"></i>');

    });

</script>

    <h2 class="title-hero">
        Control de Salidas
    </h2>
    <p class="title-lead">Control de la salida de productos.</p>

    <div class="divider"></div>

    

    <h2 class="title-hero">
        Control de Salidas
    </h2>
    <p class="title-lead">Control de la salida de productos.</p>

    <div class="example-box-wrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dynamic-table-example-1">
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Cliente</th>
                    <th>Almacén</th>
                    <th>Estado</th>
                    <th>Creada el día</th>
                </tr>
            </thead>
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

                <tr class="gradeA">
                    <td><a href="<?php echo $servidor.$path_app;?>index.php?controller=CustomerOrderDetail&view=ListItems&reference=<?php echo $reference;?>&id_lang=1"><?php echo $reference;?></a></td>
                    <td><?php echo $customer;?></td>
                    <td><?php echo $warehouse_name;?></td>
                    <td class="center"><button style="color:black; background-color:<?php echo $color;?>;" class="btn btn-default"><?php echo $state;?></button></td>
                    <td class="center"><?php echo $date_add;?></td>
                </tr>

<?php 
                            }
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
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Salidas
                                <small>
                                    Detalle de la orden de compra: <?php echo $pedido;?>.<br><br>
                                </small>
                            </h3>
                            No se encontraron resultados para esta selección. <?php echo $consulta;?>
                        </div>
                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->
<?php  
                        }else{
?>
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Salidas
                                <small>
                                    Detalle de la orden de compra: <?php echo $pedido;?>.<br><br>
                                    <div class="form-group">
                                        1.- <input id="cantidad" type="text" placeholder="Escanee un producto" value="0"><br><br>
                                        2.- <button class="btn label-success actualizar">Actualizar el inventario</button><br><br>

                                        <div id="resultado"></div>
                                    </div>
                                </small>
                            </h3>
                            
<!-- Data tables -->
<!--<link rel="stylesheet" type="text/css" href="assets-minified/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {
        $('#dynamic-table-example-1').dataTable();

        /* Add sorting icons */

        $("table.dataTable .sorting").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_asc").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_desc").append('<i class="glyph-icon"></i>');
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

    <h2 class="title-hero">
        Almacén - Salidas
    </h2>
    <p class="title-lead">Detalle de la orden de compra.</p>

    <div class="divider"></div>

    

    <h2 class="title-hero">
        Almacén - Salidas
    </h2>
    <p class="title-lead">Detalle de la orden de compra: <?php echo $pedido;?>.</p>

    <div class="example-box-wrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dynamic-table-example-1">
            <thead>
                <tr>
                    <th>Estilo</th>
                    <th>Descripción</th>
                    <th>Código</th>
                    <th>Cantidad</th>
                    <th>Cantidad escaneada</th>
                </tr>
            </thead>
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
<script type="text/javascript">

    $(document).ready(function() {
        $('#cantidad<?php echo $ean13;?>').val(0);
    });

</script>

                <tr class="gradeA">
                    <td><a href="<?php echo $servidor.$path_app;?>app.php?controller=OrderHistory&view=ItemHistory&$id_order=<?php echo $id_order;?>&id_order_detail=<?php echo $id_order_detail;?>"><?php echo $estilo;?></a></td>
                    <td><?php echo $descripcion;?></td>
                    <td><input class="ean13" data-idorderdetail="<?php echo $id_supply_order_detail;?>" id="<?php echo $ean13;?>" type="text" value="<?php echo $ean13;?>" readonly size="13"></td>
                    <td class="center"><input class="cantidad_esperada <?php echo $ean13;?>" id="cantidad_esperada<?php echo $ean13;?>" type="text" value="<?php echo $quantity;?>" readonly size="6"></td>
                    <td><input class="cantidad_recibida <?php echo $ean13;?>" id="cantidad<?php echo $ean13;?>" type="text" value="0" size="6"></td>
                </tr>

<?php 
                            }
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
                WHERE ((store_supply_order.id_lang = 2) AND (store_supply_order.id_warehouse = 1)) 
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
                $consulta =  $consulta."WHERE ((store_supply_order.id_lang = 2) AND (store_supply_order.id_warehouse = ".$id_warehouse.")) ";
            
                $sql_order_list = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'ListOrders': /*Muestra la lista de todas las ordenes de compra pendientes de surtir*/
                        $contar = mysql_num_rows($sql_order_list);
                        if($contar == 0){
?>                            
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Entradas
                                <small>
                                    Control de las compras de suministros.<br><br>
                                </small>
                            </h3>
                            No se encontraron resultados para esta selección.
                        </div>
                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->
<?php  
                        }else{
?>
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Entradas
                                <small>
                                    Control de las compras de suministros.
                                </small>
                            </h3>
<!-- Data tables -->
<!--<link rel="stylesheet" type="text/css" href="assets-minified/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {
        $('#dynamic-table-example-1').dataTable();

        /* Add sorting icons */

        $("table.dataTable .sorting").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_asc").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_desc").append('<i class="glyph-icon"></i>');

    });

</script>

    <h2 class="title-hero">
        Control de entradas
    </h2>
    <p class="title-lead">Control de las compras de suministros.</p>

    <div class="divider"></div>

    

    <h2 class="title-hero">
        Control de entradas
    </h2>
    <p class="title-lead">Control de las compras de suministros.</p>

    <div class="example-box-wrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dynamic-table-example-1">
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Proveedor</th>
                    <th>Almacén</th>
                    <th>Estado</th>
                    <th>Llega el día</th>
                </tr>
            </thead>
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
                    <td><a href="<?php echo $servidor.$path_app;?>app.php?controller=OrderDetail&view=ListItems&reference=<?php echo $reference;?>"><?php echo $reference;?></a></td>
                    <td><?php echo $supplier_name;?></td>
                    <td><?php echo $warehouse_name;?></td>
                    <td class="center"><button style="color:black; background-color:<?php echo $color;?>;" class="btn btn-default"><?php echo $state;?></button></td>
                    <td class="center"><?php echo $date_delivery_expected;?></td>
                </tr>

<?php 
                            }
                        }
                    break;
                }
                break;                  
            case 'OrderDetail': /*Muestra los detalles de la orden seleccionada*/
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
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Entradas
                                <small>
                                    Detalle de la orden de compra: <?php echo $pedido;?>.<br><br>
                                </small>
                            </h3>
                            No se encontraron resultados para esta selección.
                        </div>
                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->
<?php  
                        }else{
?>
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Entradas
                                <small>
                                    Detalle de la orden de compra: <?php echo $pedido;?>.<br><br>
                                    <div class="form-group">
                                        1.- <input id="cantidad" type="text" placeholder="Escanee un producto" value="0"><br><br>
                                        2.- <button class="btn label-success actualizar">Actualizar el inventario</button>
                                    </div>
                                </small>
                            </h3>
                            
<!-- Data tables -->
<!--<link rel="stylesheet" type="text/css" href="assets-minified/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {
        $('#dynamic-table-example-1').dataTable();

        /* Add sorting icons */

        $("table.dataTable .sorting").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_asc").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_desc").append('<i class="glyph-icon"></i>');
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

    <h2 class="title-hero">
        Almacén - Entradas
    </h2>
    <p class="title-lead">Detalle de la orden de compra.</p>

    <div class="divider"></div>

    

    <h2 class="title-hero">
        Almacén - Entradas
    </h2>
    <p class="title-lead">Detalle de la orden de compra: <?php echo $pedido;?>.</p>

    <div class="example-box-wrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dynamic-table-example-1">
            <thead>
                <tr>
                    <th>Estilo</th>
                    <th>Descripción</th>
                    <th>Código</th>
                    <th>Cantidad esperada</th>
                    <th>Cantidad pendiente</th>
                    <th>Cantidad recibida</th>
                </tr>
            </thead>
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
                    <td><a href="<?php echo $servidor.$path_app;?>app.php?controller=SupplyOrderHistory&view=ItemHistory&$id_supply_order=<?php echo $id_supply_order;?>&id_supply_order_detail=<?php echo $id_supply_order_detail;?>"><?php echo $estilo;?></a></td>
                    <td><?php echo $descripcion;?></td>
                    <td><input class="ean13" data-idorderdetail="<?php echo $id_supply_order_detail;?>" id="<?php echo $ean13;?>" type="text" value="<?php echo $ean13;?>" readonly size="13"></td>
                    <td class="center"><input class="cantidad_esperada <?php echo $ean13;?>" id="cantidad_esperada<?php echo $ean13;?>" type="text" value="<?php echo $quantity_expected;?>" readonly size="6"></td>
                    <td class="center"><input class="cantidad_pendiente <?php echo $ean13;?>" id="cantidad_pendiente<?php echo $ean13;?>" type="text" value="<?php echo $quantity_expected - $quantity_received;?>" readonly size="6"></td>
                    <td><input class="cantidad_recibida <?php echo $ean13;?>" id="cantidad<?php echo $ean13;?>" type="text" value="0" size="6"></td>
                </tr>

<?php 
                            }
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
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Entradas
                                <small>
                                    Detalle de movimientos de stock.<br><br>
                                </small>
                            </h3>
                            No se encontraron resultados para esta selección.
                        </div>
                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->
<?php                            
                        }else{
?>
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Entradas
                                <small>
                                    Detalle de movimientos de stock.
                                </small>
                            </h3>
<!-- Data tables -->
<!--<link rel="stylesheet" type="text/css" href="assets-minified/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {
        $('#dynamic-table-example-1').dataTable();

        /* Add sorting icons */

        $("table.dataTable .sorting").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_asc").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_desc").append('<i class="glyph-icon"></i>');

    });

</script>

    <h2 class="title-hero">
        Almacén - Entradas
    </h2>
    <p class="title-lead">Detalle de movimientos de stock.</p>

    <div class="divider"></div>

    

    <h2 class="title-hero">
        Almacén - Entradas
    </h2>
    <p class="title-lead">Detalle de movimientos de stock.</p>

    <div class="example-box-wrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dynamic-table-example-1">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
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
                        }
                    break;
                }
                break;
            case 'StockNow': /*Preparacion de la informacion que se mostrara en la vista*/
                /*SELECT store_stock_tallas.*, store_warehouse.name AS warehouse, store_product.price, store_product_lang.name AS descripcion, store_image.id_image
                FROM `store_stock_tallas`
                LEFT JOIN store_warehouse 
                ON (store_stock_tallas.id_warehouse = store_warehouse.id_warehouse)                 
                LEFT JOIN store_product
                ON (store_stock_tallas.id_product = store_product.id_product)
                LEFT JOIN store_product_lang
                ON (store_stock_tallas.id_product = store_product_lang.id_product)                 
                WHERE ((store_stock_tallas.id_warehouse = 1) AND (store_product_lang.id_lang = 2) AND (store_image.cover = 1))
                */
                $con = mysql_connect($servidor_local, $base_de_datos, $password);
                mysql_select_db($base_de_datos, $con);

                $consulta =  "SELECT store_stock_tallas.*, store_warehouse.name AS warehouse, store_product.price, store_product.reference, store_product_lang.name AS description, store_image.id_image "; 
                $consulta =  $consulta."FROM `store_stock_tallas` ";
                $consulta =  $consulta."LEFT JOIN store_warehouse "; 
                $consulta =  $consulta."ON (store_stock_tallas.id_warehouse = store_warehouse.id_warehouse) ";                 
                $consulta =  $consulta."LEFT JOIN store_product ";
                $consulta =  $consulta."ON (store_stock_tallas.id_product = store_product.id_product) ";
                $consulta =  $consulta."LEFT JOIN store_product_lang ";
                $consulta =  $consulta."ON (store_stock_tallas.id_product= store_product_lang.id_product) ";
                $consulta =  $consulta."LEFT JOIN store_image ";
                $consulta =  $consulta."ON ((store_stock_tallas.id_product= store_image.id_product) AND (cover = 1)) ";                
                $consulta =  $consulta."WHERE ((store_stock_tallas.id_warehouse = ".$id_warehouse.") AND (store_product_lang.id_lang = 2) AND (store_image.cover = 1)) ";
            
                $sql_order_list = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'ListProducts': /*Muestra la lista de todos los productos en stock*/
                        $contar = mysql_num_rows($sql_order_list);
                        if($contar == 0){
?>                            
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Estado de existencias
                                <small>
                                    Control de existencias de productos.<br><br>
                                </small>
                            </h3>
                            No se encontraron resultados para esta selección.
                        </div>
                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->
<?php  
                        }else{
?>
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Estado de existencias
                                <small>
                                    Control de existencias de productos.<br><br>
                                    1.- <button class="btn label-success exportarStock">Exportar el inventario</button>                                
                                </small>
                            </h3>
<!-- Data tables -->
<!--<link rel="stylesheet" type="text/css" href="assets-minified/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {
        $('#dynamic-table-example-1').dataTable();

        /* Add sorting icons */

        $("table.dataTable .sorting").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_asc").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_desc").append('<i class="glyph-icon"></i>');
        $('.exportarStock').click(function(){
            //actualizar el stock de los productos de cada linea, si todos los pendientes
            //de recibir son 0 entonces cambia estado de orden a Completly, si no lo pone a Parciality

            //window.open('http://google.com/','','width=600,height=400,left=50,top=50,toolbar=yes');
            $(location).attr('href','imprimir.php?id_warehouse=1'); 
                       
        });         

    });

</script>

    <h2 class="title-hero">
        Almacén - Estado de existencias
    </h2>
    <p class="title-lead">Control de existencias de productos.</p>

    <div class="divider"></div>

    

    <h2 class="title-hero">
        Almacén - Estado de existencias
    </h2>
    <p class="title-lead">Control de existencias de productos.</p>

    <div class="example-box-wrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dynamic-table-example-1">
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Descripcion</th>
                    <th>Total</th>                    
                    <th>1</th>
                    <th>1.5</th>
                    <th>2</th>
                    <th>2.5</th>
                    <th>3</th>
                    <th>3.5</th>
                    <th>4</th>
                    <th>4.5</th>
                    <th>5</th>
                    <th>5.5</th>
                    <th>6</th>
                    <th>6.5</th>
                    <th>7</th>
                    <th>7.5</th>
                    <th>8</th>
                    <th>8.5</th>
                    <th>9</th>
                    <th>9.5</th>
                    <th>10</th>
                    <th>10.5</th>
                    <th>11</th>
                    <th>11.5</th>
                    <th>12</th>
                </tr>
            </thead>
            <tbody>
<?php    
                            while($row=mysql_fetch_array($sql_order_list)){
                                $reference = $row['reference'];
                                $description = $row['description'];
                                $id_image = $row['id_image'];
                                $price = $row['price'];
                                $warehouse_name = $row['warehouse'];
                                $total = $row['total'];
                                $codigouno = $row['codigo1'];
                                $uno = $row['1'];
                                $codigounopuntocinco = $row['codigo1.5'];                                
                                $unopuntocinco = $row['1.5'];
                                $codigodos = $row['codigo2'];                                
                                $dos = $row['2'];
                                $codigodospuntocinco = $row['codigo2.5'];                                
                                $dospuntocinco = $row['2.5'];
                                $codigotres = $row['codigo3'];                                
                                $tres = $row['3'];
                                $codigotrespuntocinco = $row['codigo3.5'];                                
                                $trespuntocinco = $row['3.5'];
                                $codigocuatro = $row['codigo4'];                                
                                $cuatro = $row['4'];
                                $codigocuatropuntocinco = $row['codigo4.5'];                                
                                $cuatropuntocinco = $row['4.5'];
                                $codigocinco = $row['codigo5'];                                
                                $cinco = $row['5'];
                                $codigocincopuntocinco = $row['codigo5.5'];                                
                                $cincopuntocinco = $row['5.5'];
                                $codigoseis = $row['codigo6'];                                
                                $seis = $row['6'];
                                $codigoseispuntocinco = $row['codigo6.5'];                                
                                $seispuntocinco = $row['6.5'];
                                $codigosiete = $row['codigo7'];                                
                                $siete = $row['7'];
                                $codigosietepuntocinco = $row['codigo7.5'];                                
                                $sietepuntocinco = $row['7.5'];
                                $codigoocho = $row['codigo8'];                                
                                $ocho = $row['8'];
                                $codigoochopuntocinco = $row['codigo8.5'];                                
                                $ochopuntocinco = $row['8.5'];
                                $codigonueve = $row['codigo9'];                                
                                $nueve = $row['9'];
                                $codigonuevepuntocinco = $row['codigo9.5'];                                
                                $nuevepuntocinco = $row['9.5'];
                                $codigodiez = $row['codigo10'];                                
                                $diez = $row['10'];
                                $codigodiezpuntocinco = $row['codigo10.5'];                                
                                $diezpuntocinco = $row['10.5'];
                                $codigoonce = $row['codigo11'];                                
                                $once = $row['11'];
                                $codigooncepuntocinco = $row['codigo11.5'];                                
                                $oncepuntocinco = $row['11.5'];
                                $codigodoce = $row['codigo12'];                                
                                $doce = $row['12'];
                                                       
                                $digitos = strlen($id_image);

                                switch ($digitos) {
                              case 1:
                                    $unidades = substr($id_image, 0, 1);
                                    $ruta = "http://asportshoes.com/store/img/p/".$unidades."/".$unidades."-cart_default.jpg";
                                    break;
                              case 2:
                                    $decenas = substr($id_image, 0, 1);
                                    $unidades = substr($id_image, 1, 1);
                                    $ruta = "http://asportshoes.com/store/img/p/".$decenas."/".$unidades."/".$decenas.$unidades."-cart_default.jpg";                  
                                    break;
                              case 3:
                                    $centenas = substr($id_image, 0, 1);
                                    $decenas = substr($id_image, 1, 1);
                                    $unidades = substr($id_image, 2, 1);
                                    $ruta = "http://asportshoes.com/store/img/p/".$centenas."/".$decenas."/".$unidades."/".$centenas.$decenas.$unidades."-cart_default.jpg";                  
                                    break;           
                                }                                
?>

                <tr class="gradeA">
                    <td><img src="<?php echo $ruta; ?>" alt=""><br><?php echo $reference;?></td>
                    <td><?php echo $description;?><br><b></b>Precio:</b> $ <?php echo number_format(round($price, 2),2,".",",");?></td>
                    <td><?php echo $total;?></td>                    
                    <td><?php echo $uno;?></td>
                    <td><?php echo $unopuntocinco;?></td>                    
                    <td><?php echo $dos;?></td>
                    <td><?php echo $dospuntocinco;?></td>                    
                    <td><?php echo $tres;?></td>
                    <td><?php echo $trespuntocinco;?></td>                    
                    <td><?php echo $cuatro;?></td>
                    <td><?php echo $cuatropuntocinco;?></td>                    
                    <td><?php echo $cinco;?></td>
                    <td><?php echo $cincopuntocinco;?></td>                    
                    <td><?php echo $seis;?></td>
                    <td><?php echo $seispuntocinco;?></td>                    
                    <td><?php echo $siete;?></td>
                    <td><?php echo $sietepuntocinco;?></td>                    
                    <td><?php echo $ocho;?></td>
                    <td><?php echo $ochopuntocinco;?></td>                    
                    <td><?php echo $nueve;?></td>
                    <td><?php echo $nuevepuntocinco;?></td>                    
                    <td><?php echo $diez;?></td>                    
                    <td><?php echo $diezpuntocinco;?></td>
                    <td><?php echo $once;?></td>                    
                    <td><?php echo $oncepuntocinco;?></td>
                    <td><?php echo $doce;?></td>                    
                </tr>

<?php 
                            }
                        }
                    break;
            }
            break;
            case 'InventoryControl': /*Preparacion de la informacion que se mostrara en la vista*/
                /*SELECT store_physical_stock_tallas.*, store_warehouse.name AS warehouse, store_product.price, store_product_lang.name AS descripcion, store_image.id_image
                FROM `store_stock_tallas`
                LEFT JOIN store_warehouse 
                ON (store_stock_tallas.id_warehouse = store_warehouse.id_warehouse)                 
                LEFT JOIN store_product
                ON (store_stock_tallas.id_product = store_product.id_product)
                LEFT JOIN store_product_lang
                ON (store_stock_tallas.id_product = store_product_lang.id_product)                 
                WHERE ((store_stock_tallas.id_warehouse = 1) AND (store_product_lang.id_lang = 2) AND (store_image.cover = 1))
                */
                $con = mysql_connect($servidor_local, $base_de_datos, $password);
                mysql_select_db($base_de_datos, $con);

                $consulta =  "SELECT store_physical_stock_tallas.*, store_warehouse.name AS warehouse, store_product.price, store_product.reference, store_product_lang.name AS description, store_image.id_image "; 
                $consulta =  $consulta."FROM `store_physical_stock_tallas` ";
                $consulta =  $consulta."LEFT JOIN store_warehouse "; 
                $consulta =  $consulta."ON (store_physical_stock_tallas.id_warehouse = store_warehouse.id_warehouse) ";                 
                $consulta =  $consulta."LEFT JOIN store_product ";
                $consulta =  $consulta."ON (store_physical_stock_tallas.id_product = store_product.id_product) ";
                $consulta =  $consulta."LEFT JOIN store_product_lang ";
                $consulta =  $consulta."ON (store_physical_stock_tallas.id_product= store_product_lang.id_product) ";
                $consulta =  $consulta."LEFT JOIN store_image ";
                $consulta =  $consulta."ON ((store_physical_stock_tallas.id_product= store_image.id_product) AND (cover = 1)) ";                
                $consulta =  $consulta."WHERE ((store_physical_stock_tallas.id_warehouse = ".$id_warehouse.") AND (store_product_lang.id_lang = 2) AND (store_image.cover = 1)) ";
            
                $sql_order_list = mysql_query($consulta,$con);
                
                switch ($view) {
                    case 'InventoryCapture': /*Muestra la lista de todos los productos en stock*/
                        $contar = mysql_num_rows($sql_order_list);
                        if($contar == 0){
?>                            
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Conteo de existencias
                                <small>
                                    Control de stock.<br><br>
                                </small>
                            </h3>
                            No se encontraron resultados para esta selección.
                        </div>
                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->
<?php  
                        }else{
?>
                <div id="page-content-wrapper" class="rm-transition">
                    <div id="page-content">
                        <div class="page-box">
                            <h3 class="page-title">
                                Almacén - Conteo de existencias
                                <small>
                                    Control de stock.<br><br>
                                    1.- <input id="codigo" type="text" placeholder="Escanee un producto" value="0"><br><br>
                                    2.- <button class="btn label-success exportarStock">Exportar el inventario actual</button>
                                    3.- <button class="btn label-success exportarStock">Exportar las diferencias de inventario</button> 
                                    4.- <button class="btn label-success exportarStock">Actualizar el inventario</button>
                                </small>
                            </h3>
<!-- Data tables -->
<!--<link rel="stylesheet" type="text/css" href="assets-minified/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets-minified/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">

    /* Datatables init */

    $(document).ready(function() {
        $('#dynamic-table-example-1').dataTable();

        /* Add sorting icons */

        $("table.dataTable .sorting").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_asc").append('<i class="glyph-icon"></i>');
        $("table.dataTable .sorting_desc").append('<i class="glyph-icon"></i>');
        $('.exportarStock').click(function(){
            //actualizar el stock de los productos de cada linea, si todos los pendientes
            //de recibir son 0 entonces cambia estado de orden a Completly, si no lo pone a Parciality

            //window.open('http://google.com/','','width=600,height=400,left=50,top=50,toolbar=yes');
            $(location).attr('href','imprimir.php?id_warehouse=1'); 
                       
        });
        $('#codigo').val('');
        $('#codigo').focus();
        $.calcular_cantidad_nueva = function() {
            ean13 = $('#codigo').val();
            cantidad = parseInt($('#'+ean13).val()) + 1;
            $('#'+ean13).val(cantidad);

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
        $('#codigo').change(function(){
            ean13 = $('#codigo').val();
            if ($('#'+ean13).length) {
                $.calcular_cantidad_nueva();
                $('#codigo').val('');
                //guardar el dato en tabla store_physical_stock_tallas para luego actualizar el stock de
                //store_stock, store_stock_tallas y store_stock_available
                $.ajax({
			type: "POST",
			url: "ajax.php",
			data: "accion=guardar&tabla=store_physical_stock_tallas&id_stock=<?php echo $numerostock;?>&ean13="+ean13,
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
            }else{
                //guardar el dato en tabla store_physical_stock_no_barcode
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "accion=guardar&tabla=store_physical_stock_no_barcode&id_order=<?php echo $numerostock;?>&ean13="+ean13,
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
            $('#codigo').val(''); 
            $('#codigo').focus();
        });

    });

</script>

    <h2 class="title-hero">
        Almacén - Conteo de existencias
    </h2>
    <p class="title-lead">Control de stock.</p>

    <div class="divider"></div>

    

    <h2 class="title-hero">
        Almacén - Conteo de existencias
    </h2>
    <p class="title-lead">Control de stock.</p>

    <div class="example-box-wrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dynamic-table-example-1">
            <thead>
                <tr>
                    <th>Referencia</th>
                    <th>Descripcion</th>
                    <th>Total</th>                    
                    <th>1</th>
                    <th>1.5</th>
                    <th>2</th>
                    <th>2.5</th>
                    <th>3</th>
                    <th>3.5</th>
                    <th>4</th>
                    <th>4.5</th>
                    <th>5</th>
                    <th>5.5</th>
                    <th>6</th>
                    <th>6.5</th>
                    <th>7</th>
                    <th>7.5</th>
                    <th>8</th>
                    <th>8.5</th>
                    <th>9</th>
                    <th>9.5</th>
                    <th>10</th>
                    <th>10.5</th>
                    <th>11</th>
                    <th>11.5</th>
                    <th>12</th>
                </tr>
            </thead>
            <tbody>
<?php
                            $contador = 0;
                            while($row=mysql_fetch_array($sql_order_list)){
                                $reference = $row['reference'];
                                $description = $row['description'];
                                $id_image = $row['id_image'];
                                $price = $row['price'];
                                $warehouse_name = $row['warehouse'];
                                $total = $row['total'];
                                $codigouno = $row['codigo1'];
                                $uno = $row['1'];
                                $codigounopuntocinco = $row['codigo1.5'];                                
                                $unopuntocinco = $row['1.5'];
                                $codigodos = $row['codigo2'];                                
                                $dos = $row['2'];
                                $codigodospuntocinco = $row['codigo2.5'];                                
                                $dospuntocinco = $row['2.5'];
                                $codigotres = $row['codigo3'];                                
                                $tres = $row['3'];
                                $codigotrespuntocinco = $row['codigo3.5'];                                
                                $trespuntocinco = $row['3.5'];
                                $codigocuatro = $row['codigo4'];                                
                                $cuatro = $row['4'];
                                $codigocuatropuntocinco = $row['codigo4.5'];                                
                                $cuatropuntocinco = $row['4.5'];
                                $codigocinco = $row['codigo5'];                                
                                $cinco = $row['5'];
                                $codigocincopuntocinco = $row['codigo5.5'];                                
                                $cincopuntocinco = $row['5.5'];
                                $codigoseis = $row['codigo6'];                                
                                $seis = $row['6'];
                                $codigoseispuntocinco = $row['codigo6.5'];                                
                                $seispuntocinco = $row['6.5'];
                                $codigosiete = $row['codigo7'];                                
                                $siete = $row['7'];
                                $codigosietepuntocinco = $row['codigo7.5'];                                
                                $sietepuntocinco = $row['7.5'];
                                $codigoocho = $row['codigo8'];                                
                                $ocho = $row['8'];
                                $codigoochopuntocinco = $row['codigo8.5'];                                
                                $ochopuntocinco = $row['8.5'];
                                $codigonueve = $row['codigo9'];                                
                                $nueve = $row['9'];
                                $codigonuevepuntocinco = $row['codigo9.5'];                                
                                $nuevepuntocinco = $row['9.5'];
                                $codigodiez = $row['codigo10'];                                
                                $diez = $row['10'];
                                $codigodiezpuntocinco = $row['codigo10.5'];                                
                                $diezpuntocinco = $row['10.5'];
                                $codigoonce = $row['codigo11'];                                
                                $once = $row['11'];
                                $codigooncepuntocinco = $row['codigo11.5'];                                
                                $oncepuntocinco = $row['11.5'];
                                $codigodoce = $row['codigo12'];                                
                                $doce = $row['12'];
                                                        
                                $digitos = strlen($id_image);

                                switch ($digitos) {
                              case 1:
                                    $unidades = substr($id_image, 0, 1);
                                    $ruta = "http://asportshoes.com/store/img/p/".$unidades."/".$unidades."-cart_default.jpg";
                                    break;
                              case 2:
                                    $decenas = substr($id_image, 0, 1);
                                    $unidades = substr($id_image, 1, 1);
                                    $ruta = "http://asportshoes.com/store/img/p/".$decenas."/".$unidades."/".$decenas.$unidades."-cart_default.jpg";                  
                                    break;
                              case 3:
                                    $centenas = substr($id_image, 0, 1);
                                    $decenas = substr($id_image, 1, 1);
                                    $unidades = substr($id_image, 2, 1);
                                    $ruta = "http://asportshoes.com/store/img/p/".$centenas."/".$decenas."/".$unidades."/".$centenas.$decenas.$unidades."-cart_default.jpg";                  
                                    break;           
                                }                                
?>

                <tr class="gradeA">
                    <td><img src="<?php echo $ruta; ?>" alt=""><br><?php echo $reference;?></td>
                    <td><?php echo $description;?><br><b></b>Precio:</b> $ <?php echo number_format(round($price, 2),2,".",",");?></td>
                    <td class="resultado<?php echo $contador;?>" id=""><?php echo $total;?></td>                    
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigouno;?>" type="text" value="<?php echo $uno;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigounopuntocinco;?>" type="text" value="<?php echo $unopuntocinco;?>" readonly></td>                   
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigodos;?>" type="text" value="<?php echo $dos;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigodospuntocinco;?>" type="text" value="<?php echo $dospuntocinco;?>" readonly></td>                    
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigotres;?>" type="text" value="<?php echo $tres;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigotrespuntocinco;?>" type="text" value="<?php echo $trespuntocinco;?>" readonly></td>                    
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigocuatro;?>" type="text" value="<?php echo $cuatro;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigocuatropuntocinco;?>" type="text" value="<?php echo $cuatropuntocinco;?>" readonly></td>                    
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigocinco;?>" type="text" value="<?php echo $cinco;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigocincopuntocinco;?>" type="text" value="<?php echo $cincopuntocinco;?>" readonly></td>                  
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigoseis;?>" type="text" value="<?php echo $seis;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigoseispuntocinco;?>" type="text" value="<?php echo $seispuntocinco;?>" readonly></td>             
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigosiete;?>" type="text" value="<?php echo $siete;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigosietepuntocinco;?>" type="text" value="<?php echo $sietepuntocinco;?>" readonly></td>                 
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigoocho;?>" type="text" value="<?php echo $ocho;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigoochopuntocinco;?>" type="text" value="<?php echo $ochopuntocinco;?>" readonly></td>                  
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigonueve;?>" type="text" value="<?php echo $nueve;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigonuevepuntocinco;?>" type="text" value="<?php echo $nuevepuntocinco;?>" readonly></td>                   
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigodiez;?>" type="text" value="<?php echo $diez;?>" readonly></td>                 
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigodiezpuntocinco;?>" type="text" value="<?php echo $diezpuntocinco;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigoonce;?>" type="text" value="<?php echo $once;?>" readonly></td>                 
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigooncepuntocinco;?>" type="text" value="<?php echo $oncepuntocinco;?>" readonly></td>
                    <td><input style="height: 30px; width: 30px;" class="operando<?php echo $contador;?>" id="<?php echo $codigodoce;?>" type="text" value="<?php echo $doce;?>" readonly></td>                  
                </tr>

<?php 
                            }
                        }
                    break;
            }
            break;        
        }
?>                


            </tbody>
        </table>

		
        
    </div>

                        </div>

                    </div><!-- #page-content -->
                </div><!-- #page-content-wrapper -->