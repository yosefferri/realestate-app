<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
