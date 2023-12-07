<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Product;
use App\Http\Models\User;


class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    protected $table = 'cart';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        // relation de clé étrangère 
        // crée la relation avec la table Product
        return $this->belongsTo(Product::class);
    }
}
