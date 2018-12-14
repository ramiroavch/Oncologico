@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection

@section('title')
<title>Modificar Control</title>
<form class="form-group" method="POST" action="{{route('AgregarControl.update',$control->num_control)}}">
    @method('PUT')
    @csrf
<h2 class="font-bold">Modificar Control</h2>
<div class="row">
    <button class="btn btn-primary pull-right" type="submit">Guardar Cambios</button>
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
                    <h5>Evolución Médica oftalmológica</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label>N°historia:</label>
                            </div>
                            <div class="col-sm-2">
                                    <input type="text" readonly="readonly" class="form-control" name="historia" value="{{$nhistoria}}">
                            </div>
                            <div class="col-sm-2">
                                @if($control->historia_id==NULL)
                                    <input type="hidden" name="oncologico" value="false">
                                    <label> <input disabled type="checkbox" name="oncologico" value="true">Oncológico</label>
                                @else
                                    <input type="hidden" name="oncologico" value="true">
                                    <label> <input disabled checked="checked" type="checkbox" name="oncologico" value="true">Oncológico</label>
                                @endif
                            </div>
                            <div class="col-sm-1">
                            <label>N° Control:</label>
                            </div>
                            <div class="col-sm-2">
                                    <input type="text" readonly="readonly" checked="checked" class="form-control" name="ncontrol" value="{{$control->num_control}}">
                            </div>
                            <div class="col-sm-1">
                                <label>Fecha:</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecha" class="form-control" value="{{$control->fecha}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label>AV:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="avod" placeholder="OD" value="{{$control->avod}}">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="avid" placeholder="OI" value="{{$control->avid}}">
                            </div>
                            <div class="col-sm-1">
                            <label>Anexos:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="anexod" placeholder="OD" value="{{$control->anexod}}">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="anexid" placeholder="OI" value="{{$control->anexid}}">
                            </div>
                        </div>
                    </div>
                        <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            <label>Biomicroscopia:</label>
                            </div>
                            <div class="col-sm-1">
                            <label>OD:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="biood">{{$control->biood}}</textarea>
                            </div>
                            <div class="col-sm-1">
                            <label>OI:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="biooi">{{$control->biooi}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            <label>Balance Muscular:</label>
                            </div>
                            <div class="col-sm-8">
                            <textarea class="form-control" style="resize:none;" rows="2" name="balmus">{{$control->balmus}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label>Pio:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="piood" placeholder="OD" value="{{$control->piood}}">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="piooi" placeholder="OI" value="{{$control->piooi}}">
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-2">
                            <label>Fondo de ojo:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="fonojo">{{$control->fonojo}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label>Diagnostico:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="diag">{{$control->diag}}</textarea>
                            </div>
                            <div class="col-sm-1">
                            <label>Plan:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="plan">{{$control->plan}}</textarea>
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
</form>