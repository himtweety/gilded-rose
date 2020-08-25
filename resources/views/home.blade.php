@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @if(!empty($products))
                @foreach ($products as $key => $product)
                <div class="col-sm-3">
                    <div class="card mb-5">
                        <div class="card-body">
                            <img src="https://picsum.photos/id/{{$product->id}}/200">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <a href="/products/{{$product->id}}" class="btn btn-primary">View Item</a>
                            @auth
                            <a href="/buy-now/{{$product->id}}" class="btn btn-primary">Buy Product</a>
                            @else
                            <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login To Buy') }}</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
