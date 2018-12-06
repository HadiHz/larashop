<tr>
    <td>{{  $product->name  }}</td>
    <td>{{  $product->price  }}</td>
    <td>{{  $product->quantity_in_warehouse  }}</td>
    <td>

        <a href="{{ route('admin.product.edit',[$product->id])  }}">Edit</a>
        <a href="{{ route('admin.product.delete',[$product->id])  }}">Delete</a>
    </td>

</tr>