@extends('fontend_master')
@section('content')
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="material-icons" title="Home"></i></a>Home</li>
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
                        @foreach ($blog_all as $blog)
                            <div class="col-lg-4 col-md-6 col-xs-12" style="padding:15px 10px;">
                                <div class="article-thumb">
                                    <div class="img-holder">
                                        <a href="{{ route('SingleBlog', $blog->id) }}"><img src="{{ asset($blog->image) }}"
                                                alt="{{ $blog->meta_tag }}"></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class=""
                                            style="display: flex; justify-content: space-between; margin-top:10px">
                                            <span class="author"><i class="fas fa-user-circle"></i><span
                                                    style="margin-left: 10px">{{ $blog->autor_name }}</span></span>
                                            <span class="date" style="margin-right: 50px;"><i
                                                    class="far fa-clock"></i><span
                                                    style="margin-left: 10px">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                                </span></span>
                                        </div>
                                        <div class="intro-text"
                                            style="margin-top: 10px; font-weight: bold; margin-bottom: 10px">
                                            {{ $blog->short_description }}</div>
                                        <a href="{{ route('SingleBlog', $blog->slug) }}" class="btn btn-read">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
