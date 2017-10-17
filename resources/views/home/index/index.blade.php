@extends('home.layouts.app')

@section('title', '首页')

@section('body')
    <div class="index clearfix">
        <div class="search">
            <a href="{{ route('home.search') }}" class="search-input"><input type="text" placeholder="搜索美食"/></a>
        </div>
        <div class="swiper-container index-bigpic clearfix">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic1.jpg') }}"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic2.jpg') }}"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic3.jpg') }}"/></a>
                </div>
            </div>
            <!-- 分页器 -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="nav-top clearfix">
            <a href="{{ route('home.business_list', ['id' => 1]) }}">早餐</a>
            <a href="{{ route('home.business_list', ['id' => 2]) }}">午餐</a>
            <a href="{{ route('home.business_list', ['id' => 3]) }}">晚餐</a>
            <a href="{{ route('home.business_list', ['id' => 4]) }}">宵夜</a>
        </div>
        <div style="cursor: pointer; list-style:none; padding:0; margin-top:10px; background:#fff;">
            <section style="font-family:inherit; font-size:inherit;font-style:inherit;font-weight:inherit; *zoom:1; overflow:auto;">
                <h1 style="padding:0; margin:0; font-size:100%; font-weight:normal; height:40px; border-bottom:1px solid #e7e7e7; color:#df1b19; font-size:16px; font-weight:bold; text-align:center; line-height:40px;">本站推荐</h1>
                <div style="*zoom:1; overflow:auto; border-bottom:1px solid #e7e7e7;">
                    <div style="*zoom:1; overflow:auto;">
                        @foreach($recommend_today as $commodity)
                            <a href="{{ route('home.business', ['id' => $commodity['user_id']]) }}" style="text-decoration:none; color:#333; outline:none; float:left; width:98%; padding:1%; border-bottom:1px solid #e7e7e7;">
                                <img src="{{ $commodity['image'] }}" style="float:left; width:30%; height:81px; border:1px solid #e7e7e7;"/>
                                <h2 style="margin:0; font-size:100%; font-weight:normal; overflow:hidden; float:left; width:66%; padding:5px 0 5px 2%; line-height:20px;">{{ $commodity['name'] }}</h2>
                                <h3 style="padding:0; margin:0; font-size:100%; font-weight:normal; overflow:hidden; float:left; width:54%; padding-left:25px; background:url('{{ asset('/style/home/icon/icon_jifen.png') }}') no-repeat 7px center; background-size:15px; color:#df1b19; font-size:18px; font-weight:bold;">{{ $commodity['price'] }}</h3>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
        <div class="copyright">
            <h1>© {{ config('site.title') }} 版权所有</h1>
            <h2>李行提供技术支持</h2>
        </div>
        <div class="nav clearfix">
            @include('home.layouts.quick')
        </div>
    <em class="return-top">顶部</em>
    <script type="text/javascript">
        var mySwiper = new Swiper ('.swiper-container', {
            direction: 'horizontal',
            loop: true,
            autoplay: 3000,
            autoplayDisableOnInteraction : false,
            // 分页器
            pagination: '.swiper-pagination',
        });
        var mySwiperNews = new Swiper ('.swiper-containerNews', {
            direction: 'vertical',
            loop: true,
            autoplay: 3000,
            autoplayDisableOnInteraction : false,
        });
    </script>
@endsection