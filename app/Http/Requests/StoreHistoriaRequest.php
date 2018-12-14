<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHistoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nhistoria'=> 'required|max:40',
            'datehist'=>'required',
            'otro'=>'max:255',
            'lugar_sign'=>'max:255',
            'desc_sign'=>'max:255',
            'trat_sign'=>'max:255',
            'antec_madre'=>'max:255',
            'antec_padre'=>'max:255',
            'antec_hermanos'=>'max:255',
            'peso_nac'=>'max:5',
            'talla_nac'=>'max:5',
            'antec_med'=>'max:255',
            'antec_quirur'=>'max:255',
            'av_od'=>'max:20',
            'av_oi'=>'max:20',
            'anex_od'=>'max:255',
            'anex_oi'=>'max:255',
            'bio_od'=>'max:255',
            'bio_oi'=>'max:255',
            'bal_musc'=>'max:255',
            'pio_od'=>'max:20',
            'pio_oi'=>'max:20',
            'diagnostico'=>'max:255',
            'plan'=>'max:255',
            'nombre1'=>'required',
            'apellido1'=>'required',
            'fecha_nac'=>'required',
            
        ];
    }
    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'nhistoria.required' => 'es necesario el numero de historia',
            'datehist.required'  => 'es necesario la fecha de la historia',
            'nombre1.required'  => 'es necesario el primer nomber del paciente',
            'apellido1.required'  => 'es necesario el primer apellido del paciente',
            'fecha_nac.required'  => 'es necesario la fecha de nacimiento del paciente',
            'nhistoria.max'  => 'el limite para el numero de historia es de 40',
            'otro.max'  => 'el limite para el campo "otro" es de 255',
            'lugar_sign.max'  => 'el limite para el lugar donde consulto los signos es de 255',
            'desc_sign.max'  => 'el limite para el campo "que le dijeron:" es de 255',
            'trat_sign.max'  => 'el limite para el tratamiento que recibió es de 255',
            'antec_madre.max'  => 'el limite para los antecedentes de la madre es de 255',
            'antec_padre.max'  => 'el limite para los antecedentes de la madre es de 255',
            'antec_hermanos.max'  => 'el limite para los antecedentes de los hermanos es de 255',
            'peso_nac.max'  => 'el limite para el peso en el antecedente prenatal es de 5',
            'talla_nac.max'  => 'el limite para la talla en el antecedente prenatal es de 5',
            'antec_med.max'  => 'el limite para los antecedentes médicos es de 255',
            'antec_quirur.max' => 'el limite para los antecedentes quirúrgicos es de 255',
            'av_od.max' => 'el limite para el campo "od"  de AV es de 20',
            'av_oi.max' => 'el limite para el campo "oi"  de AV es de 20',
            'anex_od.max' => 'el limite para el anexo "od" es de 255',
            'anex_oi.max' => 'el limite para el anexo "oi" es de 255',
            'bio_od.max' => 'el limite para el campo "od" de la biomicroscopia es de 255',
            'bio_oi.max' => 'el limite para el campo "oi" de la biomicroscopia es de 255',
            'bal_musc.max' => 'el limite para el balance muscular es de 255',
            'pio_od.max' => 'el limite para el campo "od" de PIO es de 20',
            'pio_oi.max' => 'el limite para el campo "oi" de PIO es de 20',
            'diagnostico.max' => 'el limite para el diagnóstico es de 255',
            'plan.max' => 'el limite para el plan es de 255',
        ];
    }
}
