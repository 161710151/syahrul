<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wali extends Model
{
    protected $table = 'walis';
    protected $fillable = ['nama','alamat','siswa_id'];
    public $timestamps = true;

    public function siswa()
	{
		return $this->belongsTo('App\siswa','siswa_id');
	}
}
