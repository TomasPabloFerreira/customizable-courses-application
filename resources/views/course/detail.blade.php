@extends('layouts.app')

@section('content')

<b-container fluid class="course-header bg-secondary">
	<b-img
		thumbnail
		style=""
		src="{{ $course->image_source }}"
	>
	</b-img>
	<b-row class="text-row">
		<b-col md="8" offset-md="4">
			<h1 class="display-3 text-white">
			{{ $course-> title }}
			</h1>
			<p class="description">
				{{ $course->description }}
			</p>
		</b-col>
	</b-row>
</b-container>

<b-container class="lesson-list-container">

	<lesson-list :course='@json($course)'></lesson-list>

</b-container>

@endsection
