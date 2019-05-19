<html>
    <head>
        <meta charset="utf-8">
        <title>Description of Book.</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    </head>
    <body>
        @include('layouts.navigations.topnav')
    	
        <div class="container">
        	@include('layouts.partials.alerts')
            <div class="h4 mt-3 mb-3">
                Add Details
            </div>
            <div class="row mt-3 mb-3">
            	<div class="col-md-6">
            		<b>Author:</b> {{ $book->author }}
            	</div>
            	<div class="col-md-6">
            		<b>publication:</b> {{ $book->publication }}
            	</div>
            	<div class="col-md-6">
            		<b>Price:</b> {{ $book->price }}
            	</div>
            	<div class="col-md-6">
            		<b>Edition:</b> {{ $book->edition }}
            	</div>
            </div>
            <div>
                {{-- Add Book Details here. --}}
            </div>

            <div class="">
                <form action="{{ url('book_details/'.$id.'/add') }}" method="POST" class="form-group">
                    @csrf
                    <textarea name="description">Write something about <h3>me<h3></textarea>
                    <input type="submit" value="Add detail" class="mt-4 btn btn-primary form-control">
                </form>
            </div>
        </div>
    </body>
    <script>
            CKEDITOR.replace( 'description' );
    </script>
</html>