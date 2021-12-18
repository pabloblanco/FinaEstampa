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
<div class="modal fade in" id="ultraModal-1" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true" style="display: none; padding-right: 0px;">
    <!-- <div class="modal-backdrop fade in" style="height: 1015px;"></div> -->
    <div class="modal-dialog" style="width: 65%">
        <div class="modal-content">
            <div class="modal-header">
                <button id="cerrarDialogo" type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Editando registro</h4>
            </div>
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            <form id="form-data" action="{{ route('postDataDetails') }}" method="post" name="formulario1">
                @csrf
                <div id="innerUltraModal-1" class="modal-body">

                </div>
                <div class="modal-footer">
                        <button class="btn btn-success btn-submit">Guardar</button>
                </div>
            </form>            
        </div>
    </div>
</div>

<script> 
    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();
            var opcion = confirm("Confirma los cambios?");
            if (opcion == true) {
                var _token = $("input[name='_token']").val();
                var idUsuario = $("input[name='idUsuario']").val();
                var idOrdenDetalle = $("input[name='idOrdenDetalle']").val();
                var idMedida = $("input[name='idMedida']").val();

                var ordenDetalleTejido = $("input[name='ordenDetalleTejido']").val();
                var ordenDetallePersonalizado = $("input[name='ordenDetallePersonalizado']").val();

                var estatusConsecutivo = $("input[name='estatusConsecutivo']").val();
                var estatusEstatus = $("input[name='estatusEstatus']").val();
                var estatusComentarios = $("textarea[name='estatusComentarios']").val();

                var medidaCuello = $("input[name='medidaCuello']").val();
                var medidaPecho = $("input[name='medidaPecho']").val();
                var medidaAbdomen = $("input[name='medidaAbdomen']").val();
                var medidaCadera = $("input[name='medidaCadera']").val();
                var medidaMangaLongitud = $("input[name='medidaMangaLongitud']").val();
                var medidaEspalda = $("input[name='medidaEspalda']").val();
                var medidaTronco = $("input[name='medidaTronco']").val();
                var medidaPuno = $("input[name='medidaPuno']").val();
                var medidaSisa = $("input[name='medidaSisa']").val();
                var medidaBicep = $("input[name='medidaBicep']").val();

                var distintivoContrastes = $("input[name='distintivoContrastes']").val();
                var distintivoInserto = $("input[name='distintivoInserto']").val();
                var distintivoBotones = $("input[name='distintivoBotones']").val();
                var distintivoIniciales = $("input[name='distintivoIniciales']").val();
                var distintivoInformacion = $("textarea[name='distintivoInformacion']").val();

                var estiloCuello = $("input[name='estiloCuello']").val();
                var estiloAletilla = $("input[name='estiloAletilla']").val();
                var estiloPuno = $("input[name='estiloPuno']").val();
                var estiloCorte = $("input[name='estiloCorte']").val();
                var estiloBolsillo = $("input[name='estiloBolsillo']").val();

                $.ajax({
                    url: "{{ route('postDataDetails') }}",
                    type:'POST',

                    data: {_token:_token, idUsuario:idUsuario, idOrdenDetalle:idOrdenDetalle, idMedida:idMedida, ordenDetalleTejido:ordenDetalleTejido, ordenDetallePersonalizado:ordenDetallePersonalizado, estatusConsecutivo:estatusConsecutivo, estatusEstatus:estatusEstatus, estatusComentarios:estatusComentarios, medidaCuello:medidaCuello, medidaPecho:medidaPecho, medidaAbdomen:medidaAbdomen, medidaCadera:medidaCadera, medidaMangaLongitud:medidaMangaLongitud, medidaEspalda:medidaEspalda, medidaTronco:medidaTronco, medidaPuno:medidaPuno, medidaSisa:medidaSisa, medidaBicep:medidaBicep, distintivoContrastes:distintivoContrastes, distintivoInserto:distintivoInserto, distintivoBotones:distintivoBotones, distintivoIniciales:distintivoIniciales, distintivoInformacion:distintivoInformacion, estiloCuello:estiloCuello, estiloAletilla:estiloAletilla, estiloPuno:estiloPuno, estiloCorte:estiloCorte, estiloBolsillo:estiloBolsillo},

                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            alert(data.success);
                            $("#cerrarDialogo").trigger("click");
                            $(".modal-backdrop").remove();
                            $("#ultraModal-1").removeClass("in");
                        }else{
                            printErrorMsg(data.error);
                        }
                    }
                });
            } else {
                mensaje = "Has clickado Cancelar";
            }
        }); 


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });

