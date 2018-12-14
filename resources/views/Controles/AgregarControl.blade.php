@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection

@section('title')
<title>Agregar Control</title>
<form class="form-group" method="POST" action="AgregarControl">
    @csrf
<h2 class="font-bold">Agregar Nuevo Control</h2>
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
                            <label class="font-noraml">N°historia:</label>
                            </div>
                            <div class="col-sm-1">
                                @if($historia=='NULL')
                                    <input type="text" readonly="readonly" class="form-control" name="historia" value="{{$historiano}}">
                                @else
                                    <input type="text" readonly="readonly" class="form-control" name="historia" value="{{$historia}}">
                                @endif
                            </div>
                            <div class="col-sm-6">
                                @if($historia=='NULL')
                                    <input type="hidden" name="oncologico" value="false">
                                    <label> <input disabled="" type="checkbox" name="oncologico" value="false">Oncológico</label>
                                @else
                                    <input type="hidden" name="oncologico" value="true">
                                    <label> <input disabled="" disabled="disabled" checked="checked" type="checkbox" name="oncologico" value="true">Oncológico</label>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="ncontrol" placeholder="N° Control">    
                            </div>
                            <div class="col-sm-2">
                                
                            </div>
                            <div class="col-sm-1">
                                <label class="font-noraml">Fecha</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecha" class="form-control" value="03/04/2014">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label class="font-noraml">AV:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="avod" placeholder="OD">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="avid" placeholder="OI">
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">Anexos:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="anexod" placeholder="OD">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="anexid" placeholder="OI">
                            </div>
                        </div>
                    </div>
                        <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            <label class="font-noraml">Biomicroscopia:</label>
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">OD:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="biood">   
                            </textarea>
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">OI:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="biooi">   
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            <label class="font-noraml">Balance Muscular:</label>
                            </div>
                            <div class="col-sm-8">
                            <textarea class="form-control" style="resize:none;" rows="2" name="balmus">   
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label class="font-noraml">Pio:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="piood" placeholder="OD">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="piooi" placeholder="OI">
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-2">
                            <label class="font-noraml">Fondo de ojo:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="fonojo">   
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label class="font-noraml">Diagnostico:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="diag">
                            </textarea>
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">Plan:</label>
                            </div>
                            <div class="col-sm-4">
                            <textarea class="form-control" style="resize:none;" rows="2" name="plan">   
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary pull-right" type="submit">Agregar Control</button>
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