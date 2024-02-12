<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_siswa' => $this->id_siswa,
            'nisn' => $this->nisn,
            'nama' => $this->nama,
            'id_jurusan' => $this->id_jurusan,
            'id_rombel' => $this->id_rombel,
            'jk' => $this->jk,
            'kelas' => $this->kelas,
            'created_at' => optional($this->created_at)->format('d/m/Y'),
            'updated_at' => optional($this->updated_at)->format('d/m/Y'),
        ];
    }
}
