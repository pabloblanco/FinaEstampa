@extends('admin.template.main2')

@section('title' , 'Nuevo usuario')

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="http://mx.pingwin.be:803"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        <li class="active"><strong>Nuevo usuario</strong></li>
    </ol>     
@endsection    

@section('helptitle' , 'Cómo crear usuarios nuevos.')
    
@section('helpbody')
    Aquí va el texto de ayuda de la sección.  
@endsection

@section('users_active' , 'class="open"')

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                            <header class="panel_header">
                                <h2 class="title pull-left">Creando un nuevo usuario</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_setting fa fa-info-circle" data-toggle="modal" href="#section-help"></i>
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <!--<i class="box_close fa fa-times"></i>-->
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
        
    {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
    
        <div class="form-group col-xs-6">
        
            {!! Form::label('firstname', 'Nombres') !!}
            {!! Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Introduzca sus nombres', 'required']) !!}
            
        </div>
 
        <div class="form-group col-xs-6">
        
            {!! Form::label('lastname', 'Apellidos') !!}
            {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Introduzca sus apellidos', 'required']) !!}
            
        </div>
  
        <div class="form-group col-xs-6">
        
            {!! Form::label('email', 'Correo') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Introduzca su e-mail', 'required']) !!}
            
        </div>
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('cellphone', 'Teléfono') !!}
            {!! Form::text('cellphone', null, ['class' => 'form-control', 'placeholder' => 'Introduzca su teléfono celular', 'required']) !!}
            
        </div>
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'required', 'password']) !!}
            
        </div>

<!--        <div class="form-group">
        
            {!! Form::label('password2', 'Confirmación') !!}
            {!! Form::password('password2', ['class' => 'form-control', 'placeholder' => '********', 'required', 'password']) !!}
            
        </div>-->
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('birthday', 'Fecha de nacimiento') !!}
            {!! Form::text('birthday', null, ['class' => 'form-control', 'placeholder' => 'Introduzca su fecha de nacimiento', 'required']) !!}
            
        </div>
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('gender', 'Género') !!}
            {!! Form::select('gender', ['male' => 'Hombre', 'female' => 'Mujer'], null, ['class' => 'form-control']) !!}
            
        </div>

        <div class="form-group col-xs-6">
        
            {!! Form::label('slogan', 'Slogan') !!}
            {!! Form::text('slogan', null, ['class' => 'form-control', 'placeholder' => 'Introduzca su slogan', 'required']) !!}
            
        </div>
            
        <div class="form-group col-xs-6">
        
            {!! Form::label('type', 'Tipo') !!}
            {!! Form::select('type', ['customer' => 'Cliente', 'messenger' => 'Mensajero', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
            
        </div>

        <div class="form-group col-xs-6">
        
            {!! Form::number('active', '1', ['hidden' => 'true']) !!}
            
        </div>
        
        <div class="form-group">
        
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary form-control']) !!}
            
        </div>
            
    {!! Form::close() !!}

                                    </div>
                                </div>
                            </div> 
@endsection
