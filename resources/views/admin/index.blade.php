@extends('layouts.admin')

@section('container')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col">Purchase Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($purchases as $purchase)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $purchase->name }}</td>
                <td>{{ $purchase->email }} </td>
                <td>{{ $purchase->product_name }} </td>
                <td>{{ $purchase->price }} $</td>
                <td><img src="{{ $purchase->picture }}" alt="Admin" style="height: 50px;width: 50px;"></td>
                <td>{{ $purchase->created_at }}</td>
                </td>

            </tr>
            @endforeach

    </tbody>
</table>
@endsection
