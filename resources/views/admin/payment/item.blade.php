<tr>
    <td>{{ $payment->user->first_name . ' ' . $payment->user->last_name }}</td>
    <td>{{ number_format($payment->amount) }}</td>
    <td>{{ $payment->gateway_name }}</td>
    <td>{{ $payment->reserve_number }}</td>
    <td>{{ $payment->reference_number }}</td>
    <td>{{ jdate($payment->created_at) }}</td>
    <td>{{ $payment->payment_status_format() }}</td>
    <td>

    </td>
</tr>