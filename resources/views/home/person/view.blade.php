@inject('index', 'App\Services\Home\IndexService')

@extends('home.layouts.app')

@section('title', '个人中心')

@section('body')
<div class="pc">
    <div class="info">
        <img src="{{ Auth::user()['avatar'] }}" class="portrait" />
        <span class="name" style="left:0">{{ Auth::user()['name'] }}</span>
        <a href="{{ route('home.person_update') }}" class="more"></a>
    </div>
    <div class="title">我的订单</div>
    <ul class="order-nav">
        <li class="on">全部</li>
        <li>待接单</li>
        <li>配送中</li>
        <li>已完成</li>
    </ul>
    <div class="content" id="content">
        <div class="con" style="display:block" >
            <ul class="all-list">
                @foreach($orders_all as $order)
                    <li class="clearfix">
                        <div class="status">{{ config('site.order_status')[$order['status']] }}</div>
                        <a href="order-details.html" class="info">
                            <h4>平台专送<span>总计:<em class="combined">{{ $order['price'] }}</em></span></h4>
                            <h1 class="store-name">{{ $order->business->name }}</h1>
                                <ul class="clearfix">
                                    @foreach($order->orderDetail as $list_detail)
                                    <li style="margin-bottom:1em;">
                                        <span>{{ $list_detail->commodity->name }}</span>
                                        <em>x <b>{{ $list_detail['num'] }}</b></em>
                                        <strong>￥<b>{{ $list_detail['price'] }}</b></strong>
                                    </li>
                                    @endforeach
                                </ul>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- <h5>上拉加载更多</h5> -->
        </div>
        <div class="con">
            <ul class="send-list">
                @foreach($orders_1 as $order)
                    <li class="clearfix">
                        <div class="status">{{ config('site.order_status')[$order['status']] }}</div>
                        <a href="order-details.html" class="info">
                            <h4>平台专送<span>总计:<em class="combined">{{ $order['price'] }}</em></span></h4>
                            <h1 class="store-name">{{ $order->business->name }}</h1>
                            <ul class="clearfix">
                                @foreach($order->orderDetail as $list_detail)
                                    <li style="margin-bottom:1em;">
                                        <span>{{ $list_detail->commodity->name }}</span>
                                        <em>x <b>{{ $list_detail['num'] }}</b></em>
                                        <strong>￥<b>{{ $list_detail['price'] }}</b></strong>
                                    </li>
                                @endforeach
                            </ul>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- <h5>上拉加载更多</h5> -->
        </div>
        <div class="con">
            <ul class="accept">
                @foreach($orders_2 as $order)
                    <li class="clearfix">
                        <div class="status">{{ config('site.order_status')[$order['status']] }}</div>
                        <a href="order-details.html" class="info">
                            <h4>平台专送<span>总计:<em class="combined">{{ $order['price'] }}</em></span></h4>
                            <h1 class="store-name">{{ $order->business->name }}</h1>
                            <ul class="clearfix">
                                @foreach($order->orderDetail as $list_detail)
                                    <li style="margin-bottom:1em;">
                                        <span>{{ $list_detail->commodity->name }}</span>
                                        <em>x <b>{{ $list_detail['num'] }}</b></em>
                                        <strong>￥<b>{{ $list_detail['price'] }}</b></strong>
                                    </li>
                                @endforeach
                            </ul>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- <h5>上拉加载更多</h5> -->
        </div>
        <div class="con">
            <ul class="complete">
                @foreach($orders_4 as $order)
                    <li class="clearfix">
                        <div class="status">{{ config('site.order_status')[$order['status']] }}</div>
                        <a href="#" class="info">
                            <h4>平台专送<span>总计:<em class="combined">{{ $order['price'] }}</em></span></h4>
                            <h1 class="store-name">{{ $order->business->name }}</h1>
                            <ul class="clearfix">
                                @foreach($order->orderDetail as $list_detail)
                                    <li style="margin-bottom:1em;">
                                        <span>{{ $list_detail->commodity->name }}</span>
                                        <em>x <b>{{ $list_detail['num'] }}</b></em>
                                        <strong>￥<b>{{ $list_detail['price'] }}</b></strong>
                                    </li>
                                @endforeach
                            </ul>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- <h5>上拉加载更多</h5> -->
        </div>
    </div>
    <div class="nav clearfix">
        @include('home.layouts.quick')
    </div>
</div>
<script type="text/javascript">
    $(".order-nav li").click(function() {
        $(this).addClass('on').siblings().removeClass('on');
        $(".pc .content .con").hide().eq($(".order-nav li").index(this)).show();
    });
</script>
@endsection