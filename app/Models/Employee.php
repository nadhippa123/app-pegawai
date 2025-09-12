<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nama_lengkap', 'email', 'nomor_telepon', 'tanggan_lahir', 'alamat', 'tanggal_masuk', 'status'];
}
