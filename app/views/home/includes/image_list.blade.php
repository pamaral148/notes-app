<div class='table-container pull-right'>
    <p>Images to appear here</p>
   	@foreach ($images as $image)
   		<img src="./tmp/{{ $image->id.'.'.$image->extension }}" alt = '' />
   	@endforeach 
   
</div>

