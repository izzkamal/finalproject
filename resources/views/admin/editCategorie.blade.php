@extends('layouts.admin')

@section('container')


<form class="addForm" action="{{ route('editCategorie',[$categorieName->id]) }}" method="POST">
    @csrf
    <label for="staticEmail" class="col-sm-2 col-form-label">Name Categorie</label>
    <br>
    <input class="form-control form-control-lg" type="text" value="{{ $categorieName->name }}"placeholder=".form-control-lg" name="name">
    <br>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<div class="addForm">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $categorie->name }}</td>
                <td>
                    <form action="{{ route('editCategoriePage',[$categorie->id]) }}" method="GET">@csrf<button type="submit" class="btn btn-primary">Edit</button></form>
                </td>
                <td>
                    <form action="{{ route('deleteCategorie',[$categorie->id]) }}" method="POST">@csrf<button type="submit" class="btn btn-danger">Delete</button></form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection



@section('style')
<style>
.addForm{
    margin-left: 60px;
    margin-top: 60px;
}
</style>

@endsection

