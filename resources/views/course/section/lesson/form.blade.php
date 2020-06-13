@extends('layouts.app')

@section('content')

<b-container fluid="lg">
		
	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1>
				@isset($lesson) 
					Edit Lesson {{ $lesson['title'] }}	
				@endisset

				@empty($lesson)
					Create Lesson
				@endempty
			</h1>
		</b-col>
	</b-row>
	<b-row class="justify-content-md-center mt-4">
		<b-col cols="12">
			@isset($lesson)
				<lesson-form
					:course_id="{{ $courseId }}"
					:section_id="{{ $sectionId }}"
					:section='@json($lesson)'
				>
				</lesson-form>
			@endisset

			@empty($lesson)
				<lesson-form
					:course_id="{{ $courseId }}"
					:section_id="{{ $sectionId }}"
				>
				</lesson-form>
			@endempty
		</b-col>
	</b-row>

</b-container>

@endsection
