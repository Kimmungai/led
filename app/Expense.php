<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  protected $fillable = [
    'purchase_id','report_id','product_id','cost','suppliedQuantity',
  ];

  public function purchase()
  {
    return $this->belongsTo('App\Purchase');
  }

  public function product()
  {
    return $this->hasOne('App\Product');
  }

}
