@extends('layouts.app2')

@section('includes')
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
     <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
     <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
     <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
@endsection

@section('title')
<title>Ver Controles</title>
<!--<form class="form-group" method="GET" action="VerHistoria" enctype="multipart/form-data">
 @csrf-->
<h2 class="font-bold">Busqueda de Controles</h2>
<!--@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif-->
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
@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Resultados</h5>
                </div>
                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                        <thead>
                            <tr>
                                <th data-toggle="true">Numero Control</th>
                                <th>fecha</th>
                                <th>AV OD</th>
                                <th>AV OI</th>
                                <th>Balance Muscular</th>
                                <th data-hide="all">Anexo OD</th>
                                <th data-hide="all">Anexo OI</th>
                                <th data-hide="all">Bio OD</th>
                                <th data-hide="all">Bio OI</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($controls as $control)
                            <tr>
                                <td>{{ $control->num_control }}</td>
                                <td>{{ $control->fecha }}</td>
                                <td>{{ $control->avod }}</td>
                                <td>{{ $control->avid }}</td>
                                <td>{{ $control->balmus }}</td>
                                <td><span class="pie">{{ $control->anexod }}</span></td>
                                <td>{{ $control->anexid }}</td>
                                <td>{{ $control->biood }}</td>
                                <td>{{ $control->biooi }}</td>
                                <td><a class="btn btn-info" href="{{ route('ListaControles.show',$control->num_control) }}">Show</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('mainscript')
<script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>
@endsection
<!--</form>-->
