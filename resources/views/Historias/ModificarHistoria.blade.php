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
<title>Modificar Historia</title>
<form class="form-group" method="POST" action="{{route('VerHistoria.update',$historia->num_h)}}">
    @method('PUT')
    @csrf
<h2 class="font-bold">Modificar Historia Oncológica</h2>
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
    <div class="form-group">
        <div class="col-sm-2 pull-right">
            <button class="btn btn-primary pull-right" type="submit">Guardar Cambios</button>
        </div>
    </div>
</div>
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
<li>
    <a href=""><i class="fa fa-files-o"></i><span class="nav-label">Agregar</span><span class="fa arrow">
	</span></a>
	<ul class="nav nav-second-level">
        <li class="">
            <a href="{{route('AgregarHistoria')}}">Historia Oncologica</a>
        </li>
        <li>
            <a href="{{route('AgregarHistoriaNo')}}">Historia No Oncologica</a>
        </li>
    </ul>
</li>
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
                        <input type="text" class="form-control input-sm" name="telefono" placeholder="Teléfono" value="{{$paciente->tlf}}">
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group" id="data_1">
                                <label class="font-noraml">Fecha Nacimiento</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecha_nac" class="form-control" value="{{$paciente->fecha_nac}}">
                                </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Procedencia</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="procedencia">{{$paciente->procedencia}}   
                        </textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Referencia</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="referencia">{{$paciente->referencia}}
                        </textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="lic" placeholder="LIC" value="{{$paciente->Lic}}">
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Signos</h5>
                </div>

                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Dónde consultó al tener los signos:</label>
                        <textarea class="form-control" style="resize:none;" rows="3" name="lugarsignos">{{$historia->lugar_sign}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Qué le dijeron:</label>
                        <textarea class="form-control" style="resize:none;" rows="3" name="descripsignos">{{$historia->desc_sign}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Tratamiento que recibió:</label>
                        <textarea class="form-control" style="resize:none;" rows="3" name="tratsignos">{{$historia->trat_sign}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Historia Oftalmológica(3)</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Fondo de ojo:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="fondo_ojo">{{$historia->fondo_ojo}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Diagnóstico:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="diagnos">{{$historia->diagnostico}}</textarea>
                    </div>
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
                    <h5>Otros Datos</h5>
                </div>
                <div class="ibox-content">
                        <div class="row">
                            <label class="font-noraml col-sm-12">Leucocoria:</label>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                            <input type="text" class="form-control" name="edadleuco" placeholder="Edad" value="{{$historia->leucoria_edad}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="leuOD" placeholder="OD" value="{{$historia->leu_od}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="leuOI" placeholder="OI" value="{{$historia->leu_oi}}">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="font-noraml">Estrabismo:</label>
                            <input type="text" class="form-control input-sm" name="estraedad" placeholder="Edad" value="{{$historia->estrabismo_edad}}"> 
                        </div> 
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="estraOD" placeholder="OD" value="{{$historia->estra_od}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="estraOI" placeholder="OI" value="{{$historia->estra_oi}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="estraET" placeholder="ET" value="{{$historia->estra_et}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="estraXT" placeholder="XT" value="{{$historia->estra_xt}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="estraHT" placeholder="HT" value="{{$historia->estra_ht}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="font-noraml">Celulitis:</label>
                            <input type="text" class="form-control input-sm" name="celedad" placeholder="Edad" value="{{$historia->celulitis_edad}}">
                        </div> 
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="celOD" placeholder="OD" value="{{$historia->cel_od}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="celOI" placeholder="OI" value="{{$historia->cel_oi}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="font-noraml">Otro:</label>
                            <textarea class="form-control" style="resize:none;" rows="3" name="otro">{{$historia->otro}}</textarea>
                        </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Antecedentes Familiares</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Madre:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antemadre">{{$historia->antec_madre}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Padre:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antepadre">{{$historia->antec_padre}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Hermanos:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="anteherm">{{$historia->antec_hermanos}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Historia Oftalmológica(2)</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Balance Muscular:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="balmus">{{$historia->bal_musc}}</textarea>
                    </div>
                     <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label class="font-noraml">PIO:</label>
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="text" class="form-control" name="piod" placeholder="OD" value="{{$historia->pio_od}}">
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="text" class="form-control" name="pioi" placeholder="OI" value="{{$historia->pio_oi}}">
                        </div>
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
                            @if($historia->emb_cont =='1')
                                <label> <input type="checkbox" name="control" value="true">controlado</label>
                            @else
                                <label> <input checked="checked" type="checkbox" value="true" name="control">controlado</label>
                            @endif
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="pesonac" placeholder="Peso" value="{{$historia->peso_nac}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="tallanac" placeholder="Talla" value="{{$historia->talla_nac}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="cesar" value="false">
                            <input type="hidden" name="complic" value="false">
                            @if($historia->emb_cesar =='1')
                                <label> <input type="checkbox" name="cesar" value="true">Cesárea</label>
                            @else
                                <label> <input checked="checked" type="checkbox" value="true" name="cesar">Cesárea</label>
                            @endif

                            @if($historia->nac_comp =='1')
                                <label> <input type="checkbox" name="complic" value="true">Complicaciones</label>
                            @else
                                <label> <input checked="checked" type="checkbox" value="true" name="complic">Complicaciones</label>
                            @endif
                        </div>   
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Otros Antecedentes:</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <label class="font-noraml">Médicos:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antmedicos">{{$historia->antec_med}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Quirúrgicos:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="antquirur">{{$historia->antec_quirur}}</textarea>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Historia Oftalmológica(1)</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <input disabled type="text" class="form-control" name="nhistoria" placeholder="N° Historia" value="{{$historia->num_h}}">
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Fecha:</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="datehist" class="form-control" value="{{$historia->fecha}}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label class="font-noraml">AV:</label>
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="text" class="form-control" name="avod" placeholder="OD" value="{{$historia->av_od}}">
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="text" class="form-control" name="avoi" placeholder="OI" value="{{$historia->av_oi}}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Anexos:</label>
                    </div>
                    <div class="form-group">
                        <label class="font-noraml">OD:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="anexod">{{$historia->anex_od}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-noraml">OI:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="anexoi">{{$historia->anex_oi}}</textarea>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="font-noraml">Biomicroscopia:</label>
                    </div>
                    <div class="form-group">
                        <label class="font-noraml">OD:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="biood">{{$historia->bio_od}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-noraml">OI:</label>
                        <textarea class="form-control" style="resize:none;" rows="2" name="biooi">{{$historia->bio_oi}}</textarea>
                    </div>
                </div>
            </div>
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