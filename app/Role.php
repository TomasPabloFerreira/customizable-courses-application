<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model 
{
    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
	
	public $timestamps = false;

	public function users () 
	{
		return $this->hasMany('App\User');
	}

	public static function getSelector()
	{
		return self::get(['id as value', 'name as text']);
	}
}
