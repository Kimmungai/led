<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  protected $fillable = [
    'availableQuantity','product_id',
  ];
  public function product()
  {
    return $this->belongsTo('App\Product');
  }
}
