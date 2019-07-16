<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','org_id','name','type','firstName','middleName','lastName','phoneNumber','address','biography','avatar','idNo','idImage','passport','passportImage','gender','DOB','designation','remarks',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function org()
    {
      return $this->belongsTo('App\Org');
    }

    public function purchase()
    {
      return $this->hasMany('App\Purchase');
    }

    public function sale()
    {
      return $this->hasMany('App\Sale');
    }

    public function UserTransactions()
    {
      return $this->hasMany('App\UserTransactions');
    }
}
