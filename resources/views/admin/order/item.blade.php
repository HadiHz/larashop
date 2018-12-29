<tr>
    <td>{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
    <td>{{ number_format($order->total_price) }}</td>
    <td>{{ $order->shippingMethodName() }}</td>
    <td>{{ jdate($order->created_at) }}</td>
    <td>{{ $order->order_status_format() }}</td>
    <td>
        <a href="{{ route('admin.orders.details' , $order->id) }}">جزییات</a>
    </td>
</tr>