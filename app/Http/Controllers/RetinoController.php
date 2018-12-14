<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\retinoblastoma;
use resources\views;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class RetinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historia=Input::get('historia');
        return(view('Retino.AgregarRetino',['historia'=>$historia]));
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
        //dd($request->all());
        $query = DB::table('h__oncols')->where('num_h','=',$request->input('historia'))->get()->first();
        $retino = new retinoblastoma();
        $retino->historia_id=$query->id;

        $fecha = $request->input('fecha');
        $newDate = date("Y-m-d", strtotime($fecha));
        $retino->fecha=$newDate;
        $retino->retraso=$request->input('retraso');
        $retino->retinood=$request->input('retinood');
        $retino->retinooi=$request->input('retinooi');
        $retino->germinal=$request->input('germinal');
        $retino->esporadico=$request->input('espor');

        if($request->input('enucleod')!=null)
        {
            $fecha = $request->input('enucleod');
            $newDate = date("Y-m-d", strtotime($fecha));
            $retino->enucleod=$newDate;
        }
        else
        {
            $retino->enucleod=null;
        }

        if($request->input('enucleoi')!=null)
        {
            $fecha = $request->input('enucleoi');
            $newDate = date("Y-m-d", strtotime($fecha));
            $retino->enucleoi=$newDate;
        }
        else
        {
             $retino->enucleoi=null;
        }

        $retino->bxod=$request->input('resultod');

        if($request->input('fecharesultod')!=null)
        {
            $fecha = $request->input('fecharesultod');
            $newDate = date("Y-m-d", strtotime($fecha));
            $retino->fechabxod=$newDate;
        }
        else
        {
            $retino->fechabxod=null; 
        }

        $retino->bxoi=$request->input('resultoi');

        if($request->input('fecharesultoi')!=null)
        {
            $fecha = $request->input('fecharesultoi');
            $newDate = date("Y-m-d", strtotime($fecha));
            $retino->fechabxoi=$newDate;
        }
        else{
            $retino->fechabxoi=null;
        }

        $retino->ciclo1=$request->input('clase1');
        $retino->ciclo2=$request->input('clase2');
        $retino->ciclo3=$request->input('clase3');
        $retino->ciclo4=$request->input('clase4');
        $retino->ciclo5=$request->input('clase5');
        $retino->ciclo6=$request->input('clase6');
        $retino->ciclo_otro=$request->input('ciclootros');
        $retino->medic1=$request->input('med1');
        $retino->medic2=$request->input('med2');
        $retino->medic3=$request->input('med3');
        $retino->medic4=$request->input('med4');
        $retino->medic5=$request->input('med5');
        $retino->medic6=$request->input('med6');
        $retino->medicotros=$request->input('medotros');
        $retino->radio=$request->input('radio');
        $retino->lugar=$request->input('lugartrat');
        $retino->dosisod=$request->input('dosisod');
        $retino->dosisoi=$request->input('dosisoi');
        $retino->save();
        return(view('Retino.MostrarRetino',['retino'=>$retino,'historia'=>$request->input('historia')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query=DB::table('h__oncols')->where('num_h','=',$id)->get()->first();
        $retino=DB::table('retinoblastomas')->where('historia_id','=',$query->id)->get()->first();
        $exist=DB::table('retinoblastomas')->where('historia_id','=',$query->id)->exists();
        if($exist==true)
        {
            return(view('Retino.MostrarRetino',['retino'=>$retino,'historia'=>$id]));
        }
        else
        {
            return redirect()->back()->withErrors(['errorshow' => 'No se pudo mostrar']);
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
        $query=DB::table('h__oncols')->where('num_h','=',$id)->get()->first();
        $retino=DB::table('retinoblastomas')->where('historia_id','=',$query->id)->get()->first();
        $exist=DB::table('retinoblastomas')->where('historia_id','=',$query->id)->exists();
        if($exist==true)
        {
            return(view('Retino.ModificarRetino',['retino'=>$retino,'historia'=>$id]));
        }
        else
        {
            return redirect()->back()->withErrors(['errorshow' => 'No se encontró ninguno']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nhist)
    {
        $query=DB::table('h__oncols')->where('num_h','=',$nhist)->get()->first();
        $retino=DB::table('retinoblastomas')->where('historia_id','=',$query->id)->get()->first();
        $new= retinoblastoma::findOrFail($retino->id);

        $fecha = $request->input('fecha');
        $newDate = date("Y-m-d", strtotime($fecha));
        $new->fecha=$request->input('fecha');
        $new->retraso=$request->input('retraso');
        $new->retinood=$request->input('retinood');
        $new->retinooi=$request->input('retinooi');
        $new->germinal=$request->input('germinal');
        $new->esporadico=$request->input('esporadico');

        if($request->input('enucleod')!=null)
        {
            $fecha = $request->input('enucleod');
            $newDate = date("Y-m-d", strtotime($fecha));
            $new->enucleod=$newDate;
        }
        else
        {
            $new->enucleoi=null;
        }
        if($request->input('enucleoi')!=null)
        {
            $fecha = $request->input('enucleoi');
            $newDate = date("Y-m-d", strtotime($fecha));
            $new->enucleoi=$newDate;
        }
        else
        {
             $new->enucleoi=null;
        }

        $new->bxod=$request->input('bxod');

        if($request->input('fechabxod')!=null)
        {
            $fecha = $request->input('fechabxod');
            $newDate = date("Y-m-d", strtotime($fecha));
            $new->fechabxod=$newDate;
        }
        else
        {
            $new->fechabxod=null; 
        }

        $new->bxoi=$request->input('bxoi');

        if($request->input('fechabxoi')!=null)
        {
            $fecha = $request->input('fechabxoi');
            $newDate = date("Y-m-d", strtotime($fecha));
            $new->fechabxoi=$newDate;
        }
        else
        {
            $new->fechabxoi=null;
        }

        $new->ciclo1=$request->input('ciclo1');
        $new->ciclo2=$request->input('ciclo2');
        $new->ciclo3=$request->input('ciclo3');
        $new->ciclo4=$request->input('ciclo4');
        $new->ciclo5=$request->input('ciclo5');
        $new->ciclo6=$request->input('ciclo6');
        $new->ciclo_otro=$request->input('ciclo_otro');
        $new->medic1=$request->input('medic1');
        $new->medic2=$request->input('medic2');
        $new->medic3=$request->input('medic3');
        $new->medic4=$request->input('medic4');
        $new->medic5=$request->input('medic5');
        $new->medic6=$request->input('medic6');
        $new->medicotros=$request->input('medicotros');
        $new->radio=$request->input('radio');
        $new->lugar=$request->input('lugar');
        $new->dosisod=$request->input('dosisod');
        $new->dosisoi=$request->input('dosisoi');
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
