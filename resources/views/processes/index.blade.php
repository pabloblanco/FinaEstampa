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
    // var miCodigoQR = new QRCode("codigoQR");
    $(document).ready(function() {
        // $("#generarCodigo").on("click",function(){
        //     var cadena = $("#item_txt").val();
        //     if (cadena == "") {
        //         alert("Ingresa un texto");
        //         $("#item_txt").focus();
        //     }else{
        //       $("#descargarCodigo").css("display","inline-block");
        //       miCodigoQR.makeCode(cadena);
        //     }
        // });
        // $("#descargarCodigo").on("click",function(){
        //     var base64 = $("#codigoQR img").attr('src');
        //     $("#descargarCodigo").attr('href', base64);
        //     $("#descargarCodigo").attr('download', "codigoQR");
        //     $("#descargarCodigo").trigger("click");
        // });
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

                var estatusEstatus = $("input[name='estatusEstatus']").val();
                var estatusComentarios = $("input[name='estatusComentarios']").val();

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
                var distintivoInformacion = $("input[name='distintivoInformacion']").val();

                var estiloCuello = $("input[name='estiloCuello']").val();
                var estiloAletilla = $("input[name='estiloAletilla']").val();
                var estiloPuno = $("input[name='estiloPuno']").val();
                var estiloCorte = $("input[name='estiloCorte']").val();
                var estiloBolsillo = $("input[name='estiloBolsillo']").val();

                $.ajax({
                    url: "{{ route('postDataDetails') }}",
                    type:'POST',

                    data: {_token:_token, idUsuario:idUsuario, idOrdenDetalle:idOrdenDetalle, idMedida:idMedida, ordenDetalleTejido:ordenDetalleTejido, ordenDetallePersonalizado:ordenDetallePersonalizado, estatusEstatus:estatusEstatus, estatusComentarios:estatusComentarios, medidaCuello:medidaCuello, medidaPecho:medidaPecho, medidaAbdomen:medidaAbdomen, medidaCadera:medidaCadera, medidaMangaLongitud:medidaMangaLongitud, medidaEspalda:medidaEspalda, medidaTronco:medidaTronco, medidaPuno:medidaPuno, medidaSisa:medidaSisa, medidaBicep:medidaBicep, distintivoContrastes:distintivoContrastes, distintivoInserto:distintivoInserto, distintivoBotones:distintivoBotones, distintivoIniciales:distintivoIniciales, distintivoInformacion:distintivoInformacion, estiloCuello:estiloCuello, estiloAletilla:estiloAletilla, estiloPuno:estiloPuno, estiloCorte:estiloCorte, estiloBolsillo:estiloBolsillo},

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

    var input = document.getElementById("cedula");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        var cadena= $(this).val();
        var fstChar = cadena.charAt(0);
        if (fstChar === 'O') {
            orden = document.getElementById("cedula").value;
            po = orden.indexOf('.'); 
            if (po == '-1') {
                alert('Revise que el QR contenga el consecutivo de la orden');
                document.getElementById("cedula").value = "";
            }else{
                consecutivo = orden.substring(po + 1);             
                orden = orden.substring(1, po);  
                LocateOrder(orden, consecutivo);
                $("#empleado").focus();
            }
        }else{
            alert('Revise que el QR corresponda a una C\u00E9dula de producci\u00F3n');  
            document.getElementById("cedula").value = "";
        }    
       event.preventDefault();
       // document.getElementById("cambiarEstatus").click();
      }
    });

    // $("#cedula").blur(function(){
    //     var cadena= $(this).val();
    //     var fstChar = cadena.charAt(0);
    //     if (fstChar === 'O') {
    //         orden = document.getElementById("cedula").value;
    //         po = orden.indexOf('.');  
    //         if (po == '-1') {
    //             alert('Revise que el QR contenga el consecutivo de la orden');
    //             document.getElementById("cedula").value = "";
    //         }else{
    //             consecutivo = orden.substring(po + 1);             
    //             orden = orden.substring(1, po);  
    //             LocateOrder(orden, consecutivo);
    //             $("#empleado").focus();
    //         }
    //     }else{
    //         alert('Revise que el QR corresponda a una C\u00E9dula de producci\u00F3n');  
    //         document.getElementById("cedula").value = "";
    //     }    
    //    event.preventDefault();
    //    // document.getElementById("cambiarEstatus").click();
    // });

    var input = document.getElementById("empleado");
    input.addEventListener("keyup", function(event) {
        if (document.getElementById("cedula").value == ""){
            document.getElementById("empleado").value = "";
            $("#cedula").focus();
        }
        if (event.keyCode === 13) {
            var cadena= $(this).val();
            var fstChar = cadena.charAt(0);
            if (fstChar === 'E') {
                $("#estadoFuturo").focus();
            }else{
                alert('Revise que el QR corresponda a una Clave de empleado');  
                document.getElementById("empleado").value = "";
            }    
            event.preventDefault();
            // document.getElementById("cambiarEstatus").click();
        }
    });

    var input = document.getElementById("estadoFuturo");
    input.addEventListener("keyup", function(event) {
        if (document.getElementById("cedula").value == ""){
            document.getElementById("estadoFuturo").value = "";
            $("#cedula").focus();
        }else{
            if (document.getElementById("empleado").value == ""){
                document.getElementById("estadoFuturo").value = "";
                $("#empleado").focus();
            }
        }    
        if (event.keyCode === 13) {
        var nuevoEstado = $(this).val();
        var fstChar = nuevoEstado.charAt(0);
        if (fstChar === 'P') {
            var _token = $("input[name='_token']").val();
            orden = document.getElementById("cedula").value;
            empleado = document.getElementById("empleado").value; 
            po = orden.indexOf('.');  
            consecutivo = orden.substring(po + 1);             
            orden = orden.substring(1, po);             
            nuevoEstado = nuevoEstado.substring(1);
            empleado = empleado.substring(1);         
            document.getElementById("cedula").value = "";
            document.getElementById("empleado").value = "";
            document.getElementById("estadoFuturo").value = "";
            produccion = document.getElementById("ordenDetalle").value;
            actual = document.getElementById('estadoActual').value;
            ordenActual = document.getElementById('ordenActual').value;
            // alert('Orden: ' + orden + ' Consecutivo: ' + consecutivo  + ' Empleado: ' + empleado + ' estatus nuevo: ' + nuevoEstado + ' Token: ' + _token + ' Produccion: ' + produccion + ' Estado Actual: ' + actual + ' Orden Estado actual: ' + ordenActual);
            CheckDiferentValue(orden, produccion, consecutivo, nuevoEstado, actual, ordenActual);
            $("#cedula").focus();
        }else{
            alert('Revise que el QR corresponda a un Proceso');  
            document.getElementById("estadoFuturo").value = "";
        }    
       event.preventDefault();
       // document.getElementById("cambiarEstatus").click();
      }
    });

    function CheckDiferentValue(maestra, orden, consecutivo, ordenSeleccionado, actual, ordenActual){
        tdEstadoActual = 'estadoActual' + maestra + '.' + consecutivo;
        inputOrdenActual = 'ordenActual' + maestra + '.' + consecutivo;
        // ordenActual = document.getElementsByName(inputOrdenActual)[0].value;
        if (parseInt(ordenSeleccionado, 10) > parseInt(ordenActual, 10)){
            console.log('S may A');
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
                        // document.getElementById(tdEstadoActual).textContent = data.success;
                        // document.getElementsByName(inputOrdenActual)[0].value = ordenSeleccionado;
                        console.log('Perfecto fue del actual '+inputOrdenActual+' al seleccionado '+ordenSeleccionado);
                    }else{
                        if(data.debug == 1){
                            console.log(data.error);
                        }
                    }
                }
            });
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

    function LocateOrder(orden, consecutivo){
        var _token = $("input[name='_token']").val();
        console.log('orden '+ orden +' consecutivo '+ consecutivo);
        $.ajax({
            url: "{{ route('postConsultarEstatus') }}",
            type:'POST',
            data: {_token:_token, orden:orden, consecutivo:consecutivo},
            // beforeSend: function () {
            //     if(data.debug == 1){
            //         console.log('A punto de enviar');
            //     }
            // },
            // complete: function () {
            //     if(data.debug == 1){
            //         console.log('Ya completo el envio');
            //     }
            // },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    if(data.debug == 1){
                        console.log(data.success);
                        console.log(data.debug);
                        console.log(data.estatus);
                        
                        avance = parseInt(100/12*data.avance, 10);
                        console.log(avance);
                        console.log('orden '+ orden +' consecutivo '+ consecutivo);
                        console.log(data.avance);
                    }    
                    document.getElementById('avance').style.width = avance + '%';
                    document.getElementById('avance').innerHTML = data.estatus;
                    document.getElementById('estadoActual').value = data.estatus;
                    document.getElementById('ordenActual').value = data.avance;
                    document.getElementById('codigoQR').value = "";
                    document.getElementById('siguiente').innerHTML = data.siguiente;
                    document.getElementById('ordenDetalle').value = data.ordenDetalle;
                    miCodigoQR.makeCode('P' + data.avance);                    
                }else{
                    if(data.debug == 1){
                        console.log(data.error);
                    }
                }
            }
        });         
    }

