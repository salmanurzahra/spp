<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name follows Laravel's naming convention)
    protected $table = 'pembayaran';
    protected $primaryKey = "id_pembayaran";

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'id_petugas',
        'nisn',
        'tgl_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'id_spp',
        'jumlah_bayar',
    ];

    // Define the relationship with the Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }


    // Define the relationship with the Spp model
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id_spp');
    }
}