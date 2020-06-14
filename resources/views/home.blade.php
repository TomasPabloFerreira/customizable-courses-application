@extends('layouts.app')

@section('content')

<b-container fluid class="header bg-secondary">
	<h1 class="display-3 text-white">Courses</h1>
</b-container>

<b-container class="my-4">
	<div>
		<b-card-group columns>
			@foreach ($courses as $course)
				<b-card
					class="mt-4"
					title="{{ $course->title }}"
					img-src="{{ $course->image_source }}"
					img-alt="course_image"
					img-top
					style="cursor: pointer"
					onclick="location.href='course/{{ $course->id }}'"
				>
					<b-card-text>
						{{ $course-> description }}
					</b-card-text>
					<template v-slot:footer>
						<small class="text-muted">
							n lessons
						</small>
					</template>
				</b-card>
			@endforeach
		</b-card-group>
	</div>
</b-container>

@endsection
