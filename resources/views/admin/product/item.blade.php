<tr>
    <td>{{  $product->name  }}</td>
    <td>{{  $product->price  }}</td>
    <td>{{  $product->quantity_in_warehouse  }}</td>
    <td>

        <a href="{{ route('admin.product.edit',[$product->id])  }}">Edit</a>
        <a href="{{ route('admin.product.delete',[$product->id])  }}">Delete</a>
        @if( !in_array($product->id , $sliders) )
        <a href="{{ route('admin.slider.add',[$product->id])  }}">نشان دادن در اسلایدر</a>
            @else
            <a href="{{ route('admin.slider.delete',[$product->id])  }}">حذف از اسلایدر</a>
            @endif
    </td>

</tr>