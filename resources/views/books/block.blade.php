<div class="col-{{ $device }}-{{ $size }} mb-2 mt-2 p-3">
	<div class="card">
		<a href="">
			<div class="card-header">
				<b class="text-primary"><i class="fas fa-book"></i> {{ $book->name }}</b>
			</div>
		</a>
		<div class="card-body">
			<table class="table table-striped">
				<tr>
					<td><b>Author Name: </b></td>
					<td>{{ $book->author }}</td>
				</tr>
				<tr>
					<td><b>Publication: </b></td>
					<td>{{ $book->publication }}</td>
				</tr>
				<tr>
					<td><b>Price: </b></td>
					<td>{{ $book->price }}</td>
				</tr>
				<tr>
					<td><b>Edition: </b></td>
					<td>{{ $book->edition }}</td>
				</tr>
			</table>
			<div class="float-right">
				<a href="" class="btn btn-success">View</a>
			</div>
		</div>
		
	</div>
</div>