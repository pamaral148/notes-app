<div class='table-container pull-right'>
    <table class='table table-striped'>
        <thead>
            <tr>
            <th>Title</th>
            <th>Text</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ link_to_route('note.update', $note->title, array('id' => $note->id)) }}</td>
                <td>{{ $note->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>    
