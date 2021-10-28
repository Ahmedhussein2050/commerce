@extends('layouts.app')
@section('title')
    Full View
@endsection
@section('content')

    <div class="row p-5">

        @if($product->image == null)
            <div class="text-center">
                <small>{{$post->created_at}}</small>
                <b>by
                    <a href="{{ route('users.posts', $post->user) }}" class="text-decoration-none text-success">{{$post->user->name}}</a>
                </b>
                <p class="w-50 m-auto" style="line-height: 1.6; margin-top: 16px !important; margin-bottom: 16px !important; ">
                    {{$post->body}}
                </p>
                <a href="{{ route('posts') }}" class="nav-link text-secondary">back</a>
                {{--                @if(auth()->user()->id == $post->user_id)--}}
                {{--                    <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-success">edit</a>--}}
                {{--                    <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger">delete</a>--}}
                {{--                @endif--}}
            </div>
        @endif
        @if($product->image != null)
            <div class="col-lg-6">
                <div class="my-3">
                    <img
                        class="img img-fluid mb-4"
                        style="width: 600px; display: block !important;"
                        src="{{asset($product->image)}}"
                        alt="not found"
                    >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-3">
                    <small>{{$product->created_at}}</small>
                    <b>by {{$product->user->username}}</b>
                    <p style="line-height: 1.6; margin-top: 16px !important; margin-bottom: 16px !important; ">
                        {{$product->desc}}
                    </p>
                    <p style="line-height: 1.6; margin-top: 16px !important; margin-bottom: 16px !important; ">
                        <b>{{$product->price}} EGP</b>
                    </p>
                    <a href="{{url('/home')}}" class="mx-2 text-decoration-none text-secondary"><b>Back</b></a>
                    @if(isset(auth()->user()->id) && auth()->user()->id == $product->user_id)
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

        @endif
    </div>
@endsection
