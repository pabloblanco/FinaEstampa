<?php

/* Consulta para saber todas las tablas de la base de datos
SHOW FULL TABLES FROM softhaus_store
Consulta para saber los campos de la tabla
SHOW COLUMNS FROM softhaus_store.store_order_history
*/

      $accion = $_POST['accion'];

      switch ($accion) {
            case 'guardar':
                  $tabla = $_POST['tabla'];
                  $id_order = $_POST['id_order'];
                  $ean13 = $_POST['ean13'];
                  if(!empty($tabla)) {
                        guardarCodigo($tabla, $id_order, $ean13);
                  }
                  break;
            case 'actualizar':
                  $tabla = $_POST['tabla'];
                  $ean13 = $_POST['ean13'];
                  $physical_quantity = $_POST['physical_quantity'];
                  $id_supply_order_detail = $_POST['id_supply_order_detail'];
                  if(!empty($tabla)) {
                        actualizarStock($tabla, $ean13, $physical_quantity, $id_supply_order_detail);
                  }
                  break;
            case 'actualizarOrder':
                  $tabla = $_POST['tabla'];
                  $ean13 = $_POST['ean13'];
                  $physical_quantity = $_POST['physical_quantity'];
                  $id_order_detail = $_POST['id_order_detail'];
                  if(!empty($tabla)) {
                        actualizarOrderStock($tabla, $ean13, $physical_quantity, $id_order_detail);
                  }
                  break;
            case 'exportarStock':
                /*Preparacion de la informacion que se mostrara en la vista*/
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
                  header('Content-type: application/vnd.ms-excel');
                  header("Content-Disposition: attachment; filename=archivo.xls");
                  header("Pragma: no-cache");
                  header("Expires: 0");
                  echo "<table border=1> ";
                  echo "                <tr>
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
                </tr>";
                
                        while($row=mysql_fetch_array($sql_order_list)){
                                $reference = $row['reference'];
                                $description = $row['description'];
                                $id_image = $row['id_image'];
                                $price = $row['price'];
                                $warehouse_name = $row['warehouse'];
                                $total = $row['total'];
                                $uno = $row['1'];
                                $unopuntocinco = $row['1.5'];
                                $dos = $row['2'];
                                $dospuntocinco = $row['2.5'];
                                $tres = $row['3'];
                                $trespuntocinco = $row['3.5'];
                                $cuatro = $row['4'];
                                $cuatropuntocinco = $row['4.5'];
                                $cinco = $row['5'];
                                $cincopuntocinco = $row['5.5'];
                                $seis = $row['6'];
                                $seispuntocinco = $row['6.5'];
                                $siete = $row['7'];
                                $sietepuntocinco = $row['7.5'];
                                $ocho = $row['8'];
                                $ochopuntocinco = $row['8.5'];
                                $nueve = $row['9'];
                                $nuevepuntocinco = $row['9.5'];
                                $diez = $row['10'];
                                $diezpuntocinco = $row['10.5'];
                                $once = $row['11'];
                                $oncepuntocinco = $row['11.5'];
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
                  echo "<tr> ";
?>                  
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
<?php                    
                  echo "</tr> ";
                        }
                  echo "</table> ";
                  break;                  
      }

      function guardarCodigo($tabla2, $order, $codigo)  {
            $con = mysql_connect('localhost','softhaus_store', '5P513S-9j@');
            mysql_select_db('softhaus_store', $con);
            
            switch ($tabla2) {
                  case 'store_supply_order_overflow':
                        $date_add = date("Y-m-d H:i:s");
                        $consulta =  "INSERT INTO `store_supply_order_overflow`";
                        $consulta =  $consulta."(`id_order`, `ean13`, `date_add`) ";
                        $consulta =  $consulta."VALUES ('".$order."','".$codigo."','".$date_add."')";
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        echo 'Código guardado';
                        mysql_free_result($sql);
                        mysql_close($con);
                        break;
                  case 'store_supply_order_no_barcode':
                        $date_add = date("Y-m-d H:i:s");
                        $consulta =  "INSERT INTO `store_supply_order_no_barcode`";
                        $consulta =  $consulta."(`id_order`, `ean13`, `date_add`) ";
                        $consulta =  $consulta."VALUES ('".$order."','".$codigo."','".$date_add."')";
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        echo 'Código guardado';
                        mysql_free_result($sql);
                        mysql_close($con);
                        break;
                  case 'store_order_no_barcode':
                        $date_add = date("Y-m-d H:i:s");
                        $consulta =  "INSERT INTO `store_order_no_barcode`";
                        $consulta =  $consulta."(`id_order`, `ean13`, `date_add`) ";
                        $consulta =  $consulta."VALUES ('".$order."','".$codigo."','".$date_add."')";
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        echo 'Código guardado';
                        mysql_free_result($sql);
                        mysql_close($con);
                        break;                  
            }
      }
      function actualizarStock($tabla2, $codigo, $cantidad, $id_order_detail)  {
            $con = mysql_connect('localhost','softhaus_store', '5P513S-9j@');
            mysql_select_db('softhaus_store', $con);
            
            switch ($tabla2) {
                  case 'store_stock':
                        $consulta =  "SELECT store_stock.*  ";
                        $consulta =  $consulta."FROM store_stock ";
                        $consulta =  $consulta."WHERE ean13 = '".$codigo."'";
                        $sql = mysql_query($consulta,$con);
            
                        $contar = mysql_num_rows($sql);
             
                        if($contar == 0){
                              echo "0 resultados para '<b>".$consulta."</b><br>'.";
                        }else{
                              while($row=mysql_fetch_array($sql)){
                                    $physical_quantity = $row['physical_quantity'];
                                    $usable_quantity = $row['usable_quantity'];                                    
                              }
                        }
                        $physical_total = $physical_quantity + $cantidad;
                        $usable_total = $usable_quantity + $cantidad;
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        $consulta =  "UPDATE `store_stock` ";
                        $consulta =  $consulta."SET `physical_quantity`=".$physical_total.", `usable_quantity`=".$usable_total." ";
                        $consulta =  $consulta."WHERE ean13 = '".$codigo."'";
                        
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        echo 'Stock actualizado';
                        
                        $consulta =  "SELECT store_supply_order_detail.*  ";
                        $consulta =  $consulta."FROM store_supply_order_detail ";
                        $consulta =  $consulta."WHERE id_supply_order_detail = ".$id_order_detail;
                        $sql = mysql_query($consulta,$con);
            
                        $contar = mysql_num_rows($sql);
             
                        if($contar == 0){
                              echo "0 resultados para '<b>".$consulta."</b><br>'.";
                        }else{
                              while($row=mysql_fetch_array($sql)){
                                    $quantity_received = $row['quantity_received'];
                              }
                        }
                        $quantity_received_total = $quantity_received + $cantidad;
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        $consulta =  "UPDATE `store_supply_order_detail` ";
                        $consulta =  $consulta."SET `quantity_received`=".$quantity_received_total." ";
                        $consulta =  $consulta."WHERE store_supply_order_detail.id_supply_order_detail = ".$id_order_detail;
                        
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        echo 'Orden de compra actualizada '.$quantity_received.' '.$quantity_received_total.' '.$id_order_detail;
                        
                        mysql_free_result($sql);
                        mysql_close($con);
                        break;
            }
      }
      function actualizarOrderStock($tabla2, $codigo, $cantidad, $id_order)  {
            $con = mysql_connect('localhost','softhaus_store', '5P513S-9j@');
            mysql_select_db('softhaus_store', $con);
            
            switch ($tabla2) {
                  case 'store_stock':
                        $consulta =  "SELECT store_stock.*  ";
                        $consulta =  $consulta."FROM store_stock ";
                        $consulta =  $consulta."WHERE ean13 = '".$codigo."'";
                        $sql = mysql_query($consulta,$con);
            
                        $contar = mysql_num_rows($sql);
             
                        if($contar == 0){
                              echo "0 resultados para '<b>".$consulta."</b><br>'.";
                        }else{
                              while($row=mysql_fetch_array($sql)){
                                    $physical_quantity = $row['physical_quantity'];
                                    $usable_quantity = $row['usable_quantity'];                                    
                              }
                        }
                        $physical_total = $physical_quantity - $cantidad;
                        $usable_total = $usable_quantity - $cantidad;
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        $consulta =  "UPDATE `store_stock` ";
                        $consulta =  $consulta."SET `physical_quantity`=".$physical_total.", `usable_quantity`=".$usable_total." ";
                        $consulta =  $consulta."WHERE ean13 = '".$codigo."'";
                        
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        echo 'Stock actualizado';
                        
                        $consulta =  "SELECT store_supply_order_detail.*  ";
                        $consulta =  $consulta."FROM store_supply_order_detail ";
                        $consulta =  $consulta."WHERE id_supply_order_detail = ".$id_order_detail;
                        $sql = mysql_query($consulta,$con);
            
                        $contar = mysql_num_rows($sql);
             
                        if($contar == 0){
                              echo "0 resultados para '<b>".$consulta."</b><br>'.";
                        }else{
                              while($row=mysql_fetch_array($sql)){
                                    $quantity_received = $row['quantity_received'];
                              }
                        }
                        $quantity_received_total = $quantity_received + $cantidad;
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        $consulta =  "UPDATE `store_supply_order_detail` ";
                        $consulta =  $consulta."SET `quantity_received`=".$quantity_received_total." ";
                        $consulta =  $consulta."WHERE store_supply_order_detail.id_supply_order_detail = ".$id_order_detail;
                        
                        if (!mysql_query($consulta)) {
                              $resultado2 = mysql_error($con);
                        }
                        echo 'Orden de compra actualizada '.$quantity_received.' '.$quantity_received_total.' '.$id_order_detail;
                        
                        mysql_free_result($sql);
                        mysql_close($con);
                        break;
            }
      }      
?>
