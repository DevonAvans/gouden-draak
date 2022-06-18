<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Dish extends Model
{
    use HasFactory, Searchable;
    public $timestamps = false;
    protected $fillable = [
        'spiciness_id',
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'menu_text' => $this->menu_text,
        ];
    }

    public function allergens() {
        return $this->belongsToMany(Allergen::class, 'allergens_in_dishes', 'dish_id', 'allergen_id');
    }

    public function category() {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function spiciness() {
        return $this->belongsTo(Spiciness::class , 'spiciness_id');
    }
}