// function enviar_formulario(){ 
//    document.formulario1.submit() 
// } 
</script>
@endsection

@section('content')
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
                                <h2 class="title pull-left">CONTROL DE PROCESOS</h2>
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
                                        <div class="progress">
                                            <div id="avance" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $avance_porcentual }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $avance_porcentual }}%">
                                                {{ $proceso_actual }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-9 col-xs-10">
                                        @csrf
                                        <input type="hidden" name="idUsuario" class="form-control" value="{{ Auth::user()->id }}">                                        
                                        <div class="form-group">
                                            <label class="form-label" for="cedula">C&eacutedula de producci&oacuten</label>
                                            <span class="desc">ejemplo "O9999.9"</span>
                                            <div class="controls">
                                                <input type="text" id="cedula" name="cedula" placeholder="Pase el Scanner por el QR de la orden." class="form-control">
                                                <input id="ordenDetalle" type="hidden" value="">
<!--                                                 <img class="selector" id="webcamimg" src="vid.png" onclick="setwebcam()" align="left" style="opacity: 1;">
                                                <img class="selector" id="qrimg" src="cam.png" onclick="setimg()" align="right" style="opacity: 0.2;">
                                                <div id="outdiv"><video id="v" autoplay=""></video></div>
                                                <div id="result">- scanning -</div> -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="empleado">Empleado</label>
                                            <span class="desc">ejemplo "E10"</span>
                                            <div class="controls">
                                                <input type="text" id="empleado" placeholder="Pase el Scanner por el QR de su gafete." class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="col-md-6 col-sm-9 col-xs-10">
                                        <div class="form-group">
                                            <div class="controls col-md-12 col-sm-9 col-xs-10">
                                                <label class="form-label" for="estadoActual">Estatus actual</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="estadoActual" placeholder="Creada" class="form-control" disabled="disabled">
                                                    <input id="ordenActual" type="hidden" value="">
                                                </div>

                                                <label class="form-label" for="estadoFuturo">Cambiar el estatus a</label>
                                                <span class="desc">ejemplo "P12"</span>
                                                <input type="text" id="estadoFuturo" placeholder="Pase el Scanner por el QR del nuevo estatus." class="form-control">

                                                <label class="form-label" for="cambiarEstatus">&nbsp</label>
                                                <button id="cambiarEstatus" class="btn btn-primary btn-icon btn-block">
                                                    <i class="fa fa-refresh"></i> &nbsp; <span>Cambiar</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="codigoQR" class="col-md-2 col-sm-9 col-xs-10">
                                        <label id="siguiente" class="form-label" for="item_txt">Siguiente proceso</label>
                                        <input id="item_txt" type="hidden" value="P1">
                                    </div>                                                    
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
        <script src="{{ asset('assets/js/scripts.details.js') }}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/chart-sparkline.js') }}" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

        <!-- Scripts Laravel Auth -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Scripts Laravel Auth - END -->

        <!-- Scripts QR Generation -->
        <script src="{{ asset('assets/js/qrcode.js') }}"></script>
        <!-- Scripts QR Generation - END -->

        <!-- Scripts QR Reader -->
        <script src="{{ asset('assets/js/llqrcode.js') }}"></script>
        <script src="{{ asset('assets/js/webqr.js') }}"></script>
        <!-- Scripts QR Reader - END -->

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
                    $("#cedula").focus();
                }
            });
        </script>    
        <!-- Scripts QR Generation - END --> 
@endsection