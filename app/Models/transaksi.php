<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
     protected $table = 'transaksis';
    protected $fillable = [ 'id_pengunjung',
                            'id_karyawan',
                            'jumlah_kamar',
                            'tanggal_masuk',
                            'lama_nginap',
                            'total_harga',
                        ];

                        public function pengunjung()
                        {
                            return $this->belongsTo(pengunjung::class, 'id_pengunjung');
                        }
                        public function karyawan()
                        {
                            return $this->belongsTo(karyawan::class, 'id_karyawan');
                        }
}
