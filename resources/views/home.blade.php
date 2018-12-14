@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection

@section('title')
<title>Tablero</title>
<form class="form-group" method="GET" action="VerHistoria">
 @csrf
<h2 class="font-bold">Buscar Historia</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif
@endsection
@section('Menu')
<li class="active">
	<a href=""><i class="fa fa-edit"></i><span class="nav-label">Historias</span><span class="fa arrow">
	</span></a>
	<ul class="nav nav-second-level">
    	<li class="active">
    		<a href="">Buscar Historia</a>
    	</li>
    </ul>
</li>
<li>
    <a href=""><i class="fa fa-files-o"></i><span class="nav-label">Agregar</span><span class="fa arrow">
	</span></a>
	<ul class="nav nav-second-level">
		<li>
    		<a href="{{route('AgregarHistoria')}}">Historia Oncologica</a>
    	</li>
    	<li>
    		<a href="{{route('AgregarHistoriaNo')}}">Historia No Oncologica</a>
    	</li>
	</ul>
</li>
@if (auth()->user()->email=='admin@gmail.com')
<li>
	<a href=""><i class="fa fa-plus"></i><span class="nav-label">Crear Usuario</span>
</li>
@endif
@endsection
@section('content')
<div class="wrapper wrapper-content">
	<div class="row  border-bottom white-bg dashboard-header">
		<div class="row">
			<div class="form-group col-md-4">
        		<input type="text" class="form-control input-sm" name="num_historia" placeholder="N° Historia">	

        		<input type="text" class="form-control input-sm" name="cedula" placeholder="C.I">	
			</div> 
			<div class="form-group col-md-4">
        		<input type="text" class="form-control input-sm" name="nombre1" placeholder="Primer Nombre">	

				<input type="text" class="form-control input-sm" name="nombre2" placeholder="Segundo Nombre">
			</div> 
        	<div class="form-group col-md-4">
				<input type="text" class="form-control input-sm" name="apellido1" placeholder="Primer Apellido">

				<input type="text" class="form-control input-sm" name="apellido2" placeholder="Segundo Apellido">
			</div>
        </div>
        <div class="form-group">
            <input type="hidden" name="oncologico" value="false">
            <label> <input type="checkbox" name="oncologico" value="true">Oncológico</label>
        </div>
        	<button class="btn btn-primary pull-right" type="submit">Buscar Historia</button>
	</div>
</div>
@endsection

@section('mainscript')
<script src="js/plugins/iCheck/icheck.min.js"></script>
@endsection
</form>
