<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    protected $table = 'createthanhvien';
    protected $fillable = ['user','pass','level'];
    public $timestamps = false;
}
