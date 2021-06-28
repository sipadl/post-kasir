<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cart()
    {
        return $this->hasMany('App\Models\carts', 'id_booked');
    }
}
