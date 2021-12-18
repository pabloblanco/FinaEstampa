<?php
echo '
            <div class="page-sidebar ">


                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="ui-profile.html">
                                <img src="data/profile/profile.png" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="ui-profile.html">José Godinez</a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title">Encargado de almacén</p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class="wraplist">	


                        <li class="open"> 
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Tablero de control</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span class="title">Catálogo</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="index.php/controller=productos">Productos</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=categorias">Categorías</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=atributos">Atributos</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=caracteristicas">Características</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=fabricantes">Fabricantes</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=proveedores">Proveedores</a>
                                </li>
                            </ul>                            
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-credit-card"></i>
                                <span class="title">Pedidos</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="index.php/controller=pedidos">Pedidos</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=facturas">Facturas</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=devoluciones">Devoluciones</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=requiciciones">Requiciciones</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=notascredito">Notas de crédito</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=estadospedidos">Estados</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=alertasnotificaciones">Alertas & Notificaciones</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-group"></i>
                                <span class="title">Clientes</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="index.php/controller=clietes">Clientes</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=direcciones">Direcciones</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=grupos">Grupos</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=ordenes">Ordenes de compra</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=servicio">Servicio a clientes</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=contacto">Contacto</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=tratamiento">Tratamiento</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-truck"></i>
                                <span class="title">Transporte</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="index.php/controller=transportistas">Transportistas</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=preferencias">Preferencias</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-envelope"></i>
                                <span class="title">Mailbox</span>
                                <span class="arrow "></span><span class="label label-orange">4</span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="mail-inbox.html">Inbox</a>
                                </li>
                                <li>
                                    <a class="" href="mail-compose.html">Compose</a>
                                </li>
                                <li>
                                    <a class="" href="mail-view.html">View</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-wrench"></i>
                                <span class="title">Preferencias</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="index.php/controller=configuracion">Configuración</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=pedidos">Pedidos</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=productos">Productos</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=clientes">Clientes</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-cog"></i>
                                <span class="title">Administración</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="index.php/controller=empleados">Empleados</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=perfiles">Perfiles</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=permisos">Permisos</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=menus">Menus</a>
                                </li>                                
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-archive"></i>
                                <span class="title">Existencias</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="index.php/controller=almacenes">Almacenes</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=existencias">Gestión de existencias</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=movimientos">Movimientos de stock</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=estado">Estado inmediato de existencias</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=cobertura">Cobertura de stock</a>
                                </li>
                                <li>
                                    <a class="" href="index.php/controller=pedidos">Pedidos de materiales</a>
                                </li>
                                <li>
                                    <a class="" href="javascript:;">Control de almacén</a>
                                    <ul class="sub-menu" >
                                        <li>
                                            <a class="" href="javascript:;">Entradas</a>
                                            <ul class="sub-menu" >
                                                <li>
                                                    <a class="" href="index.php?controller=SupplyOrders&view=ListOrders&id_lang=3&id_warehouse=1">Recepciones</a>
                                                </li>
                                                <li>
                                                    <a class="" href="index.php/controller=almacenes">Devoluciones</a>
                                                </li>
                                                <li>
                                                    <a class="" href="index.php/controller=almacenes">Préstamos</a>
                                                </li>
                                            </ul>  
                                        </li>
                                        <li>
                                            <a class="" href="javascript:;">Salidas</a>
                                            <ul class="sub-menu" >
                                                <li>
                                                    <a class="" href="index.php?controller=CustomerOrders&view=ListOrders&id_lang=1&id_warehouse=0">Entregas</a>
                                                </li>
                                                <li>
                                                    <a class="" href="index.php/controller=almacenes">Préstamos</a>
                                                </li>
                                            </ul>  
                                        </li>                                        
                                    </ul>                                        
                                </li>                                
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- MAIN MENU - END -->



                <div class="project-info">

                    <div class="block1">
                        <div class="data">
                            <span class="title">Ordenes&nbsp;Nuevas</span>
                            <span class="total">2,345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class="title">Clientes</span>
                            <span class="total">345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_visitors">...</span>
                        </div>
                    </div>

                </div>



            </div>
';
?>