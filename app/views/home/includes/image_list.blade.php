@foreach ($images as $image)
   		<a id = '{{ $image->id }}'href="./tmp/{{ $image->user_id . '/' . $image->id . '.' . $image->extension }}">
   			<img src="./tmp/{{ $image->user_id . '/thumb' . $image->id. '.' . $image->extension }}" alt = '' />
   		</a>
@endforeach 
@if (isset($image))
	<p>You have no images.</p>
@endif	
	   

