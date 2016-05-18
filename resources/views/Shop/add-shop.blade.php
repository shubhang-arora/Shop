@extends('app')

@section('content')
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Latest Products</h3>
        </header>
        @foreach($shops as $key=>$shop)
        <div class="col-m-4 col-sm-6 col-xs-12 product simpleCart_shelfItem text-center">
            <div id="box">
                <a href="{{action('ShopController@show',$shop->id)}}"><img src="{{asset('images/shop-image.png')}}" alt="{{$shop->shop_name}}" /></a>
                <div class="mask">
                    <a href="{{action('ShopController@show',$shop->id)}}">Quick View</a>
                </div>
                <a class="product_name" href="{{action('ShopController@show',$shop->id)}}">{{$shop->shop_name}}</a>
                <p><a class="item_add" href="#"><i></i> <span class="item_price">Owner : {{$shop->user_name}}</span></a></p>
                <br><br>
                <a href="#!"><i class="glyphicon glyphicon-ok text-success add-remove add" id="{{$shop->id}}" aria-hidden="true" style="font-size: larger"></i>
                &nbsp;
                <i class="glyphicon glyphicon-remove text-danger add-remove remove" id="{{$shop->id}}" aria-hidden="true" style="font-size: larger"></i></a>
            </div>
        </div>
            @if(($key+1)%3==0)
                <div class="clearfix"></div>
            @endif
        @endforeach
        <div class="clearfix"></div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/addShop.js')}}"></script>
@endsection

@section('head')
    <title>Add Shop - Businessway</title>
@endsection