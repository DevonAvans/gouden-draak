<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;


    public function dishes() {
        return $this->belongsToMany(Dish::class, 'allergens_in_dishes', 'dish_id', 'allergen_id');
    }
}