<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $fillable = [
        'nim', 'nama', 'alamat', 'tanggal_lahir'
    ];
    protected $dates = [
        'tanggal_lahir'
    ];
    public $timestamps = false;
}
