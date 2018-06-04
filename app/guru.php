<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'gurus'; // -> meminta izin untuk mengakses table dosens
    protected $fillable = ['nama','nipd','mapel']; // -> field apa saja yang boleh di isi -> fill = mengisi, able = boleh jadi fillable = boleh di isi
    public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

    public function siswa()
    {
    	return $this->hasMany('App\siswa','guru_id');
    }
}
