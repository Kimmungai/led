<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Org extends Model
{
    use SoftDeletes;
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
