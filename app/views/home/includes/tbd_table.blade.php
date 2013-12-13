<table class='table table-striped'>
   <thead>
            <tr>
            <th>Date</th>
            <th>To do's</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tbds as $tbd)
            <tr id ="{{ $tbd->id }}">
                <td>@if(floor((time() - strtotime($tbd->date)) / 86400) >= 0)
                        	<span class='text-warning'>{{ $tbd->date }}</span>	
                        @else
                            {{ $tbd->date }}
                        @endif
                </td>
                <td>{{ $tbd->description }}</td>
                <td>
                	@if ($tbd->done != 0)
                	<button class='btn btn-sm btn-primary tbdStatus'><span class="glyphicon glyphicon-check"></span></button>
                	@else
                	<button class='btn btn-sm btn-primary tbdStatus'><span class="glyphicon glyphicon-unchecked"></span></button>
                	@endif
                </td>
                <td><button class='btn btn-sm btn-success tbdUpdate'><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class='btn btn-sm btn-danger tbdDelete'><span class="glyphicon glyphicon-remove"></span></button></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>    
	@if (!isset($tbd))
	<p class="lead">You have no data!</p>   
	@endif

	
	