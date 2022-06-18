<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Dish extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'menu_text' => $this->menu_text,
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function dishesInOrder()
    {
        return $this->belongsToMany(Order::class, 'dishes_in_order', 'order_id', 'dish_id')
            ->withPivot('amount', 'comment', 'price');
    }
}
