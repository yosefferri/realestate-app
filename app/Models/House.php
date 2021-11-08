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
        'typeContract',
        'date',
        'price_buy',
        'price_rent',
        'country',
    ];
    protected $hidden = [
        'date',
        'created_at',
        'updated_at'
    ];

     public function users() {
         return $this->belongsToMany(User::class);
     }
     public function admins() {
         return $this->belongsToMany(Admin::class);
     }
}
     class SoftDelete extends Model
     {
         use SoftDeletes;
         protected $dates = ['deleted_at'];
     }

