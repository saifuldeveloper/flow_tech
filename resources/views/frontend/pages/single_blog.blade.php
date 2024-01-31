@extends('fontend_master')
@section('meta_title'){{ $blog_catch->meta_title }}@stop
@section('meta_description'){{ $blog_catch->meta_description }}@stop
@section('meta_keywords'){{ $blog_catch->keyword }}@stop
@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $blog_catch->meta_title }}">
    <meta itemprop="description" content="{{ $blog_catch->meta_description }}">
    <meta name="keywords" content="{{ $blog_catch->meta_tag }}" />
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $blog_catch->meta_title }}" />
    <meta property="og:description" content="{{ $blog_catch->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection
@section('content')


    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="material-icons" title="Home"></i>Home</a></li>
                <li><a href="{{ route('allblog') }}">Blog</a></li>
                <li><a href="">{{ $blog_catch->short_description }}</a></li>
            </ul>
        </div>
    </section>
    <section class="bg-bt-gray p-tb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12" itemscope itemtype="">
                    <div id="content" class="blog-left">
                        <div itemprop="image" itemscope itemtype="">
                            <img class="main-img" src="{{ asset($blog_catch->image) }}"
                                alt="Geyser Buying Guide: Choose the Perfect Water Heater" width="100%">
                        </div>
                        <div class="article-title m-tb-15">
                            <h1 itemprop="headline">{{ $blog_catch->short_description }}</h1>
                        </div>
                        <div class=""
                            style="display: flex; justify-content: space-between; margin-top:10px; font-size:20px; margin-bottom: 10px">
                            <span class="author"><i class="fas fa-user-circle"></i><span
                                    style="margin-left: 10px">{{ $blog_catch->autor_name }}</span></span>
                            <span class="date" style="margin-right: 50px;"><i class="far fa-clock"></i><span
                                    style="margin-left: 10px">{{ \Carbon\Carbon::parse($blog_catch->created_at)->format('d M Y') }}</span></span>
                        </div>
                        <div class="share-on" style="margin-bottom: 20px">
                            @php
                                $currentUrl = url()->current();
                            @endphp
                            <span class="share">Share On : </span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}&display=popup"><span
                                    class="icon-sprite share-ico fb-dark" data-type="facebook"></span></a>
                            <a
                                href="https://www.pinterest.com/pin/create/button/?url={{ $currentUrl }}&media=SourceImageUrl&display=popup"><span
                                    class="icon-sprite share-ico pinterest-dark" data-type="pinterest"></span></a>

                        </div>
                        <div class="article-description" itemprop="articleBody">
                            {!! $blog_catch->long_description !!}


                        </div>

                    </div>
                </div>
                @php
                    $blog_user_id = $blog_catch->id;
                    $review = DB::table('blogreviews')
                        ->where('blog_id', $blog_user_id)
                        ->get();
                @endphp
                <div class="col-lg-12 col-md-12" itemscope itemtype="">
                    <div id="content" class="blog-left">
                        <div class="blog-comments m-tb-15" >
                            <div class="comments blog-left">
                                <h2 >Comments</h2>
                                @if ($review)
                                    <div id="no-comment">

                                        <div class="col-md-12">

                                            @foreach ($review as $row)
                                                <div class="" style="margin:0 5px">
                                                    <div class="card" style=" background-color: rgb(255, 254, 254)">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Name:{{ $row->name }}</h5>
                                                            <p class="card-text">{{ $row->message }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @else
                                    <div id="no-comment">
                                        <p>There are no comments for this Article.</p>
                                    </div>
                                @endif

                            </div>
                            <form id="form-comment" action="{{ Route('store.blog.comments') }}" method="POST">
                                @csrf
                                <h2>Write a comment</h2>
                                <div class="row">
                                    <input type="hidden" name="blog_id" value="{{ $blog_catch->id }}">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <input type="text" name="name" value="" id="input-name" class="form-control"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <input type="text" name="email" value="" id="input-email" class="form-control"
                                            placeholder="Your Email">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <textarea name="text" id="input-text" name="message" class="form-control" cols="30" rows="10"
                                            placeholder="Your Comment"></textarea>
                                    </div>
                                </div>
                                @if (Auth::user())
                                    <div class="buttons clearfix">
                                        <button type="submit" id="button-comment" data-loading-text="Loading..."
                                            class="btn submit-btn">Submit</button>
                                    </div>

                                    {{-- <a href="{{ route('review', ['id' => $product->id]) }}" class="btn st-outline">Write a Review</a> --}}
                                @else
                                    <a href="{{ route('login') }}" class="btn submit-btn">Submit</a>
                                @endif


                            </form>
                        </div>

                    </div>
                </div>

            </div>

    </section>

@section('metaschema')
    <meta name="schema-markup" content="{{ $blog_catch->schema_markup }}" />
@endsection
@endsection
