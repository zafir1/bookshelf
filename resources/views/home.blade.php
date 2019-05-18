@extends('layouts.app')

@section('content')

    <div class="row">
		<div class="col-md-6">
			<h4>Books For you!</h4>
		</div>
		<div class="col-md-6">
			@include('books.search')
		</div>
    </div>

    <div class="row">
    	@foreach ($books as $book)
    		@include('books.block')
    	@endforeach
    </div>
	
@endsection
