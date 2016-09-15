<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	/**
	 * Атрибуты, которые могут быть изменены пользователем.
	 *
	 * @var array
	 */
	protected $fillable = [
			'title',
			'body'
	];
	
	protected $dates = ['created_at'];
}
