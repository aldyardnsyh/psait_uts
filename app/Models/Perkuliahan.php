<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkuliahan extends Model
{
    use HasFactory;

    protected $table = 'perkuliahans';
    protected $primaryKey = 'id_perkuliahan';
    public $timestamps = false;
    protected $fillable = ['nim', 'kode_mk', 'nilai'];
}

