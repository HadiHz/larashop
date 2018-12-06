<tr>
    <td>{{  $shippingMethod->name  }}</td>
    <td>{{  $shippingMethod->cost  }}</td>
    <td>
        <a href="{{ route('admin.shippingMethods.edit',[$shippingMethod->id])  }}">Edit</a>
        <a href="{{ route('admin.shippingMethods.remove',[$shippingMethod->id])  }}">Remove</a>
    </td>

</tr>