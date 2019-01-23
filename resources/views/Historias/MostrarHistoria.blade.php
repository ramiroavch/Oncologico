@extends('layouts.app2')

@section('includes')
<link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
<link href="{{ asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{ asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('title')
<title>Ver Historia</title>
<div class="row">
    <h2 class="font-bold">Ver Historia Oncológica</h2>
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
    <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2 ">
        <a class="btn btn-primary" href="{{ route('AgregarControl.index',['historia'=>$historia->num_h,'historiano'=>'NULL'])}}">Agregar
            Control</a>
    </div>
    <div class="form-group col-2 col-sm-2 col-md-2  col-lg-2">
        <a class="btn btn-primary" href="{{ route('ListaControles.index',['historia'=>$historia->num_h,'historiano'=>'NULL'])}}">Ver
            Controles</a>
    </div>
    @if($paciente->historia_id!=NULL)
    <div class="form-group col-2 col-sm-2 col-md-3 col-lg-3">
        @if($retino==NULL)
        <a class="btn btn-primary" href="{{ route('AgregarRetino.index',['historia'=>$historia->num_h])}}">Llenar
            Retinoblastoma</a>
        @else
        <a class="btn btn-primary" href="{{ route('AgregarRetino.show',['historia'=>$historia->num_h])}}">Ver
            Retinoblastoma</a>
        @endif
    </div>
    @endif

    <div class="form-group col-2 col-sm-2 col-md-2 col-lg-2">
        <a class="btn btn-primary" href="{{ route('VerHistoria.edit',['historian'=>$historia->num_h]) }}">Modificar
            Historia</a>
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
                        <label>C.I: {{ $paciente->ci }}</label>
                    </div>
                    <div class="form-group">
                        <label>Primer Nombre: {{$paciente->nombre1}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>Segundo Nombre: {{$paciente->nombre2}} </label>
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
                    <div class="form-group" id="data_1">
                        <label>Fecha Nacimiento: {{$paciente->fecha_nac}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>Procedencia: {{$paciente->procedencia}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>Referencia: {{$paciente->referencia}}</label>
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
                        <label class="font-noraml">Dónde consultó al tener los signos:</label>
                        <textarea readonly class="form-control" style="resize:none;" rows="3" name="lugarsignos">{{$historia->lugar_sign}}</textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label class="font-noraml">Qué le dijeron:</label>
                        <textarea readonly class="form-control" style="resize:none;" rows="3" name="descripsignos">{{$historia->desc_sign}}</textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label class="font-noraml">Tratamiento que recibió:</label>
                        <textarea readonly class="form-control" style="resize:none;" rows="3" name="tratsignos">{{$historia->trat_sign}}</textarea>
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
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="antemadre">{{$historia->antec_madre}}</textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                            <label class="font-noraml">Padre:</label>
                            <textarea readonly class="form-control" style="resize:none;" rows="2" name="antepadre">{{$historia->antec_padre}}</textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                            <label class="font-noraml">Hermanos:</label>
                            <textarea readonly class="form-control" style="resize:none;" rows="2" name="anteherm">{{$historia->antec_hermanos}}</textarea>
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="row">
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <h2>Antecedentes Prenatales:</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                            <label>N° embarazo: {{$historia->N_emb}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                            <label>Peso: {{$historia->peso_nac}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                            <label>Talla: {{$historia->talla_nac}}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-sm-2">
                    <div class="form-group">
                        @if($historia->emb_cont == '1')
                        <label> <input disabled="disabled" type="checkbox" name="control" value="true">controlado</label>
                        @else
                        <label> <input disabled="disabled" checked="checked" type="checkbox" name="control" value="true">controlado</label>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <div class="form-group">
                        @if($historia->emb_cesar =='1')
                        <label> <input disabled="disabled" type="checkbox" name="control" value="true">Cesárea</label>
                        @else
                        <label> <input disabled="disabled" checked="checked" type="checkbox" name="control" value="true">Cesárea</label>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <div class="form-group">
                        @if($historia->nac_comp == '1')
                        <label> <input disabled="disabled" type="checkbox" name="control" value="true">Complicaciones</label>
                        @else
                        <label> <input disabled="disabled" checked="checked" type="checkbox" name="control" value="true">Complicaciones</label>
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
                        <label class="font-noraml">Médicos:</label>
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="antmedicos">{{$historia->antec_med}}</textarea>
                    </div>                            
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label class="font-noraml">Quirúrgicos:</label>
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="antquirur">{{$historia->antec_quirur}}</textarea>
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
                        <h4>Leucoria</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>Edad: {{$historia->leucoria_edad}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OD: {{$historia->leu_od}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OI: {{$historia->leu_oi}}</label>
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
                        <label>Edad: {{$historia->estrabismo_edad}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OD: {{$historia->estra_od}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OI: {{$historia->estra_oi}}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>ET: {{$historia->estra_et}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>XT: {{$historia->estra_xt}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>HT: {{$historia->estra_ht}}</label>
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
                        <label>Edad: {{$historia->celulitis_edad}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OD: {{$historia->cel_od}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OI: {{$historia->cel_oi}}</label>
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
                        <textarea readonly class="form-control" style="resize:none;" rows="3" name="otro">{{$historia->otro}}</textarea>
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
                        <label>Fecha: {{$historia->fecha}}</label>
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
                        <label>OD: {{$historia->av_od}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OI: {{$historia->av_oi}}</label>
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
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="anexod">{{$historia->anex_od}}</textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <h5>OI</h5>
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="anexoi">{{$historia->anex_oi}}</textarea>
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
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="biood">{{$historia->bio_od}}</textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">            
                    <div class="form-group">
                        <h5>OI</h5>
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="biooi">{{$historia->bio_oi}}</textarea>
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
                            <textarea readonly class="form-control" style="resize:none;" rows="2" name="balmus">{{$historia->bal_musc}}</textarea>
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
                        <label>OD: {{$historia->pio_od}}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="form-group">
                        <label>OI: {{$historia->pio_oi}}</label>
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
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="diagnos">{{$historia->diagnostico}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h4>Plan<h4>
                        <textarea readonly class="form-control" style="resize:none;" rows="2" name="plan">{{$historia->plan}}</textarea>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection

@section('mainscript')


<!-- Custom and plugin javascript -->
<script type="text/javascript" src="{{ asset('js/inspinia.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Chosen -->
<script type="text/javascript" src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script>

<!-- JSKnob -->
<script type="text/javascript" src="{{ asset('js/plugins/jsKnob/jquery.knob.js') }}"></script>

<!-- Input Mask-->
<script type="text/javascript" src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

<!-- Data picker -->
<script type="text/javascript" src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

<!-- Image cropper -->
<script type="text/javascript" src="{{ asset('js/plugins/cropper/cropper.min.js') }}"></script>
@endsection