<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThnAjar extends Model
{
    use HasFactory;
    protected $table = 'tbl_tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    protected $fillable = [
        'tahun_ajaran', 'status'
    ];

    public function walas()
    {
        return $this->hasMany(Walas::class, 'id_walas');
    }
}
