<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
      protected $table = 'detail_transaksis';
    protected $fillable = ['no_transaksi', 'no_kamar'];


       public function transaksi()
                        {
                            return $this->belongsTo(transaksi::class, 'no_transaksi');
                        }
                        public function kamar()
                        {
                            return $this->belongsTo(kamar::class, 'no_kamar');
                        }
}
