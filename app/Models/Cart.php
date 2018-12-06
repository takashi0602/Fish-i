<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $fillable = [
    'user_id', 'food_id', 'amount'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function food()
  {
    return $this->belongsTo(Food::class);
  }

}
