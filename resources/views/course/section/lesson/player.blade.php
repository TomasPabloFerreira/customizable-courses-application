@extends('layouts.app')

@section('content')

<b-container fluid class="player-course-header bg-secondary">
	<a href="/course/{{ $course->id }}">{{ $course->title }}</a>
</b-container>

<video-player
	:course='@json($course)'
	:sectionid="{{ $sectionId }}"
	:lessonid="{{ $lessonId }}"
>
</video-player>

@endsection
