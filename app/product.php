<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name','price','cate_id'];
    public $timestamps = false;

    public function images () {
        return $this->hasMany('App\image'); // hasOne
    }
}
