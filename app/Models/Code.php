<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Str;

class Code extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'code', 'is_used'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($code) {
            $code->code = Str::random(8);
        });
    }
}
