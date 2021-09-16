@extends('layouts.app')
@section('title')
    Add New Product
@endsection

@section('content')

<div class="container">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form action="{{ route('category.create') }}" method="post">
            @csrf

            <div>
                <label for="name">Category</label>

                <input id="name" type="text" name="name" required autofocus value="{{ old('name')}}">
            </div>
            <div>
                <button>Create Category</button>
            </div>
        </form>
    </div>
</div>

    <div>

    </div>

@endsection
