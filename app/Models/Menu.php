<?php

namespace App\Models;

use App\Models\Stocke;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function stocks()
    {
        return $this->hasOne(Stocke::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
