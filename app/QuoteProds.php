<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteProds extends Model
{
    protected $guarded = [];
    
    function quote()
    {
      return $this->belongsTo('App\Quote');
    }

    function product()
    {
      return $this->hasMany('App\Product');
    }
}
