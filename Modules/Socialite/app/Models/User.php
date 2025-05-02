<?php

namespace Modules\Socialite\Models;


use Modules\Auth\Models\User as BaseUser;

class User extends BaseUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
    ];
}
