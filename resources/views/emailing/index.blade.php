@extends('template.main')

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li class="active"><strong>Emailing</strong></li>
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

            <form id="form-data" action="{{ route('postData') }}" method="post" name="formulario1">
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
                var numeroTelefonoDireccionDeEnvio = $("input[name='numeroTelefonoDireccionDeEnvio']").val();
                var codigoPostalDireccionDeEnvio = $("input[name='codigoPostalDireccionDeEnvio']").val();
                var calleDireccionDeEnvio = $("input[name='calleDireccionDeEnvio']").val();
                var ciudadDireccionDeEnvio = $("input[name='ciudadDireccionDeEnvio']").val();
                var numeroExteriorDireccionDeEnvio = $("input[name='numeroExteriorDireccionDeEnvio']").val();
                var estadoDireccionDeEnvio = $("input[name='estadoDireccionDeEnvio']").val();
                var numeroInteriorDireccionDeEnvio = $("input[name='numeroInteriorDireccionDeEnvio']").val();
                var paisDireccionDeEnvio = $("input[name='paisDireccionDeEnvio']").val();

                var nombredireccionDeFacturacion = $("input[name='nombredireccionDeFacturacion']").val();
                var coloniaDireccionDeFacturacion = $("input[name='coloniaDireccionDeFacturacion']").val();
                var numeroTelefonoDireccionDeFacturacion = $("input[name='numeroTelefonoDireccionDeFacturacion']").val();
                var codigoPostalDireccionDeFacturacion = $("input[name='codigoPostalDireccionDeFacturacion']").val();
                var calleDireccionDeFacturacion = $("input[name='calleDireccionDeFacturacion']").val();
                var ciudadDireccionDeFacturacion = $("input[name='ciudadDireccionDeFacturacion']").val();
                var numeroExteriorDireccionDeFacturacion = $("input[name='numeroExteriorDireccionDeFacturacion']").val();
                var estadoDireccionDeFacturacion = $("input[name='estadoDireccionDeFacturacion']").val();
                var numeroInteriorDireccionDeFacturacion = $("input[name='numeroInteriorDireccionDeFacturacion']").val();
                var paisDireccionDeFacturacion = $("input[name='paisDireccionDeFacturacion']").val(); 
                           
                var facturacionElectronica = $("input[name='facturacionElectronica']").val();
                var razonSocial = $("input[name='razonSocial']").val();
                var RFC = $("input[name='RFC']").val();
                var correoElectronicodireccionDeFacturacion = $("input[name='correoElectronicodireccionDeFacturacion']").val();

                $.ajax({
                    url: "{{ route('postData') }}",
                    type:'POST',
                    data: {_token:_token, idUsuario:idUsuario, nombrePersonaDireccionDeEnvio:nombrePersonaDireccionDeEnvio, coloniaDireccionDeEnvio:coloniaDireccionDeEnvio, numeroTelefonoDireccionDeEnvio:numeroTelefonoDireccionDeEnvio, codigoPostalDireccionDeEnvio:codigoPostalDireccionDeEnvio, calleDireccionDeEnvio:calleDireccionDeEnvio, ciudadDireccionDeEnvio:ciudadDireccionDeEnvio, numeroExteriorDireccionDeEnvio:numeroExteriorDireccionDeEnvio, estadoDireccionDeEnvio:estadoDireccionDeEnvio, numeroInteriorDireccionDeEnvio:numeroInteriorDireccionDeEnvio, paisDireccionDeEnvio:paisDireccionDeEnvio, nombredireccionDeFacturacion:nombredireccionDeFacturacion, coloniaDireccionDeFacturacion:coloniaDireccionDeFacturacion, numeroTelefonoDireccionDeFacturacion:numeroTelefonoDireccionDeFacturacion, codigoPostalDireccionDeFacturacion:codigoPostalDireccionDeFacturacion, calleDireccionDeFacturacion:calleDireccionDeFacturacion, ciudadDireccionDeFacturacion:ciudadDireccionDeFacturacion, numeroExteriorDireccionDeFacturacion:numeroExteriorDireccionDeFacturacion, estadoDireccionDeFacturacion:estadoDireccionDeFacturacion, numeroInteriorDireccionDeFacturacion:numeroInteriorDireccionDeFacturacion, paisDireccionDeFacturacion:paisDireccionDeFacturacion, facturacionElectronica:facturacionElectronica, razonSocial:razonSocial, RFC:RFC, correoElectronicodireccionDeFacturacion:correoElectronicodireccionDeFacturacion},
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

// function enviar_formulario(){ 
//    document.formulario1.submit() 
// } 
</script>
@endsection

@section('content')
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-success alert-dismissible fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            <strong>Total de Usuarios:</strong><span id="users-total"> {{ $users_total }}</span>
                        </div>
                        <div class="page-title">
                            <div class="pull-left">
                                <h1 class="title">EMAILING</h1>                            
                            </div>
                        </div>
                    </div>   
                    <div class="clearfix"></div>  
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Lista de Correos</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tarea</th>
                                                    <th>Usuario</th>
                                                    <th>Modificación</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($emails as $email)
                                                <tr>
                                                    <th scope="row">{{ $email->id }}</th>
                                                    <td>{{ $email->name }}</td>
                                                    <td>{{ $email->userName }}</td>
                                                    <td>{{ $email->updated_at }}</td>
                                                    <td>
                                                        <a id="{{ $email->id }}" href="#ultraModal-1" data-toggle="modal" class="edition2 btn btn-primary"">
                                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                        </a>
                                                        <a href="/admin/public/emailing/edit/{{ $email->id }}" class="btn btn-danger">
                                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                        </a>
                                                        <a href="/admin/public/emailing/destroy/{{ $email->id }}" onclick="return confirm('Seguro desea eliminarla?')" class="btn btn-warning">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                        </a>
                                                    </td>                                                      
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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

@endsection                    