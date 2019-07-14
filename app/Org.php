<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'type','address','phoneNumber','image','description','vision','mission','slogan',
    ];

    public function user()
    {
      return $this->hasMany('App\User');
    }

    public function product()
    {
      return $this->hasMany('App\Product');
    }
}
