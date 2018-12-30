@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
@endsection

@section('title')
<title>Agregar Historia</title>
<form class="form-group" method="POST" action="VerHistoria" enctype="multipart/form-data">
    @csrf
<h2 class="font-bold">Agregar Nueva Historia Oncológica</h2>
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
<li class="">
    <a href=""><i class="fa fa-edit"></i><span class="nav-label">Historias</span><span class="fa arrow">
    </span></a>
    <ul class="nav nav-second-level">
        <li class="">
            <a href="{{route('home')}}">Buscar Historia</a>
        </li>
    </ul>
</li>
<li class="active">
    <a href=""><i class="fa fa-files-o"></i><span class="nav-label">Agregar</span><span class="fa arrow">
	</span></a>
        <ul class="nav nav-second-level">
            <li class="active">
                <a href="">Historia Oncologica</a>
            </li>
            <li>
                <a href="{{route('AgregarHistoriaNo')}}">Historia No Oncologica</a>
            </li>
        </ul>
</li>
@if (auth()->user()->email=='admin@gmail.com')
<li>
	<a href="{{route('register')}}"><i class="fa fa-plus"></i><span class="nav-label">Crear Usuario</span>
</li>
@endif
@endsection
@section('content')
<div class="wrapper wrapper-content">
<div class="row  border-bottom white-bg dashboard-header">
	<div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h2>Datos Paciente</h2>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="cedula" placeholder="C.I">
            </div> 
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="nombre1" placeholder="Primer Nombre">	
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="nombre2" placeholder="Segundo Nombre">
            </div> 
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="apellido1" placeholder="Primer Apellido">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
        <div class="form-group">
                <input type="text" class="form-control input-sm" name="apellido2" placeholder="Segundo Apellido">
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="telefono" placeholder="Teléfono">
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control input-sm" name="lic" placeholder="LIC">
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group" id="data_1">
                <h4>Fecha Nacimiento</h4>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecha_nac" class="form-control" value="03/04/2014">
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Procedencia<h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="procedencia"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Referencia</h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="referencia"></textarea>
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h2>Signos</h2>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Dónde consultó al tener los signos</h4>
                <textarea class="form-control" style="resize:none;" rows="3" name="lugarsignos"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Qué le dijeron</h4>
                <textarea class="form-control" style="resize:none;" rows="3" name="descripsignos"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Tratamiento que recibió</h4>
                <textarea class="form-control" style="resize:none;" rows="3" name="tratsignos"></textarea>
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h2>Antecedentes Familiares</h2>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Madre</h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="antemadre"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Padre</h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="antepadre"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Hermanos</h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="anteherm"></textarea>
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h2>Antecedentes Prenatales</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="nembarazo" placeholder="N° Embarazo">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="pesonac" placeholder="Peso">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="tallanac" placeholder="Talla">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-sm-2">
            <div class="form-group">
                <input type="hidden" name="control" value="false">
                <label> <input type="checkbox" name="control" value="true"> Controlado</label>
            </div>
        </div>
        <div class="col-lg-2 col-sm-2">
            <div class="form-group">
                <input type="hidden" name="cesar" value="false">
                <label> <input type="checkbox" name="cesar" value="true"> Cesárea</label>
            </div>
        </div>
        <div class="col-lg-2 col-sm-2">
            <div class="form-group">
                <input type="hidden" name="complic" value="false">
                <label> <input type="checkbox" name="complic" value="true"> Complicación</label> 
            </div>   
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h2>Otros Antecedentes:</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Médicos</h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="antmedicos"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Quirúrgicos<h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="antquirur"></textarea>
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h2>Otros Datos</h2>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <h4>Leucocoria</h4>
                </div>
            </div>
    </div>
    <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="edadleuco" placeholder="Edad">
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="leuOD" placeholder="OD">
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="leuOI" placeholder="OI">
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Estrabismo</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="estraedad" placeholder="Edad"> 
            </div> 
            <div class="form-group">
                <input type="text" class="form-control" name="estraOD" placeholder="OD">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="estraOI" placeholder="OI">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="estraET" placeholder="ET">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="estraXT" placeholder="XT">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="estraHT" placeholder="HT">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Celulitis</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">  
                <input type="text" class="form-control input-sm" name="celedad" placeholder="Edad"> 
            </div> 
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="celOD" placeholder="OD">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="celOI" placeholder="OI">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Otro</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <textarea class="form-control" style="resize:none;" rows="3" name="otro"></textarea>
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h2>Historia Oftalmológica</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
            <input type="text" class="form-control" name="nhistoria" placeholder="N° Historia">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Fecha</h4>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="datehist" class="form-control" value="03/04/2014">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>AV</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="avod" placeholder="OD">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="avoi" placeholder="OI">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Anexos<h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h5>OD</h5>
                <textarea class="form-control" style="resize:none;" rows="2" name="anexod"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h5>OI</h5>
                <textarea class="form-control" style="resize:none;" rows="2" name="anexoi"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Biomicroscopia</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h5>OD</h5>
                <textarea class="form-control" style="resize:none;" rows="2" name="biood"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">            
            <div class="form-group">
                <h5>OI</h5>
                <textarea class="form-control" style="resize:none;" rows="2" name="biooi"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Balance Muscular</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <textarea class="form-control" style="resize:none;" rows="2" name="balmus"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>PIO</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="piod" placeholder="OD">
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <input type="text" class="form-control" name="pioi" placeholder="OI">
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Fondo de ojo<h4>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">     
                <textarea class="form-control" style="resize:none;" rows="2" name="fondo_ojo"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-4 col-sm-3">
            <div class="form-group">
                <h4>Diagnóstico</h4>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <textarea class="form-control" style="resize:none;" rows="2" name="diagnos"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <h4>Plan<h4>
                <textarea class="form-control" style="resize:none;" rows="2" name="plan"></textarea>
            </div>
        </div>
	</div>
	<div class="row">
            <button class="btn btn-primary pull-right" type="submit">Agregar Historia</button>
    </div>
</div>
</div>
</form>
@endsection

@section('mainscript')

<script src="js/plugins/iCheck/icheck.min.js"></script>


   <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>


    <script>

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });



    </script>
@endsection
</form>