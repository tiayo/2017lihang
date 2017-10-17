@extends('home.layouts.app')

@section('title', '商铺页面')

@section('style')
    <style>
        .store .header-name {
            color: white;
            background: rgba(0,0,0,0.6);
            font-size: 18px;
        }
    </style>
@endsection

@section('body')
    <div class="store clearfix">
        <div class="header">
            <img src="{{ $business['avatar'] }}" class="store-logo"/>
        </div>
        <div class="header-name">{{ $business['name'] }}</div>
        <ul class="tab clearfix">
            @foreach($lists as $key => $list)
                <li @if ($key == 0) class="on" @endif>{{ $list['name'] }}</li>
            @endforeach
        </ul>
        <ul class="tabcon">
            @foreach($lists as $key => $list)
            <li class="@if ($key == 0) on2 @endif clearfix">
                @foreach($list->commodity as $commodity)
                <div class="tabcon-list">
                    <img src="{{ $commodity['image'] }}" class="food-img"/>
                    <span class="food-name">{{ $commodity['name'] }}</span>
                    <span class="food-price">￥<em class="price" data-price="{{ $commodity['price'] }}">{{ $commodity['price'] }}</em></span>
                    <span class="food-num-choose">
                        <em class="reduce-num"></em>
                        <input data-id="{{ $commodity['id'] }}" type="text" class="food-num" readonly="readonly" value="0" />
                        <em class="add-num"></em>
                    </span>
                </div>
                @endforeach
            </li>
            @endforeach
        </ul>
        <div class="total">
            <span class="total-price">总价：￥<em>0</em></span>
            <button class="clearing" type="button">去结算</button>
        </div>
    </div>
    <div class="nav clearfix">
        @include('home.layouts.quick')
    </div>
    <form class="hidden" method="post" action="{{ route('home.order_add', ['business_id' => $business['id']]) }}" id="submit_form">
        {{ csrf_field() }}
    </form>
    <script type="text/javascript">
        //tab切换
        $(".store .tab li").click(function() {
            $(this).addClass('on').siblings().removeClass('on');
            $(".store .tabcon li").removeClass('on2').eq($(".store .tab li").index(this)).addClass('on2');
        });

        //加按钮
        $(".store .tabcon li .tabcon-list .food-num-choose .add-num").on("click", function() {
            var total_price = $(".total-price em");
            var price = parseFloat($(this).parent().parent().find('.price').attr('data-price'));
            var old_price = parseFloat(total_price.html());
            var old_num = parseFloat($(this).parent().find('.food-num').val());

            $(this).parent().find('.food-num').val(old_num + 1);
            total_price.html(old_price + price);
        });

        //减按钮
        $(".store .tabcon li .tabcon-list .food-num-choose .reduce-num").on("click", function() {
            var total_price = $(".total-price em");
            var price = parseFloat($(this).parent().parent().find('.price').attr('data-price'));
            var old_price = parseFloat(total_price.html());
            var old_num = parseFloat($(this).parent().find('.food-num').val());

            $(this).parent().find('.food-num').val(old_num - 1);
            total_price.html(old_price - price);
        });

        //提交按钮
        $('.total button').click(function () {
            $('.food-num').each(function () {
                //获取数量
                var num = $(this).val();

                if (num > 0) {
                    var commodity_id = $(this).attr('data-id');
                    var html = "<input type='hidden' name='commodity[]' value='"+ commodity_id +"_"+ num +"'>";
                    $('#submit_form').append(html);
                }
            });

            $('#submit_form').submit();
        });
    </script>
@endsection