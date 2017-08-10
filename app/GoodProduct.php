<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodProduct extends Model
{
    protected $table = 'goodproduct'; //ten table lam viec voi model
    protected $fillable = ['giangvien','monhoc','giatien','images'];
    //public $timestamps = false -> khong hien thi du lieu timestamps
    //protected $hidden = ['',''] -> cot an du lieu
}
