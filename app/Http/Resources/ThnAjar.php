<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThnAjar extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_tahun_ajaran' => $this->id_tahun_ajaran,
            'tahun_ajaran' => $this->tahun_ajaran,
            'status' => $this->status,
            'created_at' => optional($this->created_at)->format('d/m/Y'),
            'updated_at' => optional($this->updated_at)->format('d/m/Y'),
        ];
    }

    /**
     * Get formatted status.
     *
     */
    // private function getStatus(): string
    // {
    //     return $this->aktif ? 'Aktif' : 'Tidak Aktif';
    // }
}
