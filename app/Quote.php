<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
  protected $guarded = [];

  function quoteProds()
  {
    return $this->hasMany('App\QuoteProds');
  }
}
