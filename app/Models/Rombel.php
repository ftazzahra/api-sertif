<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;
    protected $table = 'tbl_rombel';
    protected $primaryKey = 'id_rombel';
    protected $fillable = [
        'nama_rombel', 'max_rombel', 'id_walas', 'id_tahun_ajaran'
    ];

    public function tahunajar()
    {
        return $this->belongsTo(ThnAjar::class, 'id_tahun_ajaran');    
    }

    public function walas()
    {
        return $this->belongsTo(Walas::class, 'id_walas');    
    }
}
