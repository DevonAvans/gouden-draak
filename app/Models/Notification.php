<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'table_id',
        'time',
    ];

    public function table() {
        return $this->belongsTo(Table::class , 'table_id');
    }
}
