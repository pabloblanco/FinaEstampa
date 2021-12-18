@extends('template.main')

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li class="active"><strong>Configuración</strong></li>
    </ol>     
@endsection

@section('helptitle' , 'Cómo agregar, editar y borrar usuarios.')
    
@section('helpbody')
    Aquí va el texto de ayuda de la sección.  
@endsection
    
@section('datamodal')

@endsection

@section('content')
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="alert" class="alert alert-success alert-dismissible fade in aria-hidden" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            <strong>Total de Clientes:</strong><span id="users-total"> </span>
                        </div>
                        <div class="page-title">
                            <div class="pull-left">
                                <h1 class="title">CONFIGURACION</h1>                            
                            </div>
                        </div>
                    </div>   
                    <div class="clearfix"></div>                                     
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">COMUNICACION CON EL CLIENTE</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group has-focus">
                                                <label class="form-label" for="field-12">{{ $fechaMaximaProduccion->campo }}</label><br>
                                                <span class="desc">Cantidad de d&iacuteas</span>
                                                <div class="controls">
                                                    @csrf
                                                    <input type="hidden" name="idUsuario" class="form-control" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="fechaMaximaProduccionCampo" class="form-control" value="{{ $fechaMaximaProduccion->campo }}">
                                                    <input type="hidden" name="fechaCitaCampo" class="form-control" value="{{ $fechaCita->campo }}">
                                                    <input type="text" class="form-control" name="fechaMaximaProduccion" placeholder="I am a focused field " value="{{ $fechaMaximaProduccion->valor }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group has-focus">
                                                <label class="form-label" for="field-12">{{ $fechaCita->campo }}</label><br>
                                                <span class="desc">Cantidad de d&iacuteas</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" name="fechaCita" placeholder="I am a focused field " value="{{ $fechaCita->valor }}">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button id="btn-submit001" type="button" class="btn btn-primary btn-block">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>      
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">VARIABLES DEL ERP</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>   
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">DEPURACION</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        
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
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
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
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
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
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- CORE TEMPLATE JS - START --> 
        <script src="{{ asset('assets/js/scripts.customers.js') }}" type="text/javascript"></script> 
        <!-- <script src="{{ asset('assets/js/functions.customers.js') }}" type="text/javascript"></script> -->
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/chart-sparkline.js') }}" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

        <!-- Scripts Laravel Auth -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Scripts Laravel Auth - END -->

<script> 
    // var miCodigoQR = new QRCode("codigoQR");
    $(document).ready(function() {
        $("#btn-submit001").click(function(e){
            e.preventDefault();
            var opcion = confirm("Confirma los cambios?");
            if (opcion == true) {
                var _token = $("input[name='_token']").val();
                var idUsuario = $("input[name='idUsuario']").val();
                var fechaMaximaProduccionCampo = $("input[name='fechaMaximaProduccionCampo']").val();
                var fechaCitaCampo = $("input[name='fechaCitaCampo']").val();
                var fechaMaximaProduccion = $("input[name='fechaMaximaProduccion']").val();
                var fechaCita = $("input[name='fechaCita']").val();

                $.ajax({
                    url: "{{ route('postDataConfiguration') }}",
                    type:'POST',

                    data: {_token:_token, idUsuario:idUsuario, fechaMaximaProduccionCampo:fechaMaximaProduccionCampo, fechaCitaCampo:fechaCitaCampo, fechaMaximaProduccion:fechaMaximaProduccion, fechaCita:fechaCita},

                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            alert(data.success);
                            //$("#cerrarDialogo").trigger("click");
                        }else{
                            printErrorMsg(data.error);
                        }
                    }
                });
            } else {
                mensaje = "Has clickado Cancelar";
            }
        });
    }); 
</script>

@endsection