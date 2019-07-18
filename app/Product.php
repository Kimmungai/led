<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    'name','sku','img1','img2','img3','img4','img5','type','virtualProduct','cost','price','salePrice','regularPrice','description','purchaseNote','excerpt','rating','specialFeatured','vegetarian',
  ];

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
