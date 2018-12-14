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
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Datos Paciente</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label>CI: {{$paciente->ci}}</label>  
                    </div> 
                    <div class="form-group">
                        <label>Primer Nombre: {{$paciente->nombre1}}</label>    
                    </div>   
                    <div class="form-group">
                        <label>Segundo Nombre: {{$paciente->nombre2}}</label>
                    </div> 
                    <div class="form-group">
                        <label>Primer Apellido: {{$paciente->apellido1}}</label>
                    </div>
                    <div class="form-group">
                        <label>Segundo Apellido: {{$paciente->apellido2}}</label>
                    </div>
                    <div class="form-group">
                        <label>Teléfono: {{$paciente->tlf}}</label>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Fecha Nacimiento: {{$paciente->fecha_nac}}</label>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Procedencia:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="procedencia">{{$paciente->procedencia}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Referencia:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="referencia">{{$paciente->referencia}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Lic: {{$paciente->Lic}}</label>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Enfermedad actual:</label>
                        <textarea  readonly="" class="form-control" style="resize:none;" rows="2" name="enf_actual">{{$historia->enfer_actual}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Diagnóstico:</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="3" name="diagnosdescrip">{{$historia->diagnos_descrip}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Fondo de ojo:</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label>OD:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="fondo_od">{{$historia->fondo_od}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>OI:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="fondo_oi">{{$historia->fondo_oi}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Antecedentes Familiares</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label>Madre:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecmadre">{{$historia->antec_madre}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Padre:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecpadre">{{$historia->antec_padre}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Otros:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecotros">{{$historia->antec_otros}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Otros Antecedentes:</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label>Personales:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecpersonal">{{$historia->antec_person}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Oftalmológicos:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecoftal">{{$historia->antec_oftal}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Quirúrgicos:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="antecquirur">{{$historia->antec_quirur}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Historia Oftalmológica(2):</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label>Balance Muscular:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="balmus">{{$historia->bal_musc}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Diagnóstico:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="diagnoshist">{{$historia->diagnostico}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Plan:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="plan">{{$historia->plan}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Antecedentes Prenatales:</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>N° Embarazo: {{$historia->N_emb}}</label>
                        </div>
                    </div>
                        <div class="form-group">
                            @if($historia->emb_cont=='1')
                            <label><input disabled="" type="checkbox" name="control" value="true">controlado</label>
                            @else
                            <label> <input disabled="" type="checkbox" checked="checked" name="control" value="true">controlado</label>
                            @endif
                        </div>
                        <div class="hr-line-dashed"></div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Peso al nacer: {{$historia->talla_nac}}</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Talla al nacer: {{$historia->peso_nac}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6"">
                            <label>Semanas: {{$historia->semanas}}</label>
                        </div>
                    </div>
                        <div class="form-group">
                            @if($historia->emb_cesar=='1')
                                <label> <input type="checkbox" name="cesar" value="true">Cesárea</label> 
                            @else
                                <label> <input type="checkbox" name="cesar" checked="checked" value="true">Cesárea</label> 
                            @endif 
                        </div> 
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label>Complicaciones Maternas:</label>
                            <textarea readonly class="form-control" style="resize:none;" rows="2" name="comp_mat">{{$historia->comp_mat}}</textarea>
                        </div>  
                        <div class="form-group">
                            <label>Complicaciones al Nacer:</label>
                            <textarea readonly class="form-control" style="resize:none;" rows="2" name="comp_nac">{{$historia->comp_nac}}</textarea>
                        </div> 
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Historia Oftalmológica(1):</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nhistoria" placeholder="N° Historia">
                    </div>
                    <div class="form-group">
                        <label>AVSC:</label>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>OD: {{$historia->avsc_od}}</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>OI: {{$historia->avsc_oi}}</label>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>AVMC:</label>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>OD: {{$historia->avmc_od}}</label>
                        </div>
                        <div class="form-group col-sm-6">
                        <   <label>OI: {{$historia->avmc_oi}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Refracción:</label>
                        <textarea readonly="" class="form-control" style="resize:none;" rows="2" name="refraccion">{{$historia->refracc}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Anexos Oculares:</label>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <label>OD: {{$historia->anex_od}}</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>OI: {{$historia->anex_oi}}</label>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Biomicroscopia:</label>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <label>OD: {{$historia->bio_od}}</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>OI: {{$historia->bio_oi}}</label>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label>Presión Intraocular:</label>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <label>OD: {{$historia->presion_od}}</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>OI: {{$historia->presion_oi}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fecha: {{$historia->fecha}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('mainscript')

@endsection