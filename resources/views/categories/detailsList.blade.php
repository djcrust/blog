@foreach($categories as $category)
    <tr id = "{{ $category->id }}">
        <th>{{ $category->id }}</th>
        <td>{{ $category->name }}</td>
        <td>{{ $category->created_at }}</td>
        <td>{{ $category->updated_at }}</td>
        <td>
            <button class="btn btn-default btn-edit" data-id="{{ $category->id }}"><span class="glyphicon glyphicon-edit"></span> Edit</button>
            <button class="btn btn-danger btn-delete" data-id="{{ $category->id }}"><span class="glyphicon glyphicon-remove"></span> Delete</button>
        </td>
    </tr>
@endforeach
