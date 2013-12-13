@foreach ($images as $image)
   		<a  class="imgthumb" href="./tmp/{{ $image->user_id . '/' . $image->id . '.' . $image->extension }}">
   			<img src="./tmp/{{ $image->user_id . '/thumb' . $image->id. '.' . $image->extension }}" alt = '' />
   		</a>
   		<button id = '{{ $image->id }}' class='btn btn-xs btn-danger imageDelete'><span class="glyphicon glyphicon-remove"></span></button></button>
@endforeach 
@if (!isset($image))
	<p>You have no images.</p>
@endif	


