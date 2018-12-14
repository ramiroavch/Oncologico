@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection

@section('title')
<title>Ver Retinoblastoma</title>
<div class="row">
    <h2 class="font-bold">Retinoblastoma</h2>
</div>
<div class="row">
    <div class="form-group">
        <div class="col-sm-1 pull-right">
            <a class="btn btn-primary" href="{{ route('AgregarRetino.edit',$historia) }}">Modificar</a>
        </div>
    </div>
</div>
@endsection
@section('Menu')
<li class="">
	<a href=""><i class="fa fa-edit"></i><span class="nav-label">Historias</span><span class="fa arrow">
	</span></a>
	<ul class="nav nav-second-level">
    	<li>
    		<a href="{{route('home')"}}>Buscar Historia</a>
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
	<a href="{{route('register')}}"><i class="fa fa-plus"></i><span class="nav-label">Crear Usuario</span>
</li>
@endif
@endsection
@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Pacientes de Retinoblastoma</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                            <label >N°historia: {{$historia}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Fecha Ingreso: {{$retino->fecha}}</label>
                            </div>
                            <div class="col-sm-1">
                                
                            </div>
                            <div class="col-sm-4">
                                <label>Tiempo de retraso: {{$retino->retraso}}</label>
                            </div>
                        </div>  
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                            <label>Retinoblastoma OD: {{$retino->retinood}}</label>
                            </div>
                            <div class="col-sm-1">
                                
                            </div>
                            <div class="col-sm-4">
                            <label>Retinoblastoma OI: {{$retino->retinooi}}</label>
                            </div>
                        </div>
                        
                    </div>
                        <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Germinal: {{$retino->germinal}}</label>
                            </div>
                            <div class="col-sm-1">
                                
                            </div>
                            <div class="col-sm-4">
                                <label>Esporádico: {{$retino->esporadico}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            <label >Enucleación(fecha):</label>
                            </div>
                            <div class="col-sm-3">
                            <label >OD: {{$retino->enucleod}}</label>
                            </div>
                            <div class="col-sm-3">
                            <label >OI: {{$retino->enucleoi}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label >Resultado Bx:</label>
                            </div>
                            <div class="col-sm-2">
                            <label>OD: {{$retino->bxod}}</label>
                            </div>
                            <div class="col-sm-1">
                            <label >Fecha OD {{$retino->fechabxod}}:</label>
                            </div>
                            <div class="col-sm-2">
                            <label>OI: {{$retino->bxoi}}</label>
                            </div>
                            <div class="col-sm-1">
                            <label >Fecha OI: {{$retino->fechabxoi}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label >Quimioterapia Ciclos:</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Ciclo 1: {{$retino->ciclo1}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Ciclo 2: {{$retino->ciclo2}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Ciclo 3: {{$retino->ciclo3}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Ciclo 4: {{$retino->ciclo4}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Ciclo 5: {{$retino->ciclo5}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-2">
                            <label>Ciclo 6: {{$retino->ciclo6}}</label>
                            </div>
                            <div class="col-sm-1">
                            <label>Otros:</label>
                            </div>
                            <div class="col-sm-6">
                                <textarea readonly class="form-control" style="resize:none;" rows="2" name="ciclootros">{{$retino->ciclo_otro}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label>Medicamentos:</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Medicamento 1: {{$retino->medic1}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Medicamento 2: {{$retino->medic2}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Medicamento 3: {{$retino->medic3}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Medicamento 4: {{$retino->medic4}}</label>
                            </div>
                            <div class="col-sm-2">
                            <label>Medicamento 5: {{$retino->medic5}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-2">
                                <label>Medicamento 6: {{$retino->medic6}}</label>
                            </div>
                            <div class="col-sm-1">
                                <label>Otros:</label>
                            </div>
                            <div class="col-sm-6">
                                <textarea readonly class="form-control" style="resize:none;" rows="2" name="medotros">{{$retino->medicotros}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                                <label>Radioterapia:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea readonly class="form-control" style="resize:none;" rows="2" name="radio">{{$retino->radio}}</textarea>
                            </div>
                            <div class="col-sm-2">
                                <label>Lugar del tratamiento:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea readonly class="form-control" style="resize:none;" rows="2" name="lugartrat">{{$retino->lugar}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                                <label>OD dósis</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea readonly class="form-control" style="resize:none;" rows="2" name="dosisod">{{$retino->dosisod}}</textarea>
                            </div>
                            <div class="col-sm-2">
                                <label>OI dósis:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea readonly class="form-control" style="resize:none;" rows="2" name="dosisoi">{{$retino->dosisoi}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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