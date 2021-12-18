@extends('admin.template.main2')

@section('title' , 'Editar el usuario '. $user->firstname . ' ' .$user->lastname)

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="http://mx.pingwin.be:803"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        <li class="active"><strong>Editar usuario</strong></li>
    </ol>     
@endsection

@section('helptitle' , 'Cómo editar usuarios.')
    
@section('helpbody')
    Aquí va el texto de ayuda de la sección.  
@endsection

@section('users_active' , 'class="open"')

@section('content')                                    
                            <header class="panel_header">
                                <h2 class="title pull-left">Editando el usuario{!! ' ' .$user->firstname . ' ' .$user->lastname !!}</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_setting fa fa-info-circle" data-toggle="modal" href="#section-help"></i>
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <!--<i class="box_close fa fa-times"></i>-->
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
        
    {!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
    
        <div class="form-group col-xs-6">
        
            {!! Form::label('firstname', 'Nombres') !!}
            {!! Form::text('firstname', $user->firstname, ['class' => 'form-control', 'placeholder' => 'Introduzca sus nombres', 'required']) !!}
            
        </div>
 
        <div class="form-group col-xs-6">
        
            {!! Form::label('lastname', 'Apellidos') !!}
            {!! Form::text('lastname', $user->lastname, ['class' => 'form-control', 'placeholder' => 'Introduzca sus apellidos', 'required']) !!}
            
        </div>
  
        <div class="form-group col-xs-6">
        
            {!! Form::label('email', 'Correo') !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Introduzca su e-mail', 'required']) !!}
            
        </div>
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('cellphone', 'Teléfono') !!}
            {!! Form::text('cellphone', $user->cellphone, ['class' => 'form-control', 'placeholder' => 'Introduzca su teléfono celular', 'required']) !!}
            
        </div>
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('birthday', 'Fecha de nacimiento') !!}
            {!! Form::text('birthday', $user->birthday, ['class' => 'form-control datepicker col-xs-6', 'data-disabled-days' => '0,6', 'placeholder' => 'Introduzca su fecha de nacimiento', 'required']) !!}
            
        </div>
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('gender', 'Género') !!}
            {!! Form::select('gender', ['male' => 'Hombre', 'female' => 'Mujer'], null, ['class' => 'form-control']) !!}
            
        </div>


                        
        <div class="form-group col-xs-6">
        
            {!! Form::label('type', 'Tipo') !!}
            {!! Form::select('type', ['customer' => 'Cliente', 'messenger' => 'Mensajero', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
            
        </div>

        <div class="form-group">
        
            {!! Form::number('active', '1', ['hidden' => 'true']) !!}
            
        </div>
        
        <div class="form-group">
        
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control']) !!}
            
        </div>
            
    {!! Form::close() !!}

                                    </div>
                                </div>
                            </div> 
@endsection