<div class='table-container pull-right'>
    <table class='table table-striped'>
        <thead>
            <tr>
            <th>Title</th>
            <th>Text</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tbds as $tbd)
            <tr>
                <td>{{ link_to_route('tbd.update', $tbd->title, array('id' => $tbd->id)) }}</td>
                <td>{{ $tbd->description }}</td>
                <td><button class='btn btn-sm btn-danger'>{{ link_to_route('tbd.delete', 'Delete', array('id' => $tbd->id)) }}</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>    
