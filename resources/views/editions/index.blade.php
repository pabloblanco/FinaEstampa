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
    <div class="modal-backdrop fade in" style="height: 1015px;"></div>
    <div class="modal-dialog" style="width: 65%">
        <div class="modal-content">
            <div class="modal-header">
                <button id="cerrarDialogo" type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Editando registro</h4>
            </div>
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            <form id="form-data" action="{{ route('postDataMasters') }}" method="post" name="formulario1">
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

                var nombrePersonaDireccionDeEnvio = $("input[name='nombrePersonaDireccionDeEnvio']").val();
                var coloniaDireccionDeEnvio = $("input[name='coloniaDireccionDeEnvio']").val();
                var nombrePersonaDireccionDeFacturacion = $("input[name='nombrePersonaDireccionDeFacturacion']").val();
                var coloniaDireccionDeFacturacion = $("input[name='coloniaDireccionDeFacturacion']").val();
                var apellidosPersonaDireccionDeEnvio = $("input[name='apellidosPersonaDireccionDeEnvio']").val();
                var codigoPostalDireccionDeEnvio = $("input[name='codigoPostalDireccionDeEnvio']").val();
                var apellidosPersonaDireccionDeFacturacion = $("input[name='apellidosPersonaDireccionDeFacturacion']").val();
                var codigoPostalDireccionDeFacturacion = $("input[name='codigoPostalDireccionDeFacturacion']").val();
                var calleDireccionDeEnvio = $("input[name='calleDireccionDeEnvio']").val();
                var ciudadDireccionDeEnvio = $("input[name='ciudadDireccionDeEnvio']").val();
                var calleDireccionDeFacturacion = $("input[name='calleDireccionDeFacturacion']").val();
                var ciudadDireccionDeFacturacion = $("input[name='ciudadDireccionDeFacturacion']").val();
                var numeroInteriorDireccionDeEnvio = $("input[name='numeroInteriorDireccionDeEnvio']").val();
                var estadoDireccionDeEnvio = $("input[name='estadoDireccionDeEnvio']").val();
                var numeroInteriorDireccionDeFacturacion = $("input[name='numeroInteriorDireccionDeFacturacion']").val();
                var estadoDireccionDeFacturacion = $("input[name='estadoDireccionDeFacturacion']").val();
                var numeroExteriorDireccionDeEnvio = $("input[name='numeroExteriorDireccionDeEnvio']").val();
                var paisDireccionDeEnvio = $("input[name='paisDireccionDeEnvio']").val();
                var numeroExteriorDireccionDeFacturacion = $("input[name='numeroExteriorDireccionDeFacturacion']").val();
                var paisDireccionDeFacturacion = $("input[name='paisDireccionDeFacturacion']").val();
                var numeroTelefonoDireccionDeFacturacion = $("input[name='numeroTelefonoDireccionDeFacturacion']").val();
                var correoElectronicodireccionDeFacturacion = $("input[name='correoElectronicodireccionDeFacturacion']").val();
                var RazonSocialdireccionDeFacturacion = $("input[name='RazonSocialdireccionDeFacturacion']").val();
                var RFCdireccionDeFacturacion = $("input[name='RFCdireccionDeFacturacion']").val();
                var notasDelPedido = $("input[name='notasDelPedido']").val();

                $.ajax({
                    url: "{{ route('postDataMasters') }}",
                    type:'POST',

                    data: {_token:_token, idUsuario:idUsuario, nombrePersonaDireccionDeEnvio:nombrePersonaDireccionDeEnvio, coloniaDireccionDeEnvio:coloniaDireccionDeEnvio, nombrePersonaDireccionDeFacturacion:nombrePersonaDireccionDeFacturacion, coloniaDireccionDeFacturacion:coloniaDireccionDeFacturacion, apellidosPersonaDireccionDeEnvio:apellidosPersonaDireccionDeEnvio, codigoPostalDireccionDeEnvio:codigoPostalDireccionDeEnvio, apellidosPersonaDireccionDeFacturacion:apellidosPersonaDireccionDeFacturacion, codigoPostalDireccionDeFacturacion:codigoPostalDireccionDeFacturacion, calleDireccionDeEnvio:calleDireccionDeEnvio, ciudadDireccionDeEnvio:ciudadDireccionDeEnvio, calleDireccionDeFacturacion:calleDireccionDeFacturacion, ciudadDireccionDeFacturacion:ciudadDireccionDeFacturacion, numeroInteriorDireccionDeEnvio:numeroInteriorDireccionDeEnvio, estadoDireccionDeEnvio:estadoDireccionDeEnvio, paisDireccionDeEnvio, numeroExteriorDireccionDeFacturacion:numeroExteriorDireccionDeFacturacion, paisDireccionDeFacturacion:paisDireccionDeFacturacion, numeroTelefonoDireccionDeFacturacion:numeroTelefonoDireccionDeFacturacion, correoElectronicodireccionDeFacturacion:correoElectronicodireccionDeFacturacion, RazonSocialdireccionDeFacturacion:RazonSocialdireccionDeFacturacion, RFCdireccionDeFacturacion:RFCdireccionDeFacturacion, notasDelPedido:notasDelPedido},

                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            alert(data.success);
                            $("#cerrarDialogo").trigger("click");
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

    function CheckDiferentValue(maestra, orden, consecutivo, ordenSeleccionado, actual, ordenActual){
        tdEstadoActual = 'estadoActual' + maestra + '.' + consecutivo;
        inputOrdenActual = 'ordenActual' + maestra + '.' + consecutivo;
        ordenActual = document.getElementsByName(inputOrdenActual)[0].value;
        if (parseInt(ordenSeleccionado, 10) > parseInt(ordenActual, 10)){
            sucesor = parseInt(ordenActual, 10) + 1;
            if (parseInt(ordenSeleccionado, 10) > sucesor){
                console.log('S men A ' + parseInt(ordenActual, 10) + ' ' + sucesor);    
                result = confirm('Seguro que desea saltarse los procesos anteriores de la orden ' + orden + '.' + consecutivo + '?');
                nombreSelect = 'variables' + maestra + '.' + consecutivo;
                //seleccionado = $("#variables7084.1 :selected").text();
                if (result) {
                    console.log('S may A + 1');
                    var _token = $("input[name='_token']").val();
                    var idUser = $("input[name='idUsuario']").val();
                    $.ajax({
                        url: "{{ route('postDataEditions') }}",
                        type:'POST',
                        data: {_token:_token, idUser:idUser, orden:orden, consecutivo:consecutivo, ordenSeleccionado:ordenSeleccionado, actual:actual, ordenActual:ordenActual},

                        success: function(data) {
                            if($.isEmptyObject(data.error)){
                                if(data.debug == 1){
                                    console.log(data.success);
                                    console.log(data.debug);
                                }    
                                document.getElementById(tdEstadoActual).textContent = data.success;
                                document.getElementsByName(inputOrdenActual)[0].value = ordenSeleccionado;
                                console.log('actual '+inputOrdenActual+' seleccionado '+ordenSeleccionado);
                            }else{
                                if(data.debug == 1){
                                    console.log(data.error);
                                }
                            }
                        }
                    });
                }else{ 
                    mensaje = 'S = A + 1 ' + parseInt(ordenActual, 10) + ' ' + sucesor;
                    console.log(mensaje); 
                    document.getElementsByName(nombreSelect)[0].selectedIndex = ordenActual - 1;
                }
            }else{ 
                    mensaje = 'S = A + 1 ' + parseInt(ordenActual, 10) + ' ' + sucesor;
                    console.log(mensaje); 
                    console.log('S may A + 1');
                    var _token = $("input[name='_token']").val();
                    var idUser = $("input[name='idUsuario']").val();
                    $.ajax({
                        url: "{{ route('postDataEditions') }}",
                        type:'POST',
                        data: {_token:_token, idUser:idUser, orden:orden, consecutivo:consecutivo, ordenSeleccionado:ordenSeleccionado, actual:actual, ordenActual:ordenActual},

                        success: function(data) {
                            if($.isEmptyObject(data.error)){
                                if(data.debug == 1){
                                    console.log(data.success);
                                    console.log(data.debug);
                                }    
                                document.getElementById(tdEstadoActual).textContent = data.success;
                                document.getElementsByName(inputOrdenActual)[0].value = ordenSeleccionado;
                                console.log('actual '+inputOrdenActual+' seleccionado '+ordenSeleccionado);
                            }else{
                                if(data.debug == 1){
                                    console.log(data.error);
                                }
                            }
                        }
                    });
            }
            
        }else{  
  
            if (parseInt(ordenSeleccionado, 10) < parseInt(ordenActual, 10)){
                      console.log('S men A');    
                result = confirm('Seguro que desea devolver la orden ' + orden + '.' + consecutivo + ' a un estatus anterior?');
                nombreSelect = 'variables' + maestra + '.' + consecutivo;
                //seleccionado = $("#variables7084.1 :selected").text();
                if (result) {
                    var _token = $("input[name='_token']").val();
                    var idUser = $("input[name='idUsuario']").val();
                    $.ajax({
                        url: "{{ route('postDataEditions') }}",
                        type:'POST',
                        data: {_token:_token, idUser:idUser, orden:orden, consecutivo:consecutivo, ordenSeleccionado:ordenSeleccionado, actual:actual, ordenActual:ordenActual},

                        success: function(data) {
                            if($.isEmptyObject(data.error)){
                                if(data.debug == 1){
                                    console.log(data.success);
                                    console.log(data.debug);
                                    console.log(tdEstadoActual)
                                }    
                                document.getElementById(tdEstadoActual).textContent = data.success;
                                document.getElementsByName(inputOrdenActual)[0].value = ordenSeleccionado;
                            }else{
                                if(data.debug == 1){
                                    console.log(data.error);
                                }
                            }
                        }
                    });
                }else{ 
                    document.getElementsByName(nombreSelect)[0].selectedIndex = ordenActual - 1;
                }
            }
        }            
    }
// function enviar_formulario(){ 
//    document.formulario1.submit() 
// } 
</script>
@endsection

@section('content')
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="resultado" class="alert alert-success alert-dismissible fade in aria-hidden">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            <strong>Total de Clientes:</strong><span id="users-total"> </span>
                        </div>
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
                                <h2 class="title pull-left">CAMBIO DE ESTATUS MASIVO</h2>
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

                                        <table class="table table-striped" id="example2" >
                                            <thead>
                                                <tr>
                                                    <th>Orden</th>
                                                    <th>Cliente</th>
                                                    <th>Estatus actual</th>
                                                    <th>Cambiar estatus a</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($details as $detail)
                                                <tr class="odd gradeX">
                                                    <td>{{ $detail->idOrdenMaestra.".".$detail->consecutivo }}</td>
                                                    <td>{{ $detail->nombreCompletoCliente }}</td>
                                                    <td id="estadoActual{{ $detail->idOrdenMaestra.".".$detail->consecutivo }}">{{ $detail->estatus }}</td>
                                                    <td>
                                                        <form id="formStatus{{ $detail->idOrdenMaestra.".".$detail->consecutivo }}" action="{{ route('postDataEditions') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="idUsuario" class="form-control" value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="ordenActual{{ $detail->idOrdenMaestra.".".$detail->consecutivo }}" class="form-control" value="@foreach($editions as $edition)
                                                                    @if ($detail->estatus === $edition->estatus)
                                                                        {{ $edition->orden }}
                                                                    @endif
                                                                @endforeach">
                                                            <select name="variables{{ $detail->idOrdenMaestra.".".$detail->consecutivo }}" class="form-control input-sm m-bot15" onChange="CheckDiferentValue({{ $detail->idOrdenMaestra }},{{ $detail->idAutoincrementable }},{{ $detail->consecutivo }}, this.value,'{{ $detail->estatus }}',@foreach($editions as $edition)
                                                                    @if ($detail->estatus === $edition->estatus)
                                                                        {{ $edition->orden }}
                                                                    @endif
                                                                @endforeach)">
                                                                @foreach($editions as $edition)
                                                                <option value="{{ $edition->id }}" 
                                                                    @if ($detail->estatus === $edition->estatus)
                                                                        selected
                                                                    @endif>{{ $edition->estatus }}</option>
                                                                @endforeach
                                                            </select>
                                                        </form>  
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
        <script src="{{ asset('assets/js/scripts.masters.js') }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/chart-sparkline.js') }}" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

        <!-- Scripts Laravel Auth -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Scripts Laravel Auth - END -->

@endsection