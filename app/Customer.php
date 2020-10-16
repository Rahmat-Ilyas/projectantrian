<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tb_customer';
    protected $fillable = ['id', 'no_urut', 'no_antrian', 'kategori', 'loket_id', 'status'];
}
