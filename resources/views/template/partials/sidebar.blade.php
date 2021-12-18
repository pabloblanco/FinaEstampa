
                <!-- MAIN MENU - START -->
                @guest
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
                </div>
                <!-- MAIN MENU - END -->
                @else
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
                    
                    <!-- USER INFO - START -->                    
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="#">
                                <img src="https://fina-estampa.com.mx/admin/public/data/profile/profile.png" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="#">{{ Auth::user()->name }}</a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title">Administrador</p>

                        </div>

                    </div>
    <!-- Authentication Links -->
                    <ul class='wraplist'>   
                        <li @yield('dashboard_active')> 
                            <a href="/admin/public/home">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span><span class="label label-orange nosubmenu">HOT</span>
                            </a>
                        </li>
                        <li @yield('usuarios_active')> 
                            <a href="/admin/public/users">
                                <i class="fa fa-user"></i>
                                <span class="title">Usuarios</span>
                            </a>
                        </li>
                        <li @yield('clientes_active', 'class=""')> 
                            <a href="javascript:;">
                                <i class="fa fa-group"></i>
                                <span class="title">Clientes</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a @yield('lista_de_clientes_active', 'class=""') href="/admin/public/customers">Lista de clientes<span class="label label-warning">1</span></a>
                                </li>
                            </ul>
                        </li>
                        <li @yield('ordenes_active', 'class=""')> 
                            <a href="javascript:;">
                                <i class="fa fa-credit-card"></i>
                                <span class="title">Órdenes</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a @yield('ordenes_maestras_active', 'class=""') href="/admin/public/masters">Lista de órdenes</a>
                                </li>
                                <li>
                                    <a @yield('edicion_masiva_active', 'class=""') href="/admin/public/editions">Edición masiva<span class="label label-success nosubmenu">NEW</span></a>
                                </li>      
                                <li>
                                    <a @yield('control_procesos_active', 'class=""') href="/admin/public/processes">Control de procesos<span class="label label-success nosubmenu">NEW</span></a>
                                </li>  
                            </ul>
                        </li>
                        <li @yield('reportes_active', 'class=""')> 
                            <a href="#">
                                <i class="fa fa-print"></i>
                                <span class="title">Reportes</span><span class="label label-orange nosubmenu">HOT</span>
                            </a>
                        </li>
                        <li @yield('configuracion_active', 'class=""')> 
                            <a href="#">
                                <i class="fa fa-gear"></i>
                                <span class="title">Configuración</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a @yield('configuracion_general_active', 'class=""') href="/admin/public/configuration">General</a>
                                </li>
                                <li>
                                    <a @yield('configuracion_emailing_active', 'class=""') href="/admin/public/emailing">Emailing</a>
                                </li>                                
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- MAIN MENU - END -->
                @endguest             
