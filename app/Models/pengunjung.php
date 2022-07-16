<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
     use HasFactory;
    protected $table = 'pengunjungs';
    protected $fillable = ['nama_pengunjung', 'alamat', 'jenis_kelamin', 'no_telp', 'no_ktp'];
}
