@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @auth
                                    <form action="{{ route('like.store', $post->id) }}" method ="post">
                                        @csrf
                                        <button type="submit" class="border-0 bg-transparent">
                                            <span>{{ $post->liked_users_count }}</span>
                                            <i
                                                class = "fa{{ auth()->user()->likedPosts->contains($post->id)? 's': 'r' }} fa-heart"></i>
                                        </button>
                                    </form>
                                @endauth
                                @guest
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class = "far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class = " mx-auto" style="margin-top:-80px;">
                        {{ $posts->withQueryString()->links() }}
                    </div>
                </div>

            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach ($randomPosts as $randomPost)
                                <div class="col-md-6 fetured-post blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/' . $randomPost->preview_image) }}" alt="blog post">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="blog-post-category">{{ $randomPost->category->title }}</p>
                                        @auth
                                            <form action="{{ route('like.store', $randomPost->id) }}" method ="post">
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <span>{{ $randomPost->liked_users_count }}</span>
                                                    <i
                                                        class = "fa{{ auth()->user()->likedPosts->contains($randomPost->id)? 's': 'r' }} fa-heart"></i>
                                                </button>
                                            </form>
                                        @endauth
                                        @guest
                                            <div>
                                                <span>{{ $randomPost->liked_users_count }}</span>
                                                <i class = "far fa-heart"></i>
                                            </div>
                                        @endguest
                                    </div>
                                    <a href="{{ route('post.show', $randomPost->id) }} class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $randomPost->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title">Post Lists</h5>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <figure class="carousel-item active">
                                        <img src="{{ asset('assets/images/blog_widget_carousel.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="{{ route('post.show', $post->id) }}">Front becomes an official
                                                Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                    <figure class="carousel-item">
                                        <img src="{{ asset('assets/images/blog_7.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="{{ route('post.show', $post->id) }}">Front becomes an official
                                                Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/images/blog_5.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="{{ route('post.show', $post->id) }}">Front becomes an official
                                                Instagram Marketing Partner</a>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Popular posts</h5>
                        <ul class="post-list">
                            @foreach ($popularPosts as $popularPost)
                                <li class="post">
                                    <a href="{{ route('post.show', $popularPost->id) }}" class="post-permalink media">
                                        <img src="{{ asset('storage/' . $popularPost->preview_image) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $popularPost->title }}
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories" class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
