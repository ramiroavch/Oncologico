<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\H_Oncol;
use App\Paciente;
use App\Http\Requests\StoreHistoriaRequest;
use resources\views;
use Illuminate\Support\Facades\DB;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(($request->get('num_historia')!="")||($request->get('cedula')!="")||(($request->get('nombre1')!="")&&($request->get('apellido1')!="")))
        {
            $nhistoria=trim($request->get('num_historia'));
            $ci=trim($request->get('cedula'));
            $nombre1=trim($request->get('nombre1'));
            $apellido1=trim($request->get('apellido1'));
            $nombre2=trim($request->get('nombre2'));
            $apellido2=trim($request->get('apellido2'));
            $oncol=trim($request->get('oncologico'));
            $table;
            $fkhist;
            if($oncol=="true"){
                $table="h__oncols";
                $fkhist="historia_id";
            }
            else{
                $table="h__no__oncols";
                $fkhist="historiano_id";
            }

            if($nhistoria!="")
            {            
                $historia=DB::table($table)->where('num_h','=',$nhistoria)->get()->first();
                $exist=DB::table($table)->where('num_h','=',$nhistoria)->exists();
                if ($exist==true)
                {
                    $paciente=DB::table('pacientes')->where('pacientes.'.$fkhist,'=',$historia->id)->get()->first();
                    if($oncol=="true")
                    {
                        $exist2=DB::table('retinoblastomas')->where('historia_id','=',$historia->id)->exists();
                        return view('Historias.MostrarHistoria',['historia'=>$historia,'paciente'=>$paciente,'retino'=>$exist2]);
                    }
                    else
                    {
                        return view('Historias.MostrarHistoriaNo',['historia'=>$historia,'paciente'=>$paciente]); 
                    }
                }
                else
                {
                    return redirect()->back()->withErrors(['errorshow' => 'No se encontró ninguna historia']);
                }
            }
            else if($ci!=""){
                $paciente=DB::table('pacientes')->where('pacientes.ci','=',$ci)->get()->first();
                $exist=DB::table('pacientes')->where('pacientes.ci','=',$ci)->exists();
                if($exist==true)
                {
                    if($table=="h__oncols")
                    {
                        $historia=DB::table($table)->where('id','=',$paciente->historia_id)->get()->first();
                        $exist=DB::table($table)->where('id','=',$paciente->historia_id)->exists();
                    }
                    else if($table=="h__no__oncols")
                    {
                        $historia=DB::table($table)->where('id','=',$paciente->historiano_id)->get()->first();   
                        $exist=DB::table($table)->where('id','=',$paciente->historiano_id)->exists();
                    }
                    if($oncol=="true")
                    {
                        $exist2=DB::table('retinoblastomas')->where('historia_id','=',$historia->id)->exists();
                        return view('Historias.MostrarHistoria',['historia'=>$historia,'paciente'=>$paciente,'retino'=>$exist2]);
                    }
                    else
                    {
                        return view('Historias.MostrarHistoriaNo',['historia'=>$historia,'paciente'=>$paciente]);
                    }
                }
                else
                {
                    return redirect()->back()->withErrors(['errorshow' => 'No se encontró ningun paciente']);
                }
            }
            else if(($nombre1!="")&&($apellido1!=""))
            {
                if(($nombre2=="")&&($apellido2==""))
                {
                    $bool=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->exists();
                    $paciente=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->get();
                }
                else if(($nombre2!="")&&($apellido2!=""))
                {
                    $bool=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->where('pacientes.nombre2','=',$nombre2)->where('pacientes.apellido2','=',$apellido2)->exist();
                    $paciente=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->where('pacientes.nombre2','=',$nombre2)->where('pacientes.apellido2','=',$apellido2)->get();
                }
                else if($nombre2!="")
                {
                    $bool=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->where('pacientes.nombre2','=',$nombre2)->exist();
                    $paciente=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->where('pacientes.nombre2','=',$nombre2)->get();
                }
                else if($apellido2!=""){
                    $bool=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->where('pacientes.apellido2','=',$apellido2)->exist();
                    $paciente=DB::table('pacientes')->where('pacientes.nombre1','=',$nombre1)->where('pacientes.apellido1','=',$apellido1)->where('pacientes.apellido2','=',$apellido2)->get();
                }
                if($bool==true)
                {
                return view('Historias.MostrarListado',['pacientes'=>$paciente]);  
                }
                else
                {
                    return redirect()->back()->withErrors(['errorshow' => 'No se encontró ningun paciente']);
                }
                
            }
        }
        else
        {
            return redirect()->back()->withErrors(['errorshow' => 'Hay campos vacíos necesarios']);
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
    public function store(StoreHistoriaRequest $request)
    {
        $exist=DB::table('h__oncols')->where('num_h','=',$request->input('nhistoria'))->exists();
        $exist2=DB::table('h__no__oncols')->where('num_h','=',$request->input('nhistoria'))->exists();
        $exist3=false;
        if($request->input('cedula')!=null)
        {
            $exist3=$exist=DB::table('pacientes')->where('ci','=',$request->input('cedula'))->exists();
        }
        if($exist==false && $exist==false && $exist3!=true)
        {
            $historia = new H_Oncol();
            $historia->num_h = $request->input('nhistoria');
            $fecha = $request->input('datehist');
            $newDate = date("Y-m-d", strtotime($fecha));
            $historia->fecha = $newDate;
            $historia->leucoria_edad = $request->input('edadleuco');
            $historia->leu_od = $request->input('LeuOD');
            $historia->leu_oi = $request->input('LeuOI');
            $historia->estrabismo_edad= $request->input('estraedad');
            $historia->estra_od = $request->input('estraOD');
            $historia->estra_oi = $request->input('estraOI');
            $historia->estra_et = $request->input('estraET');
            $historia->estra_xt = $request->input('estraXT');
            $historia->estra_ht = $request->input('estraHT');
            $historia->celulitis_edad = $request->input('celedad');
            $historia->cel_od = $request->input('celOD');
            $historia->cel_oi = $request->input('celOI');
            $historia->otro = $request->input('otro');
            $historia->lugar_sign = $request->input('lugarsignos');
            $historia->desc_sign = $request->input('descripsignos');
            $historia->trat_sign = $request->input('tratsignos');
            $historia->antec_madre = $request->input('antemadre');
            $historia->antec_padre = $request->input('antepadre');
            $historia->antec_hermanos = $request->input('anteherm');
            $historia->N_emb = $request->input(' nembarazo');

            if ($request->input('control')=='true')
            {
            $historia->emb_cont = 0;
            }else{
                $historia->emb_cont = 1;
            }
            if ($request->input('cesar')=='true')
            {
            $historia->emb_cesar = 0;
            }else{
                $historia->emb_cesar = 1;
            }
            $historia->peso_nac = $request->input('pesonac');
            $historia->talla_nac = $request->input('tallanac');
            if ($request->input('complic')=='true')
            {
            $historia->nac_comp = 0;
            }else{
                $historia->nac_comp = 1;
            }
            $historia->antec_med = $request->input('antmedicos');
            $historia->antec_quirur = $request->input('antquirur');
            $historia->av_od = $request->input('avod');
            $historia->av_oi = $request->input('avoi');
            $historia->anex_od = $request->input('anexod');
            $historia->anex_oi = $request->input('anexoi');
            $historia->bio_od = $request->input('biood');
            $historia->bio_oi = $request->input('biooi');
            $historia->bal_musc = $request->input('balmus');
            $historia->pio_od = $request->input('piod');
            $historia->pio_oi = $request->input('pioi');


            /*if($request->hasFile('fonojo')){
                $file=$request->file('fonojo');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
            }
            else
            {
                $name=null;
            }*/

            $historia->fondo_ojo = $request->input('fondo_ojo');
            $historia->diagnostico = $request->input('diagnos');
            $historia->plan = $request->input('plan');
            try
            {
                $historia->save();
            }
            catch(\Exception $e)
            {
                return redirect()->back()->withErrors(['errorshow' => 'error al guardar la historia']);
            }

            $paciente = new Paciente();
            $paciente->ci =  $request->input('cedula');
            $paciente->nombre1 = $request->input('nombre1');
            $paciente->nombre2 = $request->input('nombre2');
            $paciente->apellido1 = $request->input('apellido1');
            $paciente->apellido2 = $request->input('apellido2');
            $paciente->tlf = $request->input('telefono');

            $fecha = $request->input('fecha_nac');
            $newDate = date("Y-m-d", strtotime($fecha));
            $paciente->fecha_nac = $newDate;

            $paciente->procedencia = $request->input('procedencia');
            $paciente->referencia = $request->input('referencia');
            $paciente->lic = $request->input('lic');
            $paciente->historia_id=$historia->id;
            try
            {
                $paciente->save();
            }
                catch(\Exception $e)
            {
                return redirect()->back()->withErrors(['errorshow' => 'Error al guardar el paciente']);
            }
            return view('home');
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
        $exist=DB::table('retinoblastomas')->where('historia_id','=',$historia->id)->exists();
        return view('Historias.MostrarHistoria',['paciente'=>$paciente,'historia'=>$historia,'retino'=>$exist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historia=DB::table('h__oncols')->where('num_h','=',$id)->get()->first();
        $exist=DB::table('h__oncols')->where('num_h','=',$id)->exists();
        if($exist==true)
        {
            $paciente=DB::table('pacientes')->where('historia_id','=',$historia->id)->get()->first();
            return(view('Historias.ModificarHistoria',['historia'=>$historia,'paciente'=>$paciente]));
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
        //dd($request->all());
        $historia=DB::table('h__oncols')->where('num_h','=',$id)->get()->first();
        $exist=DB::table('retinoblastomas')->where('historia_id','=',$historia->id)->exists();
        $new=H_Oncol::findOrFail($historia->id);
        $paciente=DB::table('pacientes')->where('historia_id','=',$historia->id)->get()->first();
        $new2=Paciente::findOrFail($paciente->id);


        $fecha = $request->input('datehist');
        $newDate = date("Y-m-d", strtotime($fecha));
        $new->fecha = $newDate;

        $new->leucoria_edad = $request->input('edadleuco');
        $new->leu_od = $request->input('LeuOD');
        $new->leu_oi = $request->input('LeuOI');
        $new->estrabismo_edad= $request->input('estraedad');
        $new->estra_od = $request->input('estraOD');
        $new->estra_oi = $request->input('estraOI');
        $new->estra_et = $request->input('estraET');
        $new->estra_xt = $request->input('estraXT');
        $new->estra_ht = $request->input('estraHT');
        $new->celulitis_edad = $request->input('celedad');
        $new->cel_od = $request->input('celOD');
        $new->cel_oi = $request->input('celOI');
        $new->otro = $request->input('otro');
        $new->lugar_sign = $request->input('lugarsignos');
        $new->desc_sign = $request->input('descripsignos');
        $new->trat_sign = $request->input('tratsignos');
        $new->antec_madre = $request->input('antemadre');
        $new->antec_padre = $request->input('antepadre');
        $new->antec_hermanos = $request->input('anteherm');
        $new->N_emb = $request->input('nembarazo');

        if ($request->input('control')=='true')
        {
            $new->emb_cont = 0;
        }
        else if($request->input('control')=='false')
        {
            $new->emb_cont = 1;
        }
        if ($request->input('cesar')=='true')
        {
            $new->emb_cesar = 0;
        }
        else if ($request->input('cesar')=='false')
        {
            $new->emb_cesar = 1;
        }
        $new->peso_nac = $request->input('pesonac');
        $new->talla_nac = $request->input('tallanac');
        if ($request->input('complic')=='true')
        {
            $new->nac_comp = 0;
        }
        else if ($request->input('complic')=='false')
        {
            $new->nac_comp = 1;
        }
        $new->antec_med = $request->input('antmedicos');
        $new->antec_quirur = $request->input('antquirur');
        $new->av_od = $request->input('avod');
        $new->av_oi = $request->input('avoi');
        $new->anex_od = $request->input('anexod');
        $new->anex_oi = $request->input('anexoi');
        $new->bio_od = $request->input('biood');
        $new->bio_oi = $request->input('biooi');
        $new->bal_musc = $request->input('balmus');
        $new->pio_od = $request->input('piod');
        $new->pio_oi = $request->input('pioi');


        /*if($request->hasFile('fonojo')){
            $file=$request->file('fonojo');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        else
        {
            $name=null;
        }*/

        $new->fondo_ojo = $request->input('fondo_ojo');

        $new->diagnostico = $request->input('diagnos');
        $new->plan = $request->input('plan');
        try
        {
            $new->save();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['errorshow' => 'error al guardar la historia']);
        }

        $new2->ci =  $request->input('cedula');
        $new2->nombre1 = $request->input('nombre1');
        $new2->nombre2 = $request->input('nombre2');
        $new2->apellido1 = $request->input('apellido1');
        $new2->apellido2 = $request->input('apellido2');
        $new2->tlf = $request->input('telefono');

        $fecha = $request->input('fecha_nac');
        $newDate = date("Y-m-d", strtotime($fecha));
        $new2->fecha_nac = $newDate;

        $new2->procedencia = $request->input('procedencia');
        $new2->referencia = $request->input('referencia');
        $new2->lic = $request->input('lic');
        try
        {
            $new2->save();
            return view('Historias.MostrarHistoria',['paciente'=>$paciente,'historia'=>$historia,'retino'=>$exist]);
        }
        catch(\Exception $e)
        {
            dd($e);
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
