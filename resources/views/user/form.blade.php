@extends('layouts.app')

@section('content')

<b-container fluid="lg">
		
	<b-row class="text-center mt-1 mb-1">
		<b-col>
			<h1> 
				Edit User {{ $user['name'] }}	
			</h1>
		</b-col>
	</b-row>
	<b-row class="justify-content-md-center mt-4">
		<b-col cols="12">
			<user-form :user='@json($user)'></user-form>
		</b-col>
	</b-row>

</b-container>

@endsection
