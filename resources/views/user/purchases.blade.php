@extends('layouts.dash')


@section('title')
Purchases
@endsection



@section('container')
<br>
<br>
<br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col">Purchase Date</th>
            <th scope="col">Received Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $purchases as $purchase )
        <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$purchase->name}}</td>
            <td>{{$purchase->price}} $</td>
            <td><img src="{{ $purchase->picture }}" alt="Admin" style="height: 50px;width: 50px;"></td>
            <td>{{$purchase->created_at}}</td>
            <td>{{$purchase->updated_at}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<br>
<br>
<br>

@endsection





@section('style')

@endsection
