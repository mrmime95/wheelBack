<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;

class Product extends Model
{
    public $timestamps = false;
    
    public function checkouts(){
        return $this->belongsToMany(Checkout::class)->withPivot('amount')->withTimestamps();
    }

    public function scopeFilter($query, $filters)
    {

        if( isset($filters["search"]) ){
            $searchElement = '%' . $filters['search'] . '%';
            $query=$query
                        ->where('type', "LIKE", $searchElement)
                        ->orWhere('brand', "LIKE", $searchElement)
                        ->orWhere('category', "LIKE", $searchElement);
        }

        if( isset($filters["brands"]) ){
            $query=$query->whereIn('brand', $filters['brands']);
        }
        if( isset($filters["useFor"]) ){
            $query=$query->where('useFor',"=", $filters['useFor']);
        }
        
    }

 /*     public function scopePromotion($query, $filters)
    {


            $query=$query->where('promotion',"=", $filters['useFor']);
        
    } */

}
