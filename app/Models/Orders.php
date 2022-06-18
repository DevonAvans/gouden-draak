<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public function dishesInOrder()
    {
        return $this->belongsToMany(Dish::class, 'dishes_in_order', 'order_id', 'dish_id')
            ->withPivot('amount', 'comment', 'price');
    }
}
