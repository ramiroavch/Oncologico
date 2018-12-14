<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Control;
use App\Http\Requests\StoreControlRequest;
use resources\views;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
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
            return view('Controles.AgregarControl',['historia'=>'NULL','historiano'=>$historiano]);
        }
        else
        {
            return view('Controles.AgregarControl',['historia'=>$historia,'historiano'=>'NULL']);
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
        $exist = DB::table('controls')->where('num_control','=',$request->input('ncontrol'))->exists();
        if($exist==false)
        {
            $control=new Control();
            if($request->input('oncologico')=='false')
            {
                $query = DB::table('h__no__oncols')->where('num_h','=',$request->input('historia'))->get()->first();
                $control->historiano_id=$query->id;
            }
            else
            {
                $query = DB::table('h__oncols')->where('num_h','=',$request->input('historia'))->get()->first();
                $control->historia_id=$query->id;
            }
            $control->num_control=$request->input('ncontrol');
            $fecha = $request->input('fecha');
            $newDate = date("Y-m-d", strtotime($fecha));
            $control->fecha=$newDate;
            $control->avod=$request->input('avod');
            $control->avid=$request->input('avid');
            $control->anexod=$request->input('anexod');
            $control->anexid=$request->input('anexid');
            $control->biood=$request->input('biood');
            $control->biooi=$request->input('biooi');
            $control->balmus=$request->input('balmus');
            $control->piood=$request->input('piood');
            $control->piooi=$request->input('piooi');
            $control->fonojo=$request->input('fonojo');
            $control->diag=$request->input('diag');
            $control->plan=$request->input('plan');
            try
            {
            $control->save();
            }
            catch (\Exception $e)
            {
                return redirect()->back()->withErrors(['errorshow' => 'Error al guardar el control']);
            }
            Return(view('Controles.MostrarControl',['control'=>$control,'nhistoria'=>$request->input('historia')]));
            }
        else
        {
            return redirect()->back()->withErrors(['errorshow' => 'Ya existe un control con ese número']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = DB::table('controls')->where('num_control','=',$id)->get()->first();
        $exist = DB::table('controls')->where('num_control','=',$id)->exists();
        if($exist==true)
        {
            if($query->historiano_id==NULL)
            {
                $historia=DB::table('h__oncols')->where('id','=',$query->historia_id)->get()->first();
            }
            else
            {
                $historia=DB::table('h__no__oncols')->where('id','=',$query->historiano_id)->get()->first();
            }
            return(view('Controles.ModificarControl',['control'=>$query,'nhistoria'=>$historia->num_h]));
        }
        else
        {
            return redirect()->back()->withErrors(['errorshow' => 'No se encontró el control']);
        }

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
        $query = DB::table('controls')->where('num_control','=',$id)->get()->first();
        $new =Control::findOrFail($query->id);
        $fecha = $request->input('fecha');
        $newDate = date("Y-m-d", strtotime($fecha));
        $new->fecha=$newDate;
        $new->avod=$request->input('avod');
        $new->avid=$request->input('avid');
        $new->anexod=$request->input('anexod');
        $new->anexid=$request->input('anexid');
        $new->biood=$request->input('biood');
        $new->biooi=$request->input('biooi');
        $new->balmus=$request->input('balmus');
        $new->piood=$request->input('piood');
        $new->piooi=$request->input('piooi');
        $new->fonojo=$request->input('fonojo');
        $new->diag=$request->input('diag');
        $new->plan=$request->input('plan');
        $new->save();
         return redirect()->back();
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
