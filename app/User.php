<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{

	/**
	 * Атрибуты, которые могут быть изменены пользователем.
	 * 
	 * @var array
	 */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
    ];

    /**
     * Скрытые атрибуты.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Устанавливает связь один-ко-многим с моделью Auction
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auctions() {
    	return $this->hasMany('App\Auction');
    }
    

    public function isModerator()
    {
    	if (!Auth::guest() && Auth::user()->moderator)
    		return true;
    	else
    		return false;
    }
}
