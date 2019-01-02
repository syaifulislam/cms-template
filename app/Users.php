<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends \Cartalyst\Sentinel\Users\EloquentUser
{
    protected $table = 'users';
    protected $fillable = ['email','password','first_name','last_name'];
    protected $loginNames = ['email'];
    protected $hidden = ['password'];
}
