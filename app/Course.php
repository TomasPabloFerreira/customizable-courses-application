<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model 
{
    protected $table = 'course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'title',
		'description',
		'image_source'
    ];
	
	public $timestamps = false;

	public function sections () 
	{
		return $this->hasMany('App\CourseSection');
	}
}
