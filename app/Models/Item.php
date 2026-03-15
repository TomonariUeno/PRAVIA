<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use app\Models\Purchase; 

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 
        'name', 
        'memo', 
        'price', 
        'is_selling' 
    ];

    public function purchases() 
    { 
        return $this->belongsToMany(Purchase::class) 
        ->withPivot('quantity'); 
    }
}
