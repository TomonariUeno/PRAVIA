<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'name','kana','tel','email',
        'postcode','address', 'birthday','gender', 'memo'
    ];

    //scope + メソッド名でLaravel側で自動変換されるのでController側はSearchCustomersで呼び出し
    public function scopeSearch($query, $filters)
    {
        $query->when($filters['name'] ?? null, function ($query, $value) {
            $query->where('name','like',"%{$value}%");
        });

        $query->when($filters['kana'] ?? null, function ($query, $value) {
            $query->where('kana','like',"{$value}%");
        });

        $query->when($filters['tel'] ?? null, function ($query, $value) {
            $query->where('tel','like',"{$value}%");
        });

        $query->when($filters['email'] ?? null, function ($query, $value) {
            $query->where('email','like',"%{$value}%");
        });
    }

    public function purchases() 
    { 
        return $this->hasMany(Purchase::class); 
    }
}
