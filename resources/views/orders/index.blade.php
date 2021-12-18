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
    @foreach($users as $user)
        <div class="modal fade" id="view-data-{{ $user->id}}" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated swing">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Información del usuario {{ $user->id}}</h4>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Nombre</label>
                        <div class="input-group primary">
                            <span class="input-group-addon">                
                                <span class="arrow"></span>
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $user->firstname}} {{ $user->lastname}}">
                        </div>
                        <p></p>
                        <label class="form-label">Correo</label>
                        <div class="input-group primary">
                            <span class="input-group-addon">                
                                <span class="arrow"></span>
                                <i class="fa fa-envelope-o"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $user->email}}">
                        </div>
                        <p></p>
                        <label class="form-label">Teléfono</label>
                        <div class="input-group primary">
                            <span class="input-group-addon">                
                                <span class="arrow"></span>
                                <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $user->celphone}}">
                        </div>
                        <p></p>
                        <label class="form-label">Nacimiento</label>
                        <div class="input-group primary">
                            <span class="input-group-addon">                
                                <span class="arrow"></span>
                                <i class="fa fa-birthday-cake"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $user->birthday}}">
                        </div>
                        <p></p>
                        <label class="form-label">Género</label>
                        <div class="input-group primary">
                            <span class="input-group-addon">                
                                <span class="arrow"></span>
                                <i class="fa fa-male"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $user->gender}}">
                        </div>
                        <p></p>
                        <label class="form-label">Tipo</label>
                        <div class="input-group primary">
                            <span class="input-group-addon">                
                                <span class="arrow"></span>
                                <i class="fa fa-tags"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $user->type}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
                                <h1 class="title">USUARIOS</h1>                            
                            </div>
                        </div>
                    </div>   
                    <div class="clearfix"></div>                                     
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">LISTA DE USUARIOS</h2>
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
                                                    <th>Usuario</th>
                                                    <th>Rol</th>
                                                    <th>Activo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr class="odd gradeX">
                                                    <td>{{ $user->name}}</td>
                                                    <td>Administrador</td>
                                                    <td><i class="fa fa-check-square-o"></i></td>
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
