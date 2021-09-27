@extends('layouts.app')
@section('title')
    {{ $category->name }}
@endsection

@section('content')

    <div class="row m-auto" style="width: 66%">
        @foreach($products as $product)
                <div class="col-lg-4 pb-5">
                    <div class="card">
                        <img src="{{ asset($product->image)}}" class="card-img-top img-fluid" style="height: 180px" alt="photo">
                        <div class="card-body">
                            <p class="card-title mb-0">
                                <b>{{ $product->name }}</b> by <small><b>{{$product->user->username}}</b></small>
                            </p>
                            <p class="card-text mb-1">{{ substr($product->desc, 0, 20) }}...</p>
                            <h5 style="margin-bottom: 2px">Categories:</h5>
                            <p class="btn text-warning mb-1"
                               style="margin-right: 3px !important; padding: 0 !important;">
                                <b>{{ $category->name }}</b>
                            </p>
                            <p class="card-text mb-1" style="font-size: 12px">
                                <b style="width: 30%; font-weight: 900">{{$product->price}} EGP</b>
                            </p>

                            <a href="{{ url('product',$product->id) }}" style="font-size: 12px;" class="mr-1 text-decoration-none text-secondary"><b>View</b></a>
                            @if(auth()->user()->id == $product->user_id)
                                <a href="{{ route('product.edit',$product) }}" style="font-size: 12px;" class="mr-1 text-decoration-none text-primary"><b>Edit</b></a>

                                <form class="w-25 mx-0" style="display: inline" action="{{ route('product.delete', $product) }}" method="get">
                                    <button type="submit"
                                            class="text-danger"
                                            style="
                                                    font-size: 12px;
                                                    border: none;
                                                    background-color: transparent;
                                                    display: inline;
                                                    padding: 0;
                                            "
                                    ><b>Delete</b></button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <div>
            </div>
        </div>

@endsection
