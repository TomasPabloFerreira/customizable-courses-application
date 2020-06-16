@extends('layouts.app')

@section('content')

<video-player
	:course='@json($course)'
	:sectionid="{{ $sectionId }}"
	:lessonid="{{ $lessonId }}"
>
</video-player>

@endsection
