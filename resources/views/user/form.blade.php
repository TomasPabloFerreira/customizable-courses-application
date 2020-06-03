@extends('layouts.app')

@section('content')

<b-container fluid="lg">
		
	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1>
				@isset($user) 
					Edit User {{ $user['name'] }}	
				@endisset

				@empty($user)
					Create User
				@endempty
			</h1>
		</b-col>
	</b-row>
	<b-row class="justify-content-md-center mt-4">
		<b-col cols="12">
			@isset($user)
				<user-form :user='@json($user)'></user-form>
			@endisset

			@empty($user)
				<user-form></user-form>
			@endempty
		</b-col>
	</b-row>

</b-container>

@endsection
