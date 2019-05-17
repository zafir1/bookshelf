@extends('layouts.app')

@section('content')
	<form action="{{ url('add_new_interest') }}" method="post" class="form-group">
		@csrf
		<div class="row">
			<div class="col-md-10 mb-3">
				<input type="text" class="form-control" value="{{ old('field') }}" name="field" placeholder="Add a new field of interest...">
				@if ($errors->has('field'))
					<small class="text-danger">{{ $errors->first('field') }}</small>
				@endif
			</div>
			<div class="col-md-2">
				<input type="submit" class="btn btn-success form-control" value="Add new field">
			</div>
		</div>
	</form>

	<hr>

	<h4>Please Select some of your field of interests..</h4>
	<form action="{{ url('submit_user_interest') }}" method="post">
		@csrf
		@foreach($fields as $checkbox)
			@include('forms.checkbox')
		@endforeach
		<div class="form-group mt-5 p-4">
			<input type="submit" value="submit interests" class="form-control btn btn-success float-right">
		</div>
	</form>
@endsection