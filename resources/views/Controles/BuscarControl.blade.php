@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection

@section('title')
<h2 class="font-bold">Buscar Historia</h2>
@endsection
@section('Menu')
<li class="">
	<a href=""><i class="fa fa-edit"></i><span class="nav-label">Historias</span><span class="fa arrow">
	</span></a>
	<ul class="nav nav-second-level">
    	<li class="">
    		<a href="">Buscar Historia</a>
    	</li>
    	<li>
    		<a>
    			<span class="nav-label">Agregar Historia
    			</span>
    			<span class="fa arrow">
				</span>
			</a>
			<ul class="nav nav-third-level">
				<li>
    				<a href="/AgregarHistoria">Oncologico</a>
    			</li>
    			<li>
    				<a href="/AgregarHistoriaNo">No Oncologico</a>
    			</li>
			</ul>
    	</li>
	</ul>
</li>
<li class="active">
	<a href="metrics.html"><i class="fa fa-files-o"></i> <span class="nav-label">Controles</span>  </a>
    <ul class="nav nav-second-level">
        <li class="active">
            <a href="">Buscar Control</a>
        </li>
        <li class="">
            <a>
                <span class="nav-label">Agregar Control
                </span>
                <span class="fa arrow">
                </span>
            </a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="/AgregarControl">Oncológico</a>
                </li>
                <li  class="">
                    <a href="/AgregarControlNo">No Oncológico</a>
                </li>
            </ul>
        </li>
    </ul>
</li>
@endsection
@section('content')
<div class="wrapper wrapper-content">
	<div class="row  border-bottom white-bg dashboard-header">
		<div class="row">
			<div class="form-group col-sm-2">
        		<input type="text" class="form-control input-sm" name="num_historia" placeholder="N° Historia">	
			</div>
            <div class="form-group col-sm-2">
                <input type="text" class="form-control input-sm" name="num_historia" placeholder="N° Control"> 
            </div> 
			<div class="form-group col-sm-2">
        		<input type="text" class="form-control input-sm" name="cedula" placeholder="C.I">	
			</div> 
			<div class="form-group col-sm-3">
        		<input type="text" class="form-control input-sm" name="nombre1" placeholder="Primer Nombre">	
			</div>   
			<div class="form-group col-sm-3">
				<input type="text" class="form-control input-sm" name="nombre2" placeholder="Segundo Nombre">
			</div> 
        </div> 

        <div class="row">
        	<div class="form-group col-sm-3">
				<input type="text" class="form-control input-sm" name="apellido1" placeholder="Primer Apellido">
			</div>
			<div class="form-group col-sm-3">
				<input type="text" class="form-control input-sm" name="apellido2" placeholder="Segundo Apellido">
			</div>
        	<div class="form-group col-sm-2">
					<input type="text" class="form-control input-sm" name="edad" placeholder="Edad Paciente">
        	</div>
        </div>
        	<button class="btn btn-primary pull-right" type="submit">Buscar Control</button>
	</div>
</div>
@endsection

@section('mainscript')
<script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
@endsection
