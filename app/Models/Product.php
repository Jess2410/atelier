<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Code;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'type'];

    public function codes()
    {
        return $this->hasMany(Code::class);
    }
}
