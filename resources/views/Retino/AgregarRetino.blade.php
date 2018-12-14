@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection

@section('title')
<title>Agregar Retinoblastoma</title>
<form class="form-group" method="POST" action="AgregarRetino">
    @csrf
<div class="row">
    <h2 class="font-bold">Retinoblastoma</h2>
</div>
<div class="row">
@if ($errors->any())    
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif
</div>
<div class="row">
    <div class="form-group">
        <div class="col-sm-1 pull-right">
            <button class="btn btn-primary">Agregar</button>
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
                            <div class="col-sm-1">
                            <label class="font-noraml">N°historia:</label>
                            </div>
                            <div class="col-sm-1">
                                    <input type="text" readonly="readonly" class="form-control" name="historia" value="{{$historia}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                                <label class="font-noraml">Fecha Ingreso: </label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecha" class="form-control" value="03/04/2014">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                
                            </div>
                            <div class="col-sm-2">
                                <label class="font-noraml">Tiempo de retraso:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="retraso" placeholder="">
                            </div>
                        </div>  
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label class="font-noraml">Retinoblastoma OD:</label>
                            </div>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" name="retinood" placeholder="">
                            </div>
                            <div class="col-sm-1">
                                
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">Retinoblastoma OI:</label>
                            </div>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" name="retinooi" placeholder="">
                            </div>
                        </div>
                        
                    </div>
                        <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="germinal" placeholder="Germinal">
                            </div>
                            <div class="col-sm-1">
                                
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="espor" placeholder="Esporádico">
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            <label class="font-noraml">Enucleación(fecha):</label>
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">OD:</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="enucleod" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">OI:</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="enucleoi" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label class="font-noraml">Resultado Bx:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="resultod" placeholder="OD">
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">Fecha OD:</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecharesultod" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="resultoi" placeholder="OI">
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">Fecha OI:</label>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" id="data_1">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecharesultoi" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label class="font-noraml">Quimioterapia Ciclos:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="clase1" placeholder="Ciclo 1">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="clase2" placeholder="Ciclo 2">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="clase3" placeholder="Ciclo 3">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="clase4" placeholder="Ciclo 4">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="clase5" placeholder="Ciclo 5">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="clase6" placeholder="Ciclo 6">
                            </div>
                            <div class="col-sm-1">
                            <label class="font-noraml">Otros:</label>
                            </div>
                            <div class="col-sm-6">
                                <textarea class="form-control" style="resize:none;" rows="2" name="ciclootros"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            <label class="font-noraml">Medicamentos:</label>
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="med1" placeholder="Medicamento 1">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="med2" placeholder="Medicamento 2">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="med3" placeholder="Medicamento 3">
                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="med4" placeholder="Medicamento 4">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="med5" placeholder="Medicamento 5">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="med6" placeholder="Medicamento 5">
                            </div>
                            <div class="col-sm-1">
                                <label class="font-noraml">Otros:</label>
                            </div>
                            <div class="col-sm-6">
                                <textarea class="form-control" style="resize:none;" rows="2" name="medotros"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                                <label class="font-noraml">Radioterapia:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea class="form-control" style="resize:none;" rows="2" name="radio"></textarea>
                            </div>
                            <div class="col-sm-2">
                                <label class="font-noraml">Lugar del tratamiento:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea class="form-control" style="resize:none;" rows="2" name="lugartrat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-1">
                                <label class="font-noraml">OD dósis</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea class="form-control" style="resize:none;" rows="2" name="dosisod"></textarea>
                            </div>
                            <div class="col-sm-2">
                                <label class="font-noraml">OI dósis:</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea class="form-control" style="resize:none;" rows="2" name="dosisoi"></textarea>
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