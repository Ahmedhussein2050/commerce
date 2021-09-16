@extends('layouts.app')
@section('title')
    Edit Product
@endsection

@section('content')

    <div class="w-25 m-auto">
        <form action="{{ route('product.edit',$product->id )}}" method="post">
            @csrf
            <div>

                <div class="mb-3">
                    <label class="form-label" for="price">Edit Price</label>
                    <input class="form-control" id="price" type="text" name="price" value="{{$product->price}}" required autofocus />
                </div>
                <div>
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>


@endsection
