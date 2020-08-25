@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                @if(!empty($buynow))
                <form id="logout-form" action="{{ route('buy-now',$product->id) }}" method="POST" >
                    @csrf
                    <div class="card mb-5 p-5">
                        <h1> Buy "{{$product->name}}" Now  for {{number_format($product->price,2)}}</h1>
                    </div>

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <textarea  name="address" value="{{$product->id}}" placeholder="Address"></textarea>
                    <input type="submit" name="buynow" value="BUY NOW">
                </form>

                @else

                @if(!empty($product))
                <div class="col-sm-4">
                    <div class="card mb-5">
                        <div class="card-body">
                            <img src="https://picsum.photos/id/{{$product->id}}/200">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card mb-5">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text">Qty Available : {{$product->units}}</p>

                            @auth
                            @if($product->units > 0)
                            <a href="/buy-now/{{$product->id}}" class="btn btn-primary">Buy Product</a>
                            @endif
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
                @endif
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
