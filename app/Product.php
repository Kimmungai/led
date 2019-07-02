<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function org()
  {
    return $this->belongsTo('App\Org');
  }

  public function expense()
  {
    return $this->belongsTo('App\Expense');
  }

  public function revenue()
  {
    return $this->belongsTo('App\Revenue');
  }

  public function inventory()
  {
    return $this->hasOne('App\Inventory');
  }

  public function variation()
  {
    return $this->hasOne('App\Variation');
  }

}
