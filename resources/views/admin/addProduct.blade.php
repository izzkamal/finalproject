@extends('layouts.admin')


@section('container')
<div class="asd">

    <form class="form-horizontal" action="{{route('storeProduct')}}" method="POST" enctype="multipart/form-data">
        {{-- {{ csrf_field() }} --}}
        @csrf

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_id">Product Name</label>
            <div class="col-md-4">
                @csrf
                <input id="product_id" name="name" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="product_categorie">Product Category</label>
            <div class="col-md-4">
                @csrf
                <select id="product_categorie" name="categorie" class="form-control">
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">Product Price</label>
            <div class="col-md-4">
                @csrf
                <input id="product_name" name="price" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">Product Description</label>
            <div class="col-md-4">
                @csrf
                <textarea class="form-control" id="product_description" name="description"></textarea>
            </div>
        </div>

        <!-- Select Basic -->

        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">Product Picture</label>
            <div class="col-md-4">
                @csrf
                <input type="file" name="picture">
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="form-group">
            <div class="wer">
                <div class="row">
                    <div class="col-sm-12">
                        @csrf
                        <button type="submit" class="btn btn-success" style="width: 150px;font-size: x-large;">Save</button>
                    </div>
                </div>
            </div>
        </div>



        <br>
        <br>
        <br>





    </form>

</div>

@endsection


@section('style')
<style>
.asd{
    margin-left: 60px;
}
</style>
@endsection
