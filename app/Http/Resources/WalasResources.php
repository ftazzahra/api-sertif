<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalasResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_walas' => $this->id_walas,
            'id_tahun_ajaran' => $this->id_tahun_ajaran,
            'tahun_ajaran' => $this->tahunajar->tahun_ajaran,
            'id_ptk' => $this->id_ptk,
            'Nama' => $this->ptk->Nama,
            // 'id_ptk' => $this->id_ptk ? new PtkResource($this->id_ptk) : null,
            'created_at' => optional($this->created_at)->format('d/m/Y'),
            'updated_at' => optional($this->updated_at)->format('d/m/Y'),
        ];    
    }
}
