<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    public function checkouts(){
        return $this->belongsToMany(Checkout::class)->withPivot('amount')->withTimestamps();
    }
}
