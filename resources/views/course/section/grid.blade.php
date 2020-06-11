@extends('layouts.app')

@section('content')

<b-container fluid="lg">

	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1 class="display-4">
				Course Sections
			</h1>
		</b-col>
	</b-row>
	<b-row>
		<b-col cols="12">
			<course-section-grid :sections='@json($sections)'>
			</course-section-grid>
		</b-col>
	</b-row>
</b-container>

</b-container>

@endsection