// function enviar_formulario(){ 
//    document.formulario1.submit() 
// } 
</script>
@endsection

@section('content')

<script> 



// function enviar_formulario(){ 
//    document.formulario1.submit() 
// } 
</script>    

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">
                            <div class="pull-left">
                                <h1 class="title">ORDENES</h1>                            
                            </div>
                        </div>
                    </div>   
                    <div class="clearfix"></div>                                     
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">DETALLE DE LA ORDEN MAESTRA {{ $order_id }}</h2>
                                <p id="tituloProduccion" style="display: none;">{{ $orders_total }}</p>
                                <div class="actions panel_actions pull-right">
                                    <button id="impresionGlobal" class="btn btn-orange btn-icon bottom15 right15">
                                            <i class=" fa fa-print"></i> &nbsp; <span>Imprimir todas</span>
                                        </button>
                                    

<script> 
    $(document).ready(function() {
  
        function printErrorMsg(msg) {
            console.log(msg);
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

    });

// function enviar_formulario(){ 
//    document.formulario1.submit() 
// } 
</script>                                    
<!--                                     <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i> -->
                                </div>
                            </header>
                            <div class="content-body">    
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->

                                        <table class="table table-striped" id="example2" >
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Orden</th>
                                                    <th>Cliente</th>
                                                    <th>Compromiso</th>
                                                    <th>Tejido</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Personalizado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($details as $detail)
                                                <tr class="odd gradeX">
                                                    <td>{{ $detail->idAutoincrementable }}</td>
                                                    <td>{{ $order_id.".".$detail->consecutivo }}</td>
                                                    <td>{{ $detail->nombreCompletoCliente }}</td>
                                                    <td>
                                                        @if(($aTiempo == 'SI'))
                                                            <span class="badge badge-lg badge-success">a tiempo</span>
                                                        @else
                                                            <span class="badge badge-lg badge-danger">demorado</span>
                                                        @endif
                                                    <td>{{ $detail->tejidoProducto }}</td>
                                                    <td>{{ $detail->cantidadProducto }}</td>
                                                    <td>{{ $detail->precioProducto }}</td>
                                                    <td>
                                                        @if(($detail->esPersonalizado == 'SI') || ($detail->esPersonalizado == 'si'))
                                                            <span class="badge badge-lg badge-success">{{ $detail->esPersonalizado }}</span>
                                                        @else
                                                            <span class="badge badge-lg badge-danger">{{ $detail->esPersonalizado }}</span>
                                                        @endif
                                                    </td>                                                     
                                                    <td>
                                                        <a href="/admin/public/productions/{{ $detail->idAutoincrementable }}" class="btn btn-primary">
                                                        <input type="hidden" name="idOrdenMaestra" class="form-control" value="{{ $detail->idOrdenMaestra }}">
                                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                        </a>
                                                        <a id="{{ $detail->idAutoincrementable }}" href="#ultraModal-1" data-toggle="modal" class="edition2 btn btn-danger"">
                                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                        </a>
                                                        <a href="#" onclick="return confirm('Seguro desea eliminarla?')" class="btn btn-warning">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                        </a>
                                                    </td>    
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>

                                        <!--  *********************************************** -->

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>  
                    <div id="imprimible" style="display: none;" class="row">Mensaje en el div invisible</div>                 
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

        <!-- Scripts QR Generation -->
        <script src="{{ asset('assets/js/qrcode.js') }}"></script>
        <!-- Scripts QR Generation - END --> 

        <!-- CORE TEMPLATE JS - START --> 
        <script src="{{ asset('assets/js/scripts.details.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assets/js/imprimir.ordenesproduccion.js') }}" type="text/javascript"></script>
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/chart-sparkline.js') }}" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

        <!-- Scripts Laravel Auth -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Scripts Laravel Auth - END -->

@endsection