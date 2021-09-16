@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')

    <div class="row m-auto" style="width: 66%">
        @if(count($products) > 0)
            @foreach($products as $product)
                <div class="col-lg-4 pb-5">
                    <div class="card">
                        <img src="{{ asset($product->image)}}" class="card-img-top img-fluid" style="height: 180px" alt="photo">
                        <div class="card-body">
                            <p class="card-title mb-0">
                                <b>{{ $product->name }}</b>
                            </p>
                            <p class="card-text mb-1">{{ substr($product->desc, 0, 20) }}...</p>
                            <h5 style="margin-bottom: 2px">Categories:</h5>
                            @foreach($product->categories as $category)
                                <a href="{{ route('categories.products', $category) }}" class="text-decoration-none text-warning mb-1"
                                   style="margin-right: 3px !important; padding: 0 !important; border: none !important; cursor: pointer; background-color: transparent">
                                    <b>{{ $category->name }}</b>
                                </a>
                            @endforeach
                            <p class="card-text mb-1" style="font-size: 12px">
                                <b style="width: 30%; font-weight: 900">{{$product->price}} EGP</b>
                            </p>

                            <a href="{{ url('product',$product->id) }}" style="font-size: 12px;" class="mr-1 text-decoration-none text-secondary"><b>View</b></a>
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

                        </div>
                    </div>
                </div>
            @endforeach
            <div>
                {{ $products->links() }}
            </div>
        @else
            <p>No products founded</p>
        @endif
    </div>

@endsection
