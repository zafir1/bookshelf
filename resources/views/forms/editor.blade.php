@extends('layouts.app')

@section('content')
	<h3>Enter something....</h3>
    <textarea name="test"></textarea>
    <script>
            CKEDITOR.replace( 'test' );
    </script>
@endsection

{{-- <!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
        </head>
        <body>
        		<h3>Enter something....</h3>
                <textarea name="test"></textarea>
                <script>
                        CKEDITOR.replace( 'test' );
                </script>
        </body>
</html> --}}