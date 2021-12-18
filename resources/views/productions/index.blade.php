@extends('template.main')

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li class="active"><strong>Usuarios</strong></li>
    </ol>     
@endsection

@section('helptitle' , 'Cómo agregar, editar y borrar usuarios.')
    
@section('helpbody')
    Aquí va el texto de ayuda de la sección.  
@endsection
    
@section('datamodal')
    <!-- Aquí va el texto de información extra de la sección. -->
@endsection

@section('content')
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">&Oacuterden de Producci&oacuten: {{ $production->idOrdenMaestra }}.{{ $production->consecutivo }}</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    
                                <div id="imprimible" class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- start -->
                                        <div class="row">
<!--                                             <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="invoice-head">
                                                    <div class="col-md-10 col-sm-12 col-xs-12 invoice-logo col-md-offset-1">
                                                        <img src="http://fina-estampa.com.mx/admin/public/assets/images/logo.png" class="img-reponsive">
                                                    </div>
                                                    <div id="codigoQR" class="col-md-1 col-sm-12 col-xs-12 invoice-head-info">
                                                        <input id="item_txt" type="hidden" value="{{ $production->idOrdenMaestra }}.{{ $production->consecutivo }}">
                                                    </div>                                                     
                                                </div>
                                            </div> -->

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="invoice-head">
                                                    <div class="col-md-11 col-sm-12 col-xs-12 invoice-title">
                                                        <h2 class="title pull-center" style="text-align: center; color: #000;"><b>C&EacuteDULA DE PRODUCCI&OacuteN</b></h2>
                                                    </div>
                                                    <div id="codigoQR" class="col-md-1 col-sm-12 col-xs-12 invoice-head-info">
                                                        <input id="item_txt" type="hidden" value="O{{ $production->idOrdenMaestra }}.{{ $production->consecutivo }}">
                                                    </div>                                                     
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover invoice-table">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center"><h4><b>PEDIDO</b></h4></td>
                                                                <td class="text-center"><h4><b>FECHA DE<br>PEDIDO</b></h4></td>
                                                                <td class="text-center"><h4><b>ENTRADA MAX<br>PRODUCCION</b></h4></td>
                                                                <td class="text-center"><h4><b>TELA</b></h4></td>
                                                                <td class="text-center"><h4><b>CLIENTE</b></h4></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"><h3><b>{{ $production->idOrdenMaestra }}.{{ $production->consecutivo }}</b></h3></td>
                                                                <td class="text-center"><h3><b>{{ $fechaCreacion }}</b></h3></td>
                                                                <td class="text-center"><h3><b>{{ $fechaMaxima }}</b></h3></td>
                                                                <td class="text-center"><h3><b>{{ $production->tejidoProducto }}</b></h3></td>
                                                                <td class="text-center"><h3><b>{{ $customer->usuario }}&nbsp{{ $customer->apellido }}</b></h3></td>                                                              
                                                            </tr>                                                            
                                                        </tbody>
                                                    </table>
                                                    <br><br>
                                                    <table class="table table-hover invoice-table">
                                                        <thead>
                                                            <tr>
                                                                <td colspan="2" class="text-center"><h4><b>TALLERO</b></h4></td>
                                                                <td class="text-center"><h4><b>ANCHO</b></h4></td>
                                                                <td colspan="2" class="text-center"><h4><b>CONSUMO</b></h4></td>
                                                                <td colspan="2" class="text-center"><h4><b>&nbsp</b></h4></td>
                                                                <td colspan="3" class="text-center"><h4><b>BORDADO</b></h4></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"><h4>MEDIDAS</h4></td>
                                                                <td class="text-center"><h4>Cliente(")</h4></td>
                                                                <td class="text-center"><h4>Patr&oacuten</h4></td>
                                                                <td class="text-center"><h4>Ajuste</h4></td>
                                                                <td class="text-center"><h4>Validado</h4></td>
                                                                <td colspan="2" class="text-center"><h4>ESPECIFICACIONES</h4></td>
                                                                <td colspan="3" class="text-center"><h4>{{ $production->iniciales }}</h4></td>
                                                            </tr>      
                                                            <tr>
                                                                <td class="text-center"><h4><b>CUELLO</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->cuelloMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>CUELLO</h4></td>
                                                                <td class="text-center"><h4>{{ $production->cuello }}</h4></td>
                                                                <td class="text-center"><h4>ENTRETELA</h4></td>
                                                                <td colspan="2" class="text-center"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4></td>
                                                            </tr>    
                                                            <tr>
                                                                <td class="text-center"><h4><b>PECHO</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->pechoMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>PUNO</h4></td>
                                                                <td class="text-center"><h4>{{ $puno }}</h4></td>
                                                                <td class="text-center"><h4>ENTRETELA</h4></td>
                                                                <td colspan="2" class="text-center"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4></td>
                                                            </tr>                                                                                                                                                   <tr>
                                                                <td class="text-center"><h4><b>CINTURA</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->cinturaMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>ALETILLA</h4></td>
                                                                <td class="text-center"><h4>{{ $production->aletilla }}</h4></td>
                                                                <td colspan="3" class="text-center"><h4>&nbsp</h4></td>                                                                
                                                            </tr>    
                                                            <tr>
                                                                <td class="text-center"><h4><b>CADERA</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->caderaMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>TIPO DE CORTE</h4></td>
                                                                <td class="text-center"><h4>{{ $production->corte }}</h4></td>
                                                                <td colspan="3" class="text-center"><h4>ANOTACIONES ESPECIALES/CALCULOS</h4></td>  
                                                            <tr>
                                                                <td class="text-center"><h4><b>MANGA</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->mangaMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>BOLSILLO</h4></td>
                                                                <td class="text-center"><h4>{{ $production->bolsillo }}</h4></td>
                                                                <td colspan="3" rowspan="6" class="text-center"><h4>&nbsp</h4></td> 
                                                            </tr>    
                                                            <tr>
                                                                <td class="text-center"><h4><b>PUNO</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->munecaMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>CONTRASTE</h4></td>
                                                                <td class="text-center"><h4>{{ $production->contrastes }}</h4></td>
                                                            </tr>                                                                                                                                                   <tr>
                                                                <td class="text-center"><h4><b>ESPALDA</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->espaldaMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>INSERTO</h4></td>
                                                                <td class="text-center"><h4>{{ $production->inserto }}</h4></td>
                                                            </tr>    
                                                            <tr>
                                                                <td class="text-center"><h4><b>SISA</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->sisaMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td rowspan="2" class="text-center"><h4>BOTON</h4></td>
                                                                <td rowspan="2" class="text-center"><h4>{{ $production->botones }}</h4></td>
                                                            <tr>
                                                                <td class="text-center"><h4><b>BICEP</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->bicepMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                            </tr>    
                                                            <tr>
                                                                <td class="text-center"><h4><b>LARGO</b></h4></td>
                                                                <td class="text-center"><h4>{{ $production->deseadoMedida }}</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>COSTURA</h4></td>
                                                                <td class="text-center"><h4>{{ $production->costura }}</h4></td>
                                                            </tr>                                          
                                                        </tbody>
                                                    </table>  
                                                    <br><br>
                                                    <table class="table table-hover invoice-table">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center"><h4><b>&Aacuterea</b></h4></td>
                                                                <td class="text-center"><h4><b>FECHA</b></h4></td>
                                                                <td class="text-center"><h4><b>FIRMA</b></h4></td>
                                                                <td class="text-center"><h4><b>COMENTARIOS</b></h4></td>
                                                                <td class="text-center"><h4><b>ERROR</b></h4></td>
                                                                <td class="text-center"><h4><b>APROBACI&OacuteN</b></h4></td>
                                                                <td class="text-center"><h4><b>FECHA EXPR&EacuteS</b></h4></td>                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"><h4>TRAZO</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td rowspan="2" class="text-center"><h4>
                                                                    @csrf
                                                                    <input type="hidden" name="idUsuario" class="form-control" value="{{ $production->idUsuario }}">  
                                                                    <input type="hidden" name="idOrden" class="form-control" value="{{ $production->idAutoincrementable }}">
                                                                    <b><input id="fechaExpress" type="text" name="fechaExpress" class="form-control datepicker text-center" value="{{ $production->fechaExpress }}" data-fechaAnterior="{{ $production->fechaExpress }}" data-format="D, dd MM yyyy" data-fechaAnterior="{{ $production->fechaExpress }}" style="font-size: 20px;"></b>
                                                                    &nbsp</h4></td>
                                                            </tr>  
                                                            <tr>
                                                                <td class="text-center"><h4>CORTE</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                            </tr> 
                                                             <tr>
                                                                <td class="text-center"><h4>FUSI&OacuteN</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td rowspan="2" class="text-center">
                                                                    <h4>FECHA PLANCHA<br>
                                                                    <b><input id="fechaPlancha" type="text" name="fechaPlancha" class="form-control datepicker text-center" value="{{ $production->fechaPlancha }}" data-fechaAnterior="{{ $production->fechaPlancha }}" data-format="D, dd MM yyyy" style="font-size: 20px;"></b>
                                                                    </h4></td>
                                                            </tr>  
                                                            <tr>
                                                                <td class="text-center"><h4>BORDADO</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><h4>COSTURA</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td rowspan="3" class="text-center"><h4>FECHA SALIDA<br>TALLER<br>
                                                                    <b><input id="fechaSalida" type="text" name="fechaSalida" class="form-control datepicker text-center" value="{{ $production->fechaSalida }}" data-fechaAnterior="{{ $production->fechaSalida }}" data-format="D, dd MM yyyy" style="font-size: 20px;"></b></h4></td>
                                                            </tr>  
                                                            <tr>
                                                                <td class="text-center"><h4>OJAL</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><h4>BOT&OacuteN</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                                <td class="text-center"><h4>&nbsp</h4></td>
                                                            </tr>                                                                                                                                                   <tr>
                                                                <td colspan="2" rowspan="2" class="text-center"><h4>COMENTARIOS<br>GENERALES</h4></td>
                                                                <td colspan="4" rowspan="2" class="text-center"><textarea class="form-control" cols="5" id="field-6">{{ $production->informacion }}</textarea></td>
                                                                <td rowspan="2" class="text-center"><h4>VALIDACI&OacuteN</h4></td>
                                                            </tr>                                                                                             
                                                        </tbody>
                                                    </table> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br><br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">                                                                    
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                <a id="btnImprimir" href="#" target="_blank" class="btn btn-purple btn-md"><i class="fa fa-print"></i> &nbsp; Imprimir Hoja Viajera </a>        
                                                <a href="#" target="_blank" class="btn btn-orange btn-md"><i class="fa fa-send"></i> &nbsp; Enviar </a>        
                                            </div>
                                        </div>
                                        <!-- end -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
@endsection

@section('counter1')
                <div class="project-info">
                    <div class="block1">
                        <div class="data">
                            <span class='title'>Ordenes&nbsp;Nuevas</span>
                            <span class='total'>{{ $orders_total }}</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class='title'>Visitantes</span>
                            <span class='total'>{{ $customers_total }}</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_visitors">...</span>
                        </div>
                    </div>
                </div>
@endsection

@section('counter2')
                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-shopping-cart icon-md icon-rounded icon-primary'></i>
                                            <div class="stats">
                                                <h4><strong>{{ $orders_total }}</strong></h4>
                                                <span>Ordenes de venta</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-glass icon-md icon-rounded icon-orange'></i>
                                            <div class="stats">
                                                <h4><strong>{{ $products_total }}</strong></h4>
                                                <span>Productos producidos</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-dollar icon-md icon-rounded icon-purple'></i>
                                            <div class="stats">
                                                <h4><strong>$ {{ $caja }}</strong></h4>
                                                <span>Caja</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-users icon-md icon-rounded icon-warning'></i>
                                            <div class="stats">
                                                <h4><strong>{{ $customers_total }}</strong></h4>
                                                <span>Clientes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End .row -->
                            </div>
                        </section>
                    </div>
@endsection

@section('styles')

        <!-- CORE CSS FRAMEWORK - START -->
        <link href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/bootstrap/css/production.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="{{ asset('assets/plugins/datatables/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" media="screen"/> 
        <link href="{{ asset('assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/uikit/css/uikit.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/uikit/vendor/codemirror/codemirror.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/uikit/css/components/htmleditor.css') }}" rel="stylesheet" type="text/css" media="screen"/>   
        <link href="{{ asset('assets/plugins/datepicker/css/datepicker.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/daterangepicker/css/daterangepicker-bs3.css') }}"  rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/timepicker/css/timepicker.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ asset('assets/plugins/datetimepicker/css/datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="{{ asset('assets/css/production.style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

@endsection

@section('scripts')

        <!-- CORE JS FRAMEWORK - START --> 
        <script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/js/jquery.easing.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>  
        <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/viewport/viewportchecker.js') }}" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery-ui/smoothness/jquery-ui.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/datepicker/js/datepicker.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/daterangepicker/js/moment.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/timepicker/js/timepicker.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/datetimepicker/js/datetimepicker.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') }}"  type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js') }}"  type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/typeahead/typeahead.bundle.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/typeahead/handlebars.min.js') }}"  type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/multi-select/js/jquery.multi-select.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/plugins/multi-select/js/jquery.quicksearch.js') }}" type="text/javascript"></script> 
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- Scripts QR Generation -->
        <script src="{{ asset('assets/js/qrcode.js') }}"></script>
        <!-- Scripts QR Generation - END --> 

        <!-- CORE TEMPLATE JS - START --> 
        <script src="{{ asset('assets/js/scripts.productions.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/js/imprimir.productions.js') }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/chart-sparkline.js') }}" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

        <!-- Scripts Laravel Auth -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Scripts Laravel Auth - END -->

   
        <!-- Scripts QR Generation -->
        <script> 

            var miCodigoQR = new QRCode("codigoQR");
            $(document).ready(function() {
                var cadena = $("#item_txt").val();
                if (cadena == "") {
                    alert("Ingresa un texto");
                    $("#item_txt").focus();
                }else{
                    miCodigoQR.makeCode(cadena);
                }
            });
        </script>    
        <!-- Scripts QR Generation - END --> 
        
@endsection