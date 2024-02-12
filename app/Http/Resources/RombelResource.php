<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RombelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_rombel' => $this->id_rombel,
            'nama_rombel' => $this->nama_rombel,
            'max_rombel' => $this->max_rombel,
            'id_walas' => $this->id_walas,
            'id_ptk' => $this->walas->id_ptk,
            // 'Nama' => $this->walas->id_ptk->Nama,
            'id_tahun_ajaran' => $this->id_tahun_ajaran,
            'tahun_ajaran' => $this->tahunajar->tahun_ajaran,
            'created_at' => optional($this->created_at)->format('d/m/Y'),
            'updated_at' => optional($this->updated_at)->format('d/m/Y'),
        ];
    }
}
