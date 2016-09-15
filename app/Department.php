<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	/**
	 * Поля таблицы, разрешенные для заполнения
	 * 
	 * @var array
	 */
	protected $fillable = [
			'name'
	];
	
	/**
	 * Устанавливаем взаимоотношение между Auction и epartment типа Many-to-many
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function auctions()
    {
    	return $this->belongsToMany('App\Auction');
    }
}
