<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'tb_antrian';
    protected $fillable = ['id', 'loket_id', 'no_antrian', 'status'];
}
