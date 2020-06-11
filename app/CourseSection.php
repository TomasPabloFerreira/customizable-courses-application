<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model 
{
    protected $table = 'course_section';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'title',
    ];
	
	public $timestamps = false;
}
