@extends('layouts.dash')



@section('title')
    YourProfile
@endsection


@section('container')
    <form method="POST" action="{{ route('editProfile', [$user->id]) }}"  class="inputForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="name"
                value="{{ $user->name }}">
        </div>
        <br>
        <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            @csrf
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="email"
                value="{{ $user->email }}">
        </div>
        <br>
        <div class="form-group">
            <label for="formGroupExampleInput">Phone</label>
            @csrf
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="phone"
                value="{{ $user->phone }}">
        </div>
        <br>
        <div class="form-group">
            <label for="formGroupExampleInput">Address</label>
            @csrf
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="address"
                value="{{ $user->address }}">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlFile1">Profile Picture</label>
            @csrf
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="picture">
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-lg px-3">Save</button>

    </form>
    <br>
    <br>
    <br>
    <br>
@endsection



@section('style')
    <style>
        .inputForm {
            width: 80%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
        }

    </style>
@endsection
