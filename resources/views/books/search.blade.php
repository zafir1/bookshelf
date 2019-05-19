<form action="{{ url('booksearch') }}" method="POST">
	@csrf
	<div class="row">
		<div class="form-group col-md-9">
			<input type="text" name="search" value="{{ old('search') }}" class="form-control" placeholder="Search your book here...">
		</div>
		<div class="col-md-3">
			<button type="submit" class="form-control"><i class="fas fa-search"> Search</i></button>
		</div>
	</div>
</form>