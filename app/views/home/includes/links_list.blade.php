  <table class='table table-striped'>
   <thead>
            <tr>
            <th style = "width: 80%">Url</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
            <tr id ="{{ $link->id }}">
                <td ><a href="{{ $link->url }}">{{ $link->url }}</a></td>
                <td><button class='btn btn-sm btn-success linkUpdate'><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class='btn btn-sm btn-danger linkDelete'><span class="glyphicon glyphicon-remove"></span></button></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>    
	@if (!isset($link))
	<p class="lead">You have no links!</p>   
	@endif
	
  
  
  
    
    
  
