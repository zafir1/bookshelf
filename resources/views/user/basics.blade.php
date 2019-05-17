@extends('layouts.app')

@section('title','TheBookShelf | Fill Basic Details')

@section('content')
<div class="row">
	<div class="col-md-8">
		<form action="{{ url('basic') }}" method="POST">
			@csrf
			<div class="form-group mb-4">
				<b class="mb-2">College: </b>
				<select name="college" class="form-control" id="exampleFormControlSelect1 col-lg-6">
					@foreach ($colleges as $college)
						<option value="{{ $college->id }}">{{ $college->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group mb-4">
				<b class="mb-2">Department: </b>
				<select name="department" class="form-control" id="exampleFormControlSelect1 col-lg-6">
					@foreach ($departments as $department)
						<option value="{{ $department->id }}">{{ $department->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group mb-4">
				<b class="mb-2">Location: </b>
				<select name="location" class="form-control" id="exampleFormControlSelect1 col-lg-6">
					@foreach ($locations as $location)
						<option value="{{ $location->id }}">{{ $location->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group mb-4">
				<b class="mb-2">Contact: </b>
				<input name="contact" type="number" placeholder="Enter your Contact number..." class="form-control">
			</div>
			<input class="btn btn-success float-right" type="submit" name="submit" value="Update">
		</form>
	</div>
</div>
@endsection