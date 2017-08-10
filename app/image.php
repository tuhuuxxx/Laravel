<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'table';
    protected $fillable = ['name','product_id'];
    public $timestamps = false;

    public function product () {
        return  $this->belongsTo('App\product');
    }
}
