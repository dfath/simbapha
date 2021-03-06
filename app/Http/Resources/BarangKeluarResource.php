<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangKeluarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'barang_id' => $this->barang_id,
            'unit_kerja_id' => $this->unit_kerja_id,
            'volume' => $this->volume,
            'tanggal' => $this->tanggal,
            'teks_tanggal' => date('d M Y', strtotime($this->tanggal)),
            'nama_barang' => $this->nama_barang,
            'nama_unit_kerja' => $this->nama_unit_kerja,
            'kelompok_kegiatan_id' => $this->kelompok_kegiatan_id,
            'nama_kelompok_kegiatan' => $this->nama_kelompok_kegiatan,
            'kelompok_barang_id' => $this->kelompok_barang_id,
            'nama_kelompok_barang' => $this->nama_kelompok_barang,
        ];
    }
}
