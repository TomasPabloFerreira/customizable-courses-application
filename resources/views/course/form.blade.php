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
				<form
					action="{{route('course.update', ['id' => $course->id])}}"
					@submit="(e) => { this.$refs.updateform.validateForm(e) }"
					method="POST"
				>
					@csrf
					<course-form
						ref="updateform"
						:course='@json($course)'
					>
					</course-form>
				</form>
			@endisset

			@empty($course)
				<form
					action="{{route('course.store')}}"
					@submit="(e) => { this.$refs.createform.validateForm(e) }"
					method="POST"
				>
					@csrf
					<course-form ref="createform"></course-form>
				</form>
			@endempty
		</b-col>
	</b-row>

</b-container>

@endsection
