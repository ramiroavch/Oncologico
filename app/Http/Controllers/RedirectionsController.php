<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views;

class RedirectionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function AgregarHistoria(){
		return view('Historias.AgregarHistoria');
	}
	public function AgregarHistoriaNo(){
		return view('Historias.AgregarHistoriaNo');
	}
	public function AgregarControl(){
		return view('Controles.AgregarControl');
	}
	public function AgregarControlNo(){
		return view('Controles.AgregarControlNo');
	}
	public function BuscarControl(){
		return view('Controles.BuscarControl');
	}
	public function test(){
		return view('Historias.MostrarListado');
	}    
}

