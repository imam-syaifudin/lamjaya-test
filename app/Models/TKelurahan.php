<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKelurahan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kecamatan(){
        return $this->belongsTo(TKecamatan::class,'t_kecamatan_id');
    }
}
