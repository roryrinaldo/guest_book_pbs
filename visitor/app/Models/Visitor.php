<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';
    protected $fillable = ['email', 'nama', 'tanggal_kunjungan', 'alamat', 'no_hp', 'instansi', 'data_dicari', 'keperluan', 'rating'];


}
