@extends('layouts.app')

@section('title','Add Book | TheBookShelf')
@section('content')

    <div class="h3">
        Add Book
    </div>
	
	<form action="{{ route('book.store') }}" method="post">
		@csrf
		<div class="row mt-3">
			<div class="col-md-8">
				<div class="form-group">
					<div class="mb-0 "> <label for="name"><b>Book Name:</b></label> </div>
					<input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Type book name.." autocomplete="off" >
					<small class="{{ $errors->has('name') ? 'text-danger' : 'form-text text-muted' }}">
						{{ $errors->has('name') ? $errors->first('name') : "Enter a valid BookName" }}
					</small>
				</div>
				
				{{-- /*========================================== --}}
				{{-- =            Author publication            = --}}
				{{-- ==========================================*/ --}}
				
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<div class="mb-0 "> <label for="author"><b>Author :</b></label> </div>
							<input type="text" name="author" id="author" class="form-control" placeholder="Type author name.." autocomplete="off" value="{{ old('author') }}">
							<small class="{{ $errors->has('author') ? 'text-danger' : 'form-text text-muted' }}">
								{{ $errors->has('author') ? $errors->first('author') : "" }}
							</small>
						</div>
					</div>

					<div class="col-md-5">
						<div class="form-group">
							<div class="mb-0 "> <label for="publication"><b>Publication:</b></label> </div>
							<input type="text" name="publication" id="publication" class="form-control" placeholder="Type publication name.." autocomplete="off" value="{{ old('publication') }}">
							<small class="{{ $errors->has('publication') ? 'text-danger' : 'form-text text-muted' }}">
								{{ $errors->has('publication') ? $errors->first('publication') : "" }}
							</small>
						</div>
					</div>
				</div>
				
				{{-- /*=====  End of Author publication  ======*/ --}}



				{{-- /*========================================= --}}
				{{-- =            Price and Edition            = --}}
				{{-- =========================================*/ --}}
				
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<div class="mb-0 "> <label for="price"><b>Price :</b></label> </div>
							<input type="number" name="price" id="price" class="form-control" placeholder="Book price..." autocomplete="off" value="{{ old('price') }}">
							<small class="{{ $errors->has('price') ? 'text-danger' : 'form-text text-muted' }}">
								{{ $errors->has('price') ? $errors->first('price') : "" }}
							</small>
						</div>
					</div>

					<div class="col-md-9">
						<div class="form-group">
							<div class="mb-0 "> <label for="edition"><b>Eidtion :</b></label> </div>
							<input type="text" name="edition" id="edition" class="form-control" placeholder="Enter price of books.." autocomplete="off" value="{{ old('edition') }}">
							<small class="{{ $errors->has('edition') ? 'text-danger' : 'form-text text-muted' }}">
								{{ $errors->has('edition') ? $errors->first('edition') : "" }}
							</small>
						</div>
					</div>
				</div>
				
				{{-- /*=====  End of Price and Edition  ======*/ --}}
				<input type="submit" value="Add Book" class="btn btn-success form-control">
			</div>

			<div class="col-md-4 mt-3">
				<div class="h5 text-primary" >
					Book is related to:
				</div>
				@if ($errors->has('checkbox'))
					<small class="text-danger"><b>Please Choose at least 3 fields</b></small>
				@endif
				@include('interest.fields')
				<a href="{{ url('interest') }}" class="btn btn-primary form-control mt-3">Add new Field</a>
			</div>
		</div>
	</form>
@endsection