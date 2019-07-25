<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IreportInvoices extends Model
{
    function Ireport()
    {
      return $this->belongsTo('App\Ireport');
    }
}
