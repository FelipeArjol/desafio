<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory; // , SoftDeletes

    protected $fillable = ['name', 'price', 'code', 'image'];

    // protected $casts = [
    //     'price' => MoneyCast::class
    // ];
}
