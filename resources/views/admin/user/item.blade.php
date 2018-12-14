<tr>
    <td>{{  $user->first_name  }}</td>
    <td>{{  $user->last_name  }}</td>
    <td>{{  $user->email  }}</td>
    <td>

        <a href="{{ route('admin.user.edit',[$user->id])  }}">Edit</a>
        <a href="{{ route('admin.user.delete',[$user->id])  }}">Delete</a>
    </td>

</tr>