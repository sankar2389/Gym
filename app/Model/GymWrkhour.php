<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GymWrkhour extends Model
{
	protected $primaryKey = 'wrk_hr_id';
        protected $table = 'gym_working_hour';
	//protected $fillable = ['cat_name'];
        protected $fillable = ['user_id','wrk_frm_hr','wrk_to_hr','peak_m_frm_hr','peak_m_to_hr','peak_e_frm_hr','peak_e_to_hr'];
        public $timestamps = false;
}
