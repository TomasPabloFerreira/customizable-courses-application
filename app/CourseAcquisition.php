<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseAcquisition extends Model 
{
	protected $table = 'course_acquisition';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'course_id',
		'user_id',
	];
	
	public $timestamps = false;
	const CREATED_AT = 'added_on';

	public function course()
	{
		return $this->belongsTo('App\Course');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
