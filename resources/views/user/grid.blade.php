@extends('layouts.app')

@section('content')

<b-container fluid="lg" class="py-4">

    	<b-row class="text-center mt-1 mb-1">
        	<b-col>
            		<h1 class="display-4">
                		Users
            		</h1>
        	</b-col>
    	</b-row>
	<b-row class="justify-content-md-center">
        	<b-col cols="12">
            		<user-grid :users='@json($users)'></user-grid>
        	</b-col>
	</b-row>

</b-container>

@endsection
