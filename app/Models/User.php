<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    protected $table = 'users';

    protected $fillable = ['id','email','name'];

    protected $hidden = [
        'id', 'password'
    ];

    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }

}
