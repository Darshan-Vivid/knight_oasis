<x-header :title="' Blogs '" />
<main>
    <!-- banner section -->
    <section class="ko-banner" style="background-image: url('{{ asset('images/cart-banner.webp') }}');">
        <div class="ko-container">
            <div class="ko-banner-content">
                <h2>Blogs</h2>
                <p>Stay updated with the latest happenings at our hotel! From exciting events and special offers to exclusive insights and behind-the-scenes stories.</p>
                <nav>
                    <ol class="ko-banner-list">
                      <li><a href="/">Home</a></li>
                      <li class="active">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- blog post section -->
    <section class="ko-blog-post">
        <div class="ko-container">
            <div class="ko-blog-post-cards-wrap">
                @foreach ($blogs as $blog)
                <div class="ko-blog-post-card">
                    <div class="ko-blog-post-inner-card">
                        <div class="ko-blog-post-img">
                            <a href="{{ route('blog.list', $blog->slug) }}">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" />
                            </a>
                            <a class="ko-catagory" href="{{ route('blog.list', $blog->slug) }}">@foreach ($blog->categories as $category)
                                {{ $category->name }}@if(!$loop->last), @endif
                            @endforeach</a>
                        </div>
                        <div class="ko-blog-post-content">
                            <a href="{{ route('blog.list', $blog->slug) }}">{{ $blog->title }}</a>
                            <ul class="ko-blog-post-list">
                                <p>{{ $blog->created_at->format('F d, Y') }}</p>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
<x-footer />