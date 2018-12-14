<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ListaControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historia=Input::get('historia');
        $historiano=Input::get('historiano');
        if($historia=='NULL')
        {
            $query = DB::table('h__no__oncols')->where('num_h','=',$historiano)->get()->first();
            $exist=DB::table('controls')->where('historiano_id','=',$query->id)->exists();
            $controls=DB::table('controls')->where('historiano_id','=',$query->id)->get();
            $aux=$historia;
        }
        else
        {
            $query = DB::table('h__oncols')->where('num_h','=',$historia)->get()->first();
            $exist=DB::table('controls')->where('historia_id','=',$query->id)->exists();
            $controls=DB::table('controls')->where('historia_id','=',$query->id)->get();
            $aux=$historiano;
        }

        if ($exist==true)
        {
            return view('Controles.MostrarListado',['controls'=>$controls]);  
        }
        else
        {
            return redirect()->back()->withErrors(['errorshow' => 'No se encontró ningun control']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $control=DB::table('controls')->where('num_control','=',$id)->get()->first();
        if($control->historia_id==NULL)
        {
            $historia=DB::table('h__no__oncols')->where('id','=',$control->historiano_id)->get()->first();
            return(view('Controles.MostrarControl',['control'=>$control,'nhistoria'=>$historia->num_h]));
        }
        else
        {
            $historia=DB::table('h__oncols')->where('id','=',$control->historiano_id)->get()->first();
            return(view('Controles.MostrarControl',['control'=>$control,'nhistoria'=>$id]));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
