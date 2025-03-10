<x-header :title="getSetting('page_blogs_meta_title')" />

<main>
    <!-- banner section -->
    <section class="ko-banner" style="background-image: url('{{ publicPath('images/cart-banner.webp') }}');">
        <div class="ko-container">
            <div class="ko-banner-content">
                <h2>{{ getSetting('page_blogs_heading') }}</h2>
                {!! getSetting('page_blogs_description') !!}
                <nav>
                    <ol class="ko-banner-list">
                        <li><a href="{{ route('view.home') }}">{{ getSetting('page_home_meta_title') }}</a></li>
                      <li class="active">{{ getSetting('page_blogs_meta_title') }}</li>
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
                                <img src="{{ publicPath(publicPath($blog->image)) }}" alt="{{ $blog->title }}" />
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