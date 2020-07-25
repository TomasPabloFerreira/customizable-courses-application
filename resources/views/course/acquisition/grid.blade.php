@extends('layouts.app')

@section('content')

<b-container fluid="lg" class="py-4">

	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1 class="display-4">
				Course Acquisitions
			</h1>
		</b-col>
	</b-row>
	<b-row>
		<b-col cols="12">
			<course-acquisition-grid
				:courseacquisitions='@json($courseAcquisitions)'
			></course-acquisition-grid>
		</b-col>
	</b-row>
</b-container>

</b-container>

@endsection
