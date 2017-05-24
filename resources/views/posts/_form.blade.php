
<!-- permite saber si ya fue almaccenado en bd--> 		
@if( $post->exists )
<form action="{{route('update_post_path',['post'=> $post->id])}}" method="POST">
	<!-- helper de laravel para enviar como tipo put --> 		
	{{ method_field('PUT') }}

@else

<form action="{{ route('store_post_path') }}" method="POST">

@endif
	
	<!-- token de seguridad --> 		
	{{ csrf_field() }} 





	<div class="form-group">

		<label for="title">Title:</label>

		<input type="text" name="title" class="form-control" value="{{ $post->title or old('title') }}"/>

	</div>

	<div class="form-group">

		<label for="description">Description:</label>

		<textarea rows="5" name="description" class="form-control">{{ $post->description or old('description') }}</textarea>

	</div>

	<div class="form-group">

		<label for="url">Url:</label>

		<input type="text" name="url" class="form-control" value="{{ $post->url or old('url') }}"/>

	</div>

	<div class="form-group">

		<button type="submit" class="btn btn-primary">Save Post</button>

	</div>

</form>