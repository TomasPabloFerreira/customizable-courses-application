@extends('layouts.app')

@section('content')

<b-container fluid="lg" class="py-4">
		
	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1>
				@isset($course) 
					Edit Course {{ $course['title'] }}	
				@endisset

				@empty($course)
					Create Course
				@endempty
			</h1>
		</b-col>
	</b-row>
	<b-row class="justify-content-md-center mt-4">
		<b-col cols="12">
			@isset($course)
				<course-form
					route="{{route('course.update', ['id' => $course->id])}}"
					:course='@json($course)'
				>
				</course-form>
			@endisset

			@empty($course)
				<course-form route="{{route('course.store')}}"></course-form>
			@endempty
		</b-col>
	</b-row>

</b-container>

@endsection
