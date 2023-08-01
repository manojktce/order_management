<table class="table table-bordered table-striped">
    <tr>
        <td>First Name</td>
        <td>{{ $result->orders_address->first_name }}</td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td>{{ $result->orders_address->first_name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $result->orders_address->email }}</td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td>{{ $result->orders_address->mobile_number }}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td>{{ $result->orders_address->address }}</td>
    </tr>
    <tr>
        <td>City</td>
        <td>{{ $result->orders_address->city }}</td>
    </tr>
    <tr>
        <td>Zip Code</td>
        <td>{{ $result->orders_address->zipcode }}</td>
    </tr>
    <tr>
        <td>Order Notes</td>
        <td>{{ $result->orders_address->notes }}</td>
    </tr>
    <tr>
        <td>Ordered User ID </td>
        <td>{{ $result->users->id }}</td>
    </tr>
    <tr>
        <td>Ordered User Name </td>
        <td>{{ $result->users->first_name." ".$result->users->last_name }}</td>
    </tr>
    <tr>
        <td>Created At</td>
        <td>{{ date('Y-m-d H:i',strtotime($result->created_at)) }}</td>
    </tr>
</table>