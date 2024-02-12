<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walas extends Model
{
    use HasFactory;

    protected $table = 'tbl_walas';
    protected $primaryKey = 'id_walas';
    protected $fillable = [
        'id_ptk', 'id_tahun_ajaran'
    ];

    public function ptk() 
    {
        return $this->belongsTo(Ptk::class, 'id_ptk', 'id_ptk');
    }

    public function tahunajar() 
    {
        return $this->belongsTo(ThnAjar::class, 'id_tahun_ajaran');
    }
}
