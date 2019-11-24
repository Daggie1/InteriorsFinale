<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable=[
        'name','location','description','phone','seller_id','image'
    ];
    //
    public function owner(){
        return $this->belongsTo(Seller::class);
    }
}
