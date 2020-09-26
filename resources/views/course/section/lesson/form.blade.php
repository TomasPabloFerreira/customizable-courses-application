@extends('layouts.app')

@section('content')

<b-container fluid="lg" class="py-4">
		
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
				<form
					action="
						{{route('lesson.update',[
							'courseId' => $courseId,
							'sectionId' => $sectionId,
							'id' => $lesson->id
						])}}
					"
					@submit="(e) => { this.$refs.updateform.validateForm(e) }"
					method="POST"
				>
					@csrf
					<lesson-form
						:course_id="{{ $courseId }}"
						:section_id="{{ $sectionId }}"
						:lesson='@json($lesson)'
						ref="updateform"
					>
					</lesson-form>
				</form>
			@endisset

			@empty($lesson)
				<form
					action="
						{{route('lesson.store',[
							'courseId' => $courseId,
							'sectionId' => $sectionId
						])}}
					"
					@submit="(e) => { this.$refs.createform.validateForm(e) }"
					method="POST"
				>
					@csrf
					<lesson-form
						:course_id="{{ $courseId }}"
						:section_id="{{ $sectionId }}"
						ref="createform"
					>
					</lesson-form>
				</form>
			@endempty
		</b-col>
	</b-row>

</b-container>

@endsection
