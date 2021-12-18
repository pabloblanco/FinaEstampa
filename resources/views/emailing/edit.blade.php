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
                                <h1 class="title">EDICIÓN</h1>                            
                            </div>
                        </div>
                    </div>   
                    <div class="clearfix"></div>  
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Editando correo de {{ $emailing->name }}</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    
                                <div class="row">
                                    @csrf
                                    <input type="hidden" name="idUsuario" class="form-control" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="idCorreo" class="form-control" value="{{ $emailing->id }}">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        
                                        <textarea id="editor" class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;">{{ $emailing->content }}</textarea>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <span>Enviar cuando el estatus sea </span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <select class="form-control m-bot15">
                                            @foreach($estatuses as $estatus)
                                                <option>{{ $estatus->estatus }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <span>Agregar el campo </span>
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <select id="campoSeleccionado" class="form-control m-bot15">
                                                <option>Nombres del cliente</option>
                                                <option>Apellidos del cliente</option>
                                                <option>Cumpleaños del cliente</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <button  id="insertar" class="btn btn-info">Insertar</button>
                                    </div>
                                    <div class="col-md-1 col-sm-12 col-xs-12">
                                        <button class="btn btn-success btn-submit">Guardar</button>
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
        <script src="{{ asset('assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/uikit/js/uikit.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/uikit/vendor/codemirror/codemirror.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/uikit/vendor/codemirror/mode/markdown/markdown.js') }}"></script>
        <script src="{{ asset('assets/plugins/uikit/vendor/codemirror/addon/mode/overlay.js') }}"></script>
        <script src="{{ asset('assets/plugins/uikit/vendor/codemirror/mode/xml/xml.js') }}"></script>
        <script src="{{ asset('assets/plugins/uikit/vendor/codemirror/mode/gfm/gfm.js') }}"></script>
        <script src="{{ asset('assets/plugins/uikit/vendor/marked/marked.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/uikit/js/components/htmleditor.js') }}" type="text/javascript"></script>
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
            $(document).ready(function() {
                var editor = $(".bootstrap-wysihtml5-textarea");

                function getSelected()
                {
                  var u     = editor.val();
                  var start = editor.get(0).selectionStart;
                  var end   = editor.get(0).selectionEnd;

                  return [u.substring(0, start), u.substring(end), u.substring(start, end)];
                }

                $("#insertar").click(function(){
                  var select = getSelected();
                  var combo = document.getElementById("campoSeleccionado");
                  var selected = combo.options[combo.selectedIndex].text;
                    editor.val(select[0]+'&&'+selected+'&&'+select[1]);
                });

                $(".btn-submit").click(function(e){
                    e.preventDefault();
                    var opcion = confirm("Confirma los cambios?");
                    if (opcion == true) {
                        var _token = $("input[name='_token']").val();
                        var idUsuario = $("input[name='idUsuario']").val();
                        var idCorreo = $("input[name='idCorreo']").val();
                        var content = $("textarea[class='bootstrap-wysihtml5-textarea']").val();
                        //alert(idUsuario+' '+idCorreo+' '+_token+' '+content);

                        $.ajax({
                            url: "{{ route('postDataEmailing') }}",
                            type:'POST',
                            data: {_token:_token, idUsuario:idUsuario, idCorreo:idCorreo, content:content},
                            success: function(data) {
                                if($.isEmptyObject(data.error)){
                                    alert(data.success);
                                    $("#cerrarDialogo").trigger("click");
                                }else{
                                    console.log(data.error);
                                }
                            },
                            error: function( jqXHR, textStatus, errorThrown ) {

                                  if (jqXHR.status === 0) {

                                    alert('Not connect: Verify Network.');

                                  } else if (jqXHR.status == 404) {

                                    alert('Requested page not found [404]');

                                  } else if (jqXHR.status == 500) {

                                    alert('Internal Server Error [500].');

                                  } else if (textStatus === 'parsererror') {

                                    alert('Requested JSON parse failed.');

                                  } else if (textStatus === 'timeout') {

                                    alert('Time out error.');

                                  } else if (textStatus === 'abort') {

                                    alert('Ajax request aborted.');

                                  } else {

                                    alert('Uncaught Error: ' + jqXHR.responseText);

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