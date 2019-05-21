@extends('layouts.app')

@section('content')
	<h3>Your's book list</h3><hr>
	@foreach ($books as $book)
		
		<div class="col-md-12 bg-light mt-4">
			<div class="row">
				<div class="col-md-8">
					<div class="h5">
						{{ $book->name }}
					</div>
					<div class="">
						Author: {{ $book->author }}
					</div>
					<div class="">
						Publication: {{ $book->publication }}
					</div>
				</div>
				<div class="col-md-4">
					<form action="{{ route('book.update',$book->id) }}" method="post">
						@csrf
						@method('PATCH')
						<input type="submit" value="Sold / Donated" class="btn btn-danger float-right">
					</form>
				</div>
			</div>
			{{-- <form action="{{ route('book.update',$book->id) }}" method="post">
				@csrf
				@method('PATCH')
				<input type="submit" value="Sold / Donated" class="btn btn-danger float-right">
			</form> --}}
		</div>

	@endforeach
@endsection
