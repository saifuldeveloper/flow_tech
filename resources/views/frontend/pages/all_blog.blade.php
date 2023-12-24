@extends('fontend_master')
@section('content')
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="material-icons" title="Home"></i></a>Home</li>
                <li><a href="">Blog</a></li>
            </ul>
        </div>
        </div>
    </section>
    <section class="bg-bt-gray p-tb-15">
        <div class="container">
            <div class="row">
                <div id="content" class="col-sm-12">
                    <div class="row">
                        @foreach ($blog_all as $blog )
                        <div class="col-lg-4 col-md-6 col-xs-12" style="padding:15px 0;">
                            <div class="article-thumb">
                                <div class="img-holder">
                                    <a href="{{ route('SingleBlog',$blog->id)}}"><img
                                            src="{{asset($blog->image)}}"
                                            alt="{{$blog->meta_tag}}" width="370"
                                            height="370"></a>
                                </div>
                                <div class="blog-info">
                                    <div class="" style="display: flex; justify-content: space-between; margin-top:10px">
                                        <span class="author"><i class="fas fa-user-circle"></i><span style="margin-left: 10px">{{$blog->autor_name}}</span></span>
                                        <span class="date" style="margin-right: 50px;"><i class="far fa-clock"></i><span style="margin-left: 10px">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                        </span></span>
                                    </div>
                                    <div class="intro-text" style="margin-top: 10px; font-weight: bold; margin-bottom: 10px">{{$blog->short_description}}</div>
                                    <a href="{{ route('SingleBlog',$blog->id)}}" class="btn btn-read">Read
                                        more ...</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-lg-4 col-md-6 col-xs-12" style="padding:15px 0;">
                            <div class="article-thumb">
                                <div class="img-holder">
                                    <a href=""><img
                                            src="https://www.startech.com.bd/image/cache/catalog/blog/2023/geyser-buying-guide/geyser-buying-guide-thumb-370x370.jpg"
                                            alt="Geyser Buying Guide: Choose the Perfect Water Heater" width="370"
                                            height="370"></a>
                                </div>
                                <div class="blog-info">
                                    <div class="" style="display: flex; justify-content: space-between; margin-top:10px">
                                        <span class="author"><i class="fas fa-user-circle"></i><span style="margin-left: 10px">Star Tech
                                                Team</span></span>
                                        <span class="date" style="margin-right: 50px;"><i class="fas fa-clock"></i><span style="margin-left: 10px">30 Nov
                                                2023</span></span>
                                    </div>
                                    <div class="intro-text" style="margin-top: 10px; font-weight: bold; margin-bottom: 10px">A complete guide to choosing the best geyser and water heater in
                                        Bangladesh.</div>
                                    <a href="" class="btn btn-read">Read
                                        more ...</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12" style="padding:15px 0;">
                            <div class="article-thumb">
                                <div class="img-holder">
                                    <a href=""><img
                                            src="https://www.startech.com.bd/image/cache/catalog/blog/2023/geyser-buying-guide/geyser-buying-guide-thumb-370x370.jpg"
                                            alt="Geyser Buying Guide: Choose the Perfect Water Heater" width="370"
                                            height="370"></a>
                                </div>
                                <div class="blog-info">
                                    <div class="" style="display: flex; justify-content: space-between; margin-top:10px">
                                        <span class="author"><i class="fas fa-user-circle"></i><span style="margin-left: 10px">Star Tech
                                                Team</span></span>
                                        <span class="date" style="margin-right: 50px;"><i class="fas fa-clock"></i><span style="margin-left: 10px">30 Nov
                                                2023</span></span>
                                    </div>
                                    <div class="intro-text" style="margin-top: 10px; font-weight: bold; margin-bottom: 10px">A complete guide to choosing the best geyser and water heater in
                                        Bangladesh.</div>
                                    <a href="" class="btn btn-read">Read
                                        more ...</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12" style="padding:15px 0;">
                            <div class="article-thumb">
                                <div class="img-holder">
                                    <a href=""><img
                                            src="https://www.startech.com.bd/image/cache/catalog/blog/2023/geyser-buying-guide/geyser-buying-guide-thumb-370x370.jpg"
                                            alt="Geyser Buying Guide: Choose the Perfect Water Heater" width="370"
                                            height="370"></a>
                                </div>
                                <div class="blog-info">
                                    <div class="" style="display: flex; justify-content: space-between; margin-top:10px">
                                        <span class="author"><i class="fas fa-user-circle"></i><span style="margin-left: 10px">Star Tech
                                                Team</span></span>
                                        <span class="date" style="margin-right: 50px;"><i class="fas fa-clock"></i><span style="margin-left: 10px">30 Nov
                                                2023</span></span>
                                    </div>
                                    <div class="intro-text" style="margin-top: 10px; font-weight: bold; margin-bottom: 10px">A complete guide to choosing the best geyser and water heater in
                                        Bangladesh.</div>
                                    <a href="" class="btn btn-read">Read
                                        more ...</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12" style="padding:15px 0;">
                            <div class="article-thumb">
                                <div class="img-holder">
                                    <a href=""><img
                                            src="https://www.startech.com.bd/image/cache/catalog/blog/2023/geyser-buying-guide/geyser-buying-guide-thumb-370x370.jpg"
                                            alt="Geyser Buying Guide: Choose the Perfect Water Heater" width="370"
                                            height="370"></a>
                                </div>
                                <div class="blog-info">
                                    <div class="" style="display: flex; justify-content: space-between; margin-top:10px">
                                        <span class="author"><i class="fas fa-user-circle"></i><span style="margin-left: 10px">Star Tech
                                                Team</span></span>
                                        <span class="date" style="margin-right: 50px;"><i class="fas fa-clock"></i><span style="margin-left: 10px">30 Nov
                                                2023</span></span>
                                    </div>
                                    <div class="intro-text" style="margin-top: 10px; font-weight: bold; margin-bottom: 10px">A complete guide to choosing the best geyser and water heater in
                                        Bangladesh.</div>
                                    <a href="" class="btn btn-read">Read
                                        more ...</a>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    {{-- <div class="bottom-bar">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <ul class="pagination">
                                    <li><span class="disabled">PREV</span></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=2">2</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=3">3</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=4">4</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=5">5</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=6">6</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=7">7</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=8">8</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=9">9</a></li>
                                    <li><a href="https://www.startech.com.bd/blog?page=2">NEXT</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 rs-none text-right">
                                <p>Showing 1 to 6 of 77 (13 Pages)</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
