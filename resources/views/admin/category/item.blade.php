<tr>
    <td>{{  $category->id  }}</td>
    <td>{{  $category->name  }}</td>
    <td>
        <a href="{{ route('admin.categories.edit',[$category->id])  }}">Edit</a>
        <a href="{{ route('admin.categories.remove',[$category->id])  }}">Remove</a>
    </td>

</tr>