<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract
{

	use Authenticatable;//, CanResetPassword;
	use EntrustUserTrait;

	protected $fillable = ['name', 'email', 'password'];
	protected $hidden = ['password', 'remember_token'];


    public function getNameAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

}
