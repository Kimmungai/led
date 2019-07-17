<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
  protected $fillable = [
    'product_id','height','width','color','size','weight',
  ];
  
  public function product()
  {
    return $this->belongsTo('App\Product');
  }
}
