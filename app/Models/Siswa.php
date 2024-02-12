<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nisn', 'nama', 'id_jurusan', 'id_rombel', 'jk', 'kelas'
    ];

    public function jurusan()
    {
        return $this->belongsTo(ThnAjar::class, 'id');    
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'id_rombel');    
    }
}
