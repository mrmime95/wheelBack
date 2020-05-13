<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    public $timestamps = false;
    protected $fillable = [
                'user_id',
                'address',
                'bank',
                'comments',      
                'deliveryMethod',
                'email',
                'firstName',
                'iban',
                'name',
                'paymentMethod',                
                'personType',
                'registrationNumber',
                'termsAgree',
                'date'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('amount')->withTimestamps();
    }
}
