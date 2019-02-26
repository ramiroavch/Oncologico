@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
         <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
@endsection

@section('title')
<title>Ver Historia</title>
<h2 class="font-bold">Ver Historia No Oncológica</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif
<div class="row">
        <div class="form-group col-1 col-sm-2 col-md-2 col-lg-2">
            <a class="btn btn-primary " href="{{ route('AgregarControl.index',['historia'=>'NULL','historiano'=>$historia->num_h]) }}">Agregar Control</a>
        </div>
        <div class="form-group col-1 col-sm-2 col-md-2 col-lg-2">
            <a class="btn btn-primary pull-right" href="{{ route('ListaControles.index',['historia'=>'NULL','historiano'=>$historia->num_h])}}">Ver Controles</a>
        </div>
        <div class="form-group col-1 col-sm-2 col-md-2 col-lg-2">
            <a class="btn btn-primary" href="{{ route('HistoriaNo.edit',['historiano'=>$historia->num_h]) }}">Modificar Historia</a>
        </div>
</div>
@endsection
@section('Menu')
<li class="">
	<a href=""><i class="fa fa-edit"></i><span class="nav-label">Historias</span><span class="fa arrow">
	</span></a>
	<ul class="nav nav-second-level">
    	<li>
    		<a href="{{route('home')}}">Buscar Historia</a>
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
    	<li  class="">
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
    <div class="row border-bottom white-bg dashboard-header">
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
                    <label>CI: {{$paciente->ci}}</label>  
                </div>
                <div class="form-group">
                    <label>Primer Nombre: {{$paciente->nombre1}}</label>    
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Segundo Nombre: {{$paciente->nombre2}}</label>
                </div>
                <div class="form-group">
                    <label>Primer Apellido: {{$paciente->apellido1}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Segundo Apellido: {{$paciente->apellido2}}</label>
                </div>
                <div class="form-group">
                    <label>Teléfono: {{$paciente->tlf}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Lic: {{$paciente->Lic}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Fecha Nacimiento: {{$paciente->fecha_nac}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Procedencia:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="procedencia">{{$paciente->procedencia}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Referencia:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="referencia">{{$paciente->referencia}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Enfermedad actual:</label>
                    <textarea  readonly="" class="form-control" style="resize:none;" rows="2" name="enf_actual">{{$historia->enfer_actual}}</textarea>        
                </div>
            </div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <h2>Diagnóstico</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <h4>Descripción<h4>
                </div>
                <div class="form-group">
                    <textarea readonly="" class="form-control" style="resize:none;" rows="3" name="diagnosdescrip">{{$historia->diagnos_descrip}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <h4>Fondo de ojo</h4>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">OD:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="fondo_od">{{$historia->fondo_od}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">OI:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="fondo_oi">{{$historia->fondo_oi}}</textarea>
                </textarea>
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
                    <label class="font-noraml">Madre:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecmadre">{{$historia->antec_madre}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Padre:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecpadre">{{$historia->antec_padre}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Otros:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecotros">{{$historia->antec_otros}}</textarea>
                </textarea>
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
                    <label>N° Embarazo: {{$historia->N_emb}}</label>
                </div>
                <div class="form-group">
                    <label>Semanas: {{$historia->semanas}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Peso al nacer: {{$historia->talla_nac}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Talla al nacer: {{$historia->peso_nac}}</label>
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Complicaciones Maternas:</label>
                    <textarea readonly class="form-control" style="resize:none;" rows="2" name="comp_mat">{{$historia->comp_mat}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Complicaciones al Nacer:</label>
                    <textarea readonly class="form-control" style="resize:none;" rows="2" name="comp_nac">{{$historia->comp_nac}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-sm-2">
                <div class="form-group">
                    @if($historia->emb_cont=='1')
                        <label><input disabled="" type="checkbox" name="control" value="true">controlado</label>
                    @else
                        <label> <input disabled="" type="checkbox" checked="checked" name="control" value="true">controlado</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-2 col-sm-2">
                <div class="form-group">
                    @if($historia->emb_cesar=='1')
                        <label> <input type="checkbox" name="cesar" value="true">Cesárea</label> 
                    @else
                        <label> <input type="checkbox" name="cesar" checked="checked" value="true">Cesárea</label> 
                    @endif 
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
                    <label class="font-noraml">Personales:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecpersonal">{{$historia->antec_person}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Oftalmológicos:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecoftal">{{$historia->antec_oftal}}</textarea>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Quirúrgicos:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecquirur">{{$historia->antec_quirur}}</textarea>
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
                    <label>N° Historia: {{$historia->num_h}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">AVSC:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OD: {{$historia->avsc_od}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OI: {{$historia->avsc_oi}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">AVMC:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OD: {{$historia->avmc_od}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OI: {{$historia->avmc_oi}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label class="font-noraml">Refracción:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="refraccion">{{$historia->refracc}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                        <label class="font-noraml">Anexos Oculares:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OD: {{$historia->anex_od}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OI: {{$historia->anex_oi}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Biomicroscopia:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OD: {{$historia->bio_od}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OI: {{$historia->bio_oi}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label class="font-noraml">Presión Intraocular:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OD: {{$historia->presion_od}}</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>OI: {{$historia->presion_oi}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="form-group">
                    <label>Fecha: {{$historia->fecha}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label class="font-noraml">Balance Muscular:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="balmus">{{$historia->bal_musc}}</textarea>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label class="font-noraml">Diagnóstico:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="diagnoshist">{{$historia->diagnostico}}</textarea>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label class="font-noraml">Plan:</label>
                    <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="plan">{{$historia->plan}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('mainscript')

@endsection