@extends('layouts.app')

@section('content')

<b-container fluid="lg" class="py-4">
		
	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1>
				Create Course Acquisitions
			</h1>
		</b-col>
	</b-row>
	<b-row class="justify-content-md-center mt-4">
		<b-col cols="12">
			<form
				action="{{route('course.acquisition.store')}}"
				@submit="(e) => { this.$refs.createform.validateForm(e) }"
				method="POST"
			>
				@csrf
				<course-acquisition-form
					:courses='@json($courses)'
					:users='@json($users)'
					:courseacquisitions='@json($courseAcquisitions)'
					ref="createform"
				>
				</course-acquisition-form>
			</form>
		</b-col>
	</b-row>

</b-container>

@endsection
