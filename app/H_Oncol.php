<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class H_Oncol extends Model
{
    protected $table="h__oncols";
    protected $primaryKey="id";
    protected $filliable=[
    	'num_h','fecha','leucoria_edad','leu_od','leu_oi','estrabismo_edad','estra_od','estra_oi','estra_et','estra_xt','estra_ht','celulitis_edad','cel_od','cel_oi','otro','lugar_sign','desc_sign','trat_sign','antec_madre','antec_padre','antec_hermanos','N_emb','emb_cont','emb_parto','emb_cesar','peso_nac','talla_nac','nac_comp','antec_med','antec_quirur','av_od','av_oi','anex_od','anex_oi','bio_od','bio_oi','bal_musc','pio_od','pio_oi','fondo_ojo','diagnostico','plan'
    ];
  
}
