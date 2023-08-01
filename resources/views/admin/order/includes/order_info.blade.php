<table class="table table-bordered table-striped">
    <tr>
        <td>Order No</td>
        <td>#{{ $result->id }}</td>
    </tr>
    <tr>
        <td>Reference ID</td>
        <td>{{ $result->stripe_pi_id }}</td>
    </tr>
    <tr>
        <td>Total Amount</td>
        <td>{{ $result->total_amount }}</td>
    </tr>
    <tr>
        <td>Created At</td>
        <td>{{ date('Y-m-d H:i',strtotime($result->created_at)) }}</td>
    </tr>
</table>