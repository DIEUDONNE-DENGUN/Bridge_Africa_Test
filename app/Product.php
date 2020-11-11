<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'quantity', 'price','image_path','user_id',
    ];
    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
