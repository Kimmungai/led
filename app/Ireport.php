<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ireport extends Model
{
    function IreportInvoices()
    {
      return $this->hasMany('App\IreportInvoices');
    }
}
