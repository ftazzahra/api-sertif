<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptk extends Model
{
    use HasFactory;
    protected $table = 'tbl_ptk';
    protected $fillable = [
        'Nama', 'NUPTK', 'JK', 'TempatLahir', 'TanggalLahir', 'NIP', 'StatusKepegawaian', 
        'JenisPTK', 'Agama', 'AlamatJalan', 'RT', 'RW', 'NamaDusun', 'Desa_Kelurahan', 
        'Kecamatan', 'KodePos', 'Telepon', 'HP', 'Email', 'id_tugas_tambahan', 'SKCPNS', 
        'TanggalCPNS', 'SKPengangkatan', 'TMTPengangkatan', 'LembagaPengangkatan', 'PangkatGolongan',
        'SumberGaji', 'NamaIbuKandung', 'StatusPerkawinan', 'NamaSuamin_Istri', 'NIPSuami_Istri',
         'PekerjaanSuami_Istri', 'TMTPNS', 'SudahLisensiKepalaSekolah', 'PernahDiklatKepengawasan',
         'KeahlianBraille', 'KeahlianBahasaIsyarat', 'NPWP', 'NamaWajibPajak', 'Kewarganegaraan', 'Bank', 'NomorRekeningBank',
         'RekeningAtasNama', 'NIK', 'NOKK', 'Karpeg', 'Karis_Karsu', 'Lintang', 'Bujur', 'NUKS', 
         'Password'
    ];

    public function walas()
    {
        return $this->hasMany(Walas::class, 'id_walas');
    }
}
