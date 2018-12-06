<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
  protected $fillable = [
    'name', 'description', 'price'
  ];

  public function cart()
  {
    return $this->hasMany(Cart::class);
  }

}
