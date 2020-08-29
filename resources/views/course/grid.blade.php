@extends('layouts.app')

@section('content')

<b-container fluid="lg" class="py-4">

	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1 class="display-4">
				Courses
			</h1>
		</b-col>
	</b-row>
	<b-row>
		<b-col cols="12">
			<course-grid :courses='@json($courses)'></course-grid>
		</b-col>
	</b-row>
</b-container>

@endsection
