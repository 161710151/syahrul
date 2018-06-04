<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama','nim','kelas','dosen_id'];
    public $timestamps = true;

	public function guru()
	{
		return $this->belongsTo('App\guru','guru_id');
	}

    public function wali()
    {
    	return $this->hasOne('App\wali','siswa_id');
    

    public function eskul() 
    {
        return $this->belongsToMany('App\eskul', 'eskul_siswa','siswa_id', 'eskul_id');
    }
}
