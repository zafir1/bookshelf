@extends('layouts.app')
@section('title')
	{{ $book->name }}
@endsection

@section('content')

	<div class="card ">
		<div class="card-header h3 text-center">
			{{ $book->name }}
		</div>
		<div class="card-body">
			<div class="row text-center">
				<div class="col-md-6">
					<h5 class="card-title"><b>By: </b>{{ $book->author }}</h5>
				</div>
				<div class="col-md-6">
					<h5 class="card-title"><b>publication: </b>{{ $book->publication }}</h5>
				</div>
				<div class="col-md-6">
					<h5 class="card-title"><b>Edition: </b>{{ $book->edition }}</h5>
				</div>
				<div class="col-md-6">
					<h5 class="card-title"><b>Price: </b>{{ $book->price }}</h5>
				</div>
			</div>
			
			<hr>
			@if ($book_details)
				<div class="col-md-12" align="">
					{!! $book_details->description !!}
				</div>
			@else
				<div class="text-center h3 text-danger">
					Sorry! description is not available for this book.
				</div>
			@endif
		</div>
		<div class="card-footer text-muted">
			{{ $upload_time }}
		</div>
	</div>
	<hr>
	<div class=" mb-4">
		@if (Auth::id()==$seller->id)
			<form action="{{ route('book.update',$book->id) }}" method="post">
				@csrf
				@method('PATCH')
				<input type="submit" value="Sold / Donated" class="btn btn-danger float-right">
			</form>
		@else
			@include('books.seller')
		@endif

	</div>


@endsection