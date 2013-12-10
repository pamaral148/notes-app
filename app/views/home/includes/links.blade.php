<div class='form-container pull-left' id=links-container'>
    {{ Form::open(array('url' => 'links/post', 'method' => 'post', 'role' => 'form')) }}
        @foreach($links as $link)
            <div class="form-group">    
                <label class="sr-only" for="link_{{ $link->id }}">Link</label>
                {{ Form::text($link->id, $link->url, array('class' => 'form-control', 'id' => $link->id )) }}
            </div>
        @endforeach
            <div class="form-group">    
                <label class="sr-only" for="new_link">Link</label>
                {{ Form::text('url', Input::old('url'), array('placeholder' => 'Add a URL', 'class' => 'form-control', 'id' => 'url' )) }}
            </div>
        {{ Form::submit('Save') }}
    {{ Form::close() }}
</div>    

