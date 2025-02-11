<x-header :title="' Blogs '" />
<main>
    <!-- banner section -->
    <section class="ko-banner" style="background-image: url('assets/images/cart-banner.webp');">
        <div class="ko-container">
            <div class="ko-banner-content">
                <h2>News</h2>
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
                            <a href="/single-blog.html"><img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" /></a>
                            <a class="ko-catagory" href="#">Tips & Tricks, Uncategorized</a>
                        </div>
                        <div class="ko-blog-post-content">
                            <a href="/single-blog.html">{{ $blog->title }}</a>
                            <p>{{ strip_tags($blog->description) }}</p>
                            <ul class="ko-blog-post-list">
                                {{-- <li>almaris-admin</li> --}}
                                <li>12 September, 2024</li>
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