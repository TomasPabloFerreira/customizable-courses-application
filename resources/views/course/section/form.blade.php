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
				<form
					action="
						{{route('course.section.update',[
							'courseId' => $courseId,
							'id' => $section->id
						])}}
					"
					@submit="(e) => { this.$refs.updateform.validateForm(e) }"
					method="POST"
				>
					@csrf
					<course-section-form
						:course_id="{{ $courseId }}"
						:section='@json($section)'
						ref="updateform"
					>
					</course-section-form>
				</form>
			@endisset

			@empty($section)
				<form
					action="
						{{route('course.section.store',[ 'courseId' => $courseId ])}}
					"
					@submit="(e) => { this.$refs.createform.validateForm(e) }"
					method="POST"
				>
					@csrf
					<course-section-form
						:course_id="{{ $courseId }}"
						ref="createform"
					>
					</course-section-form>
				</form>
			@endempty
		</b-col>
	</b-row>

</b-container>

@endsection
