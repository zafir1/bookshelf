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
					<input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Type book name.." autocomplete="off" >
				</div>
				
				{{-- /*========================================== --}}
				{{-- =            Author publication            = --}}
				{{-- ==========================================*/ --}}
				
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<div class="mb-0 "> <label for="author"><b>Author :</b></label> </div>
							<input type="text" name="author" id="author" class="form-control" placeholder="Type author name.." autocomplete="off" >
						</div>
					</div>

					<div class="col-md-5">
						<div class="form-group">
							<div class="mb-0 "> <label for="publication"><b>Publication:</b></label> </div>
							<input type="text" name="publication" id="publication" class="form-control" placeholder="Type publication name.." autocomplete="off" >
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
							<input type="number" name="price" id="price" class="form-control" placeholder="Book price..." autocomplete="off" >
						</div>
					</div>

					<div class="col-md-9">
						<div class="form-group">
							<div class="mb-0 "> <label for="eidtion"><b>Eidtion :</b></label> </div>
							<input type="text" name="eidtion" id="eidtion" class="form-control" placeholder="Enter price of books.." autocomplete="off" >
						</div>
					</div>

				</div>
				
				{{-- /*=====  End of Price and Edition  ======*/ --}}
			</div>

			<div class="col-md-4 mt-3">
				<div class="h4">
					Fields Related to..
				</div>
				@include('interest.fields')
			</div>

		</div>
		<input type="submit" value="Add Book" class="btn btn-success form-control">
	</form>
@endsection