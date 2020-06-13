<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model 
{
    protected $table = 'lesson';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'title',
		'video_source',
		'duration',
		'course_section_id'
    ];
	
	public $timestamps = false;
}
