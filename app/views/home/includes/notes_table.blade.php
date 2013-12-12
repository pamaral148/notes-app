
    <table class='table table-striped'>
        <thead>
            <tr>
	            <th>Text</th>
	            <th>Edit</th>
	            <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr id= "{{$note->id}}">
                <td>{{ Note::snippet($note->description) }}</td>
                <td><button class='btn btn-sm btn-success noteUpdate'><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class='btn btn-sm btn-danger noteDelete'><span class="glyphicon glyphicon-remove"></span></button></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>    
 
