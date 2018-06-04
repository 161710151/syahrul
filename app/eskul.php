<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eskul extends Model
{
     public function siswa() 
    {
		return $this->belongsToMany('App\siswa', 'eskul_siswa', 'siswa_id', 'eskul_id');
	}
}
