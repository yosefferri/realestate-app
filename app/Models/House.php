<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'room',
        'kitchen',
        'garage',
        'bathroom',
        'TypeContract',
        'date',
        'time',
        'price_buy',
        'price_rent',
        'country',
    ];
    public function users() {
        return $this->belongsToMany(User::class);
    }


}

class deleteHouse extends Model

    {
        use SoftDeletes;
    
        protected $dates = ['deleted_at'];

    }
