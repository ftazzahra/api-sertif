<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PtkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'Nama' => $this->Nama,
            'NUPTK' => $this->NUPTK,
            'JK' => $this->JK,
            'TempatLahir' => $this->TempatLahir,
            'TanggalLahir' => optional($this->TanggalLahir)->format('d/m/Y'),
            'NIP' => $this->NIP,
            'StatusKepegawaian' => $this->StatusKepegawaian,
            'JenisPTK' => $this->JenisPTK,
            'Agama' => $this->Agama,
            'AlamatJalan' => $this->AlamatJalan,
            'RT' => $this->RT,
            'RW' => $this->RW,
            'NamaDusun' => $this->NamaDusun,
            'Desa_Kelurahan' => $this->Desa_Kelurahan,
            'Kecamatan' => $this->Kecamatan,
            'KodePos' => $this->KodePos,
            'Telepon' => $this->Telepon,
            'HP' => $this->HP,
            'Email' => $this->Email,
            'id_tugas_tambahan' => $this->id_tugas_tambahan,
            'SKCPNS' => $this->SKCPNS,
            'TanggalCPNS' => optional($this->TanggalCPNS)->format('d/m/Y'),
            'SKPengangkatan' => $this->SKPengangkatan,
            'TMTPengangkatan' => optional($this->TMTPengangkatan)->format('d/m/Y'),
            'LembagaPengangkatan' => $this->LembagaPengangkatan,
            'PangkatGolongan' => $this->PangkatGolongan,
            'SumberGaji' => $this->SumberGaji,
            'NamaIbuKandung' => $this->NamaIbuKandung,
            'StatusPerkawinan' => $this->StatusPerkawinan,
            'NamaSuamin_Istri' => $this->NamaSuamin_Istri,
            'NIPSuami_Istri' => $this->NIPSuami_Istri,
            'PekerjaanSuami_Istri' => $this->PekerjaanSuami_Istri,
            'TMTPNS' => optional($this->TMTPNS)->format('d/m/Y'),
            'SudahLisensiKepalaSekolah' => $this->SudahLisensiKepalaSekolah,
            'PernahDiklatKepengawasan' => $this->PernahDiklatKepengawasan,
            'KeahlianBraille' => $this->KeahlianBraille,
            'KeahlianBahasaIsyarat' => $this->KeahlianBahasaIsyarat,
            'NPWP' => $this->NPWP,
            'NamaWajibPajak' => $this->NamaWajibPajak,
            'Kewarganegaraan' => $this->Kewarganegaraan,
            'Bank' => $this->Bank,
            'NomorRekeningBank' => $this->NomorRekeningBank,
            'RekeningAtasNama' => $this->RekeningAtasNama,
            'NIK' => $this->NIK,
            'NOKK' => $this->NOKK,
            'Karpeg' => $this->Karpeg,
            'Karis_Karsu' => $this->Karis_Karsu,
            'Lintang' => $this->Lintang,
            'Bujur' => $this->Bujur,
            'NUKS' => $this->NUKS,
            'Password' => $this->Password,
        ];
    }
}
