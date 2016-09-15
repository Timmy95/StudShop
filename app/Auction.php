<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
	/**
	 * Атрибуты, которые могут быть изменены пользователем.
	 *
	 * @var array
	 */
    protected $fillable = [
   		'title',
   		'body',
    	'image',
    	'price'
   	];
    
    /**
     * Устанавливает связь с моделью User.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() 
    {
    	return $this->belongsTo('App\User');
    }

    public function departments() 
    {
    	return $this->belongsToMany('App\Department')->withTimestamps();
    }
    
	/**
	 * Получаем список всех категорий, к которым связан выбранный товар
	 * 
	 * @return array
	 */
    public function getDepartmentListAttribute() 
    {
    	return $this->departments->lists('id')->all();
    }
}
