<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\H_No_Oncol;
use App\Paciente;
use App\Http\Requests\StoreHistoriaNoRequest;
use resources\views;
use Illuminate\Support\Facades\DB;

class HistoriaNoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $exist=DB::table('h__oncols')->where('num_h','=',$request->input('nhistoria'))->exists();
        $exist2=DB::table('h__no__oncols')->where('num_h','=',$request->input('nhistoria'))->exists();
        $exist3=false;
        if($request->input('cedula')!=null)
        {
            $exist3=DB::table('pacientes')->where('ci','=',$request->input('cedula'))->exists();
        }
        if($exist==false && $exist==false && $exist3!=true)
        {
        $historia= new H_No_Oncol();
        $historia->num_h=$request->input('nhistoria');
        $fecha = $request->input('fecha');
        $newDate = date("Y-m-d", strtotime($fecha));
        $historia->fecha=$newDate;
        $historia->enfer_actual= $request->input('enf_actual');
        $historia->diagnos_descrip= $request->input('diagnosdescrip');
        $historia->antec_madre= $request->input('antecmadre');
        $historia->antec_padre= $request->input('antecpadre');
        $historia->antec_otros= $request->input('antecotros');
        $historia->antec_person= $request->input('antecpersonal');
        $historia->antec_oftal= $request->input('antecoftal');
        $historia->antec_quirur= $request->input('antecquirur');
        $historia->bal_musc= $request->input('balmus');
        $historia->diagnostico= $request->input('diagnoshist');
        $historia->plan= $request->input('plan');
        $historia->N_emb= $request->input('nembarazo');
        if($request->input('control')=='false')
        {
            $historia->emb_cont=1;
        }
        else
        {
            $historia->emb_cont=0;
        }
        $historia->peso_nac= $request->input('peso_nac');
        $historia->talla_nac= $request->input('talla_nac');
        $historia->semanas= $request->input('semanas');
        if($request->input('cesar')=='false')
        {
            $historia->emb_cesar=1;
        }
        else
        {
            $historia->emb_cesar=0;
        }
        $historia->comp_mat= $request->input('comp_mat');
        $historia->comp_nac= $request->input('comp_nac');
        $historia->avsc_od= $request->input('avsc_od');
        $historia->avsc_oi= $request->input('avsc_oi');
        $historia->avmc_od= $request->input('avmc_od');
        $historia->avmc_oi= $request->input('avmc_oi');
        $historia->refracc= $request->input('refraccion');
        $historia->anex_od= $request->input('anex_od');
        $historia->anex_oi= $request->input('anex_oi');
        $historia->bio_od= $request->input('bio_od');
        $historia->bio_oi= $request->input('bio_oi');
        $historia->presion_od= $request->input('pres_od');
        $historia->presion_oi= $request->input('pres_oi');
        $historia->fondo_od= $request->input('fon_od');
        $historia->fondo_oi= $request->input('fon_oi');
        try
        {
        $historia->save();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['errorshow' => 'error al guardar la historia']);
        }
        $paciente= new Paciente();
        $paciente->ci= $request->input('cedula');
        $paciente->nombre1= $request->input('nombre1');
        $paciente->nombre2= $request->input('nombre2');
        $paciente->apellido1= $request->input('apellido1');
        $paciente->apellido2= $request->input('apellido2');
        $paciente->tlf= $request->input('tlf');
        $fecha = $request->input('fecha_nac');
        $newDate = date("Y-m-d", strtotime($fecha));
        $paciente->fecha_nac=$newDate ;
        $paciente->procedencia= $request->input('procedencia');
        $paciente->referencia= $request->input('referencia');
        $paciente->lic= $request->input('lic');
        $paciente->historiano_id=$historia->id;
        try
        {
        $paciente->save();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['errorshow' => 'Error al guardar el paciente']);
        }
        return(view('home'));
        }
        else
        {
            if($exist3!=true)
            {
                return redirect()->back()->withErrors(['errorshow' => 'Ya existe una historia con ese numero']);
            }
            else
            {
                return redirect()->back()->withErrors(['errorshow' => 'Ya existe un paciente con esa cedula']);
            }
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
        $paciente= Paciente::find($id);
        $nhistoria=$paciente->historia_id;
        $nhistoriano=$paciente->historiano_id;
        if($nhistoria!=NULL)
        {
            $historia=DB::table('h__oncols')->where('id','=',$nhistoria)->get()->first();
        }
        else
        {
            $historia=DB::table('h__no__oncols')->where('id','=',$nhistoriano)->get()->first();
        }
        return view('Historias.MostrarHistoriaNo',['paciente'=>$paciente,'historia'=>$historia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historia=DB::table('h__no__oncols')->where('num_h','=',$id)->get()->first();
        $exist=DB::table('h__no__oncols')->where('num_h','=',$id)->exists();
        if($exist==true)
        {
            $paciente=DB::table('pacientes')->where('historiano_id','=',$historia->id)->get()->first();
            return(view('Historias.ModificarHistoriaNo',['historia'=>$historia,'paciente'=>$paciente]));
        }
        else
        {
            return redirect()->back()->withErrors(['errorshow' => 'No se encontró la historia a modificar']);
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
        $historia=DB::table('h__no__oncols')->where('num_h','=',$id)->get()->first();
        $paciente=DB::table('pacientes')->where('historiano_id','=',$historia->id)->get()->first();
        $new=H_No_Oncol::findOrFail($historia->id);
        $new2=Paciente::findOrFail($paciente->id);

        $fecha = $request->input('fecha');
        $newDate = date("Y-m-d", strtotime($fecha));
        $new->fecha=$newDate;
        $new->enfer_actual= $request->input('enf_actual');
        $new->diagnos_descrip= $request->input('diagnosdescrip');
        $new->antec_madre= $request->input('antecmadre');
        $new->antec_padre= $request->input('antecpadre');
        $new->antec_otros= $request->input('antecotros');
        $new->antec_person= $request->input('antecpersonal');
        $new->antec_oftal= $request->input('antecoftal');
        $new->antec_quirur= $request->input('antecquirur');
        $new->bal_musc= $request->input('balmus');
        $new->diagnostico= $request->input('diagnoshist');
        $new->plan= $request->input('plan');
        $new->N_emb= $request->input('nembarazo');

        if($request->input('control')=='false')
        {
            $new->emb_cont=1;
        }
        else
        {
            $new->emb_cont=0;
        }
        $new->peso_nac= $request->input('peso_nac');
        $new->talla_nac= $request->input('talla_nac');
        $new->semanas= $request->input('semanas');

        if($request->input('cesar')=='false')
        {
            $new->emb_cesar=1;
        }
        else
        {
            $new->emb_cesar=0;
        }
        $new->comp_mat= $request->input('comp_mat');
        $new->comp_nac= $request->input('comp_nac');
        $new->avsc_od= $request->input('avsc_od');
        $new->avsc_oi= $request->input('avsc_oi');
        $new->avmc_od= $request->input('avmc_od');
        $new->avmc_oi= $request->input('avmc_oi');
        $new->refracc= $request->input('refraccion');
        $new->anex_od= $request->input('anex_od');
        $new->anex_oi= $request->input('anex_oi');
        $new->bio_od= $request->input('bio_od');
        $new->bio_oi= $request->input('bio_oi');
        $new->presion_od= $request->input('pres_od');
        $new->presion_oi= $request->input('pres_oi');
        $new->fondo_od= $request->input('fon_od');
        $new->fondo_oi= $request->input('fon_oi');
        try
        {
            $new->save();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['errorshow' => 'error al guardar la historia']);
        }


        $new2->ci= $request->input('cedula');
        $new2->nombre1= $request->input('nombre1');
        $new2->nombre2= $request->input('nombre2');
        $new2->apellido1= $request->input('apellido1');
        $new2->apellido2= $request->input('apellido2');
        $new2->tlf= $request->input('tlf');
        $fecha = $request->input('fecha_nac');
        $newDate = date("Y-m-d", strtotime($fecha));
        $new2->fecha_nac=$newDate ;
        $new2->procedencia= $request->input('procedencia');
        $new2->referencia= $request->input('referencia');
        $new2->lic= $request->input('lic');
        try
        {
            $new2->save();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['errorshow' => 'Error al guardar el paciente']);
        }
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
