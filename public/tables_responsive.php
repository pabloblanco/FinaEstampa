                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Almacén - Salidas</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Control de la salida de productos.</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="table-responsive" data-pattern="priority-columns">

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
                                            No se encontraron resultados para esta selección.
<?php  
                        }else{
?>                                            
                                            <table cellspacing="0" id="tech-companies-1" class="table table-small-font table-bordered table-striped">
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
                                </div>
                            </div>
                        </section>
                    </div>