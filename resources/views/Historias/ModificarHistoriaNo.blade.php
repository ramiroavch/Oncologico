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
<title>Modificar Historia</title>
<form class="form-group" method="POST" action="{{route('HistoriaNo.update',$historia->num_h)}}">
    @method('PUT')
    @csrf
<h2 class="font-bold">Modificar Historia No Oncológica</h2>
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
    <button class="btn btn-primary pull-right" type="submit">Guardar Cambios</button>
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
    	<li class="">
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
                        <input type="text" class="form-control input-sm" name="cedula" placeholder="C.I" value="{{$paciente->ci}}">   
                    </div> 
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="nombre1" placeholder="Primer Nombre" value="{{$paciente->nombre1}}">    
                    </div>   
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="nombre2" placeholder="Segundo Nombre" value="{{$paciente->nombre2}}">
                    </div> 
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="apellido1" placeholder="Primer Apellido" value="{{$paciente->apellido1}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="apellido2" placeholder="Segundo Apellido" value="{{$paciente->apellido2}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name=tlf" placeholder="Teléfono" value="{{$paciente->tlf}}">
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Fecha Nacimiento:</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="fecha_nac" value="{{$paciente->fecha_nac}}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Procedencia:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="procedencia">{{$paciente->procedencia}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Referencia:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="referencia">{{$paciente->referencia}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="lic" placeholder="LIC." value="{{$paciente->Lic}}">
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Enfermedad actual:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="enf_actual">{{$historia->enfer_actual}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Diagnóstico:</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Descripción:</label>
                        <textarea class="form-control" style="resize:none;" rows="3" name="diagnosdescrip">{{$historia->diagnostico}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Fondo de ojo:</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">OD:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="fondo_od">{{$historia->fondo_od}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">OI:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="fondo_oi">{{$historia->fondo_oi}}</textarea>
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
                        <label class="font-noraml">Madre:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antecmadre">{{$historia->antec_madre}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Padre:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antecpadre">{{$historia->antec_padre}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Otros:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antecotros">{{$historia->antec_otros}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Otros Antecedentes:</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Personales:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antecpersonal">{{$historia->antec_person}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Oftalmológicos:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antecoftal">{{$historia->antec_oftal}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Quirúrgicos:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antecquirur">{{$historia->antec_quirur}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Historia Oftalmológica(2):</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Balance Muscular:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="balmus">{{$historia->bal_musc}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Diagnóstico:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="diagnoshist">{{$historia->diagnostico}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Plan:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="plan">{{$historia->plan}}</textarea>
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
                            <input type="text" class="form-control" name="nembarazo" placeholder="N° Embarazo" value="{{$historia->N_emb}}">
                        </div>
                    </div>
                        <div class="form-group">
                            <input type="hidden" name="control" value="false">
                            @if($historia->emb_cont=='1')
                            <label> <input type="checkbox" name="control" value="true">controlado</label>
                            @else
                            <label> <input type="checkbox" checked="checked" name="control" value="true">controlado</label>
                            @endif
                        </div>
                        <div class="hr-line-dashed"></div>
                    
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="peso_nac" placeholder="Peso al nacer" value="{{$historia->peso_nac}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="talla_nac" placeholder="Talla al nacer" value="{{$historia->talla_nac}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6"">
                            <input type="text" class="form-control" name="semanas" placeholder="Semanas" value="{{$historia->semanas}}">
                        </div>
                    </div>
                        <div class="form-group">
                            <input type="hidden" name="cesar" value="false">
                            @if($historia->emb_cesar=='1')
                                <label> <input type="checkbox" name="cesar" value="true">Cesárea</label> 
                            @else
                                <label> <input type="checkbox" name="cesar" checked="checked" value="true">Cesárea</label> 
                            @endif
                        </div> 
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="font-noraml">Complicaciones Maternas:</label>
                            <textarea class="form-control" style="resize:none;" rows="2" name="comp_mat">{{$historia->comp_mat}}</textarea>
                        </div>  
                        <div class="form-group">
                            <label class="font-noraml">Complicaciones al Nacer:</label>
                            <textarea class="form-control" style="resize:none;" rows="2" name="comp_nac">{{$historia->comp_nac}}</textarea>
                        </div> 
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Historia Oftalmológica(1):</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <input type="text" disabled class="form-control" name="nhistoria" placeholder="N° Historia" value="{{$historia->num_h}}">
                    </div>
                    <div class="form-group">
                        <label class="font-noraml">AVSC:</label>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="avsc_od" placeholder="OD" value="{{$historia->avsc_od}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="avsc_oi" placeholder="OI" value="{{$historia->avsc_oi}}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">AVMC:</label>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="avmc_od" placeholder="OD" value="{{$historia->avmc_od}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="avmc_oi" placeholder="OI" value="{{$historia->avmc_oi}}">
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="font-noraml">Refracción:</label>
                            <textarea class="form-control" style="resize:none;" rows="2" name="refraccion">{{$historia->refracc}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Anexos Oculares:</label>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="anex_od" placeholder="OD" value="{{$historia->anex_od}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="anex_oi" placeholder="OI" value="{{$historia->anex_oi}}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Biomicroscopia:</label>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="bio_od" placeholder="OD" value="{{$historia->bio_od}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="bio_oi" placeholder="OI" value="{{$historia->bio_oi}}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Presión Intraocular:</label>
                    </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="pres_od" placeholder="OD" value="{{$historia->presion_od}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="pres_oi" placeholder="OI" value="{{$historia->presion_oi}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-noraml">Fecha:</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="{{$historia->fecha}}" name="fecha">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('mainscript')

@endsection
</form>