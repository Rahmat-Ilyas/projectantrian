<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loket extends Model
{
    protected $table = 'tb_loket';
    protected $fillable = ['gets','nama_loket','layanan','status'];
}
