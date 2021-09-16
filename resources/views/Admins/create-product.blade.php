@extends('layouts.app')
@section('title')
    Create Product
@endsection

@section('content')

    <div class="w-25 m-auto">
        <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>

                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    @error('name')
                    <div class=" w-100 alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input class="form-control" id="name" type="text" name="name" value="{{old('name')}}" required autofocus />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="desc"> Description </label>
                    @error('desc')
                    <div class=" w-100 alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea class="form-control"
                              rows="5"
                              id="desc" name="desc" required autofocus>{{old('desc')}}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="price">Price</label>
                    @error('price')
                    <div class=" w-100 alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input class="form-control" id="price" type="text" name="price" value="{{old('price')}}" required autofocus />
                </div>

                @if(count($categories) != null)
                    <div class="mb-3">
                        <label class="form-label d-block" for="category">Choose Category</label>
                        @error('category')
                        <div class=" w-100 alert alert-danger">{{ $message }}</div>
                        @enderror
                        @foreach($categories as $category)
                            <span class="p-3">
                                <input id="category" type="radio" name="category" value="{{$category->id}}">
                                {{$category->name}}
                            </span>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label" for="name">Image</label>
                    @error('image')
                    <div class=" w-100 alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="file" name="image">
                </div>
                <div>
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>


@endsection
