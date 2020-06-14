@extends('layouts.app')

@section('content')

<b-container fluid="lg" class="py-4">
		
	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1>
				@isset($section) 
					Edit Course Section {{ $section['title'] }}	
				@endisset

				@empty($section)
					Create Course Section
				@endempty
			</h1>
		</b-col>
	</b-row>
	<b-row class="justify-content-md-center mt-4">
		<b-col cols="12">
			@isset($section)
				<course-section-form
					:course_id="{{ $courseId }}"
					:section='@json($section)'
				>
				</course-section-form>
			@endisset

			@empty($section)
				<course-section-form :course_id="{{ $courseId }}">
				</course-section-form>
			@endempty
		</b-col>
	</b-row>

</b-container>

@endsection
