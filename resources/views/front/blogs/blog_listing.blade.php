<x-header :title="' Blog Listng '" />
<main>
    <!-- banner section start-->
    <section class="ko-banner ko-singlepost-banner"
        style="background-image: url('{{ asset('images/cart-banner.webp') }}');">
        <div class="ko-container">
            <div class="ko-banner-content">
                <h2>Transforming Common Spaces in Modern Hotels</h2>
                <nav>
                    <ol class="ko-banner-list">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('view.blog') }}">Tips & Tricks</a></li>
                        <li class="active">Transforming Common Spaces in Modern Hotels</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- banner section end-->

    <!-- singlePost section start -->
    <section class="ko-singlePost-section">
        <div class="ko-container">
            <div class="ko-row">
                <div class="ko-col-8">
                    <div class="ko-singlepost-graphic">
                        <img src="{{ asset($blog->image) }}" alt="post-img" />
                    </div>
                    <div class="ko-singlepost-content">
                        <div class="ko-auth-details">
                            <ul class="ko-singlepost-list">

                                {{-- <li>almaris-admin</li> --}}
                                <li><span>•</span>{{ $blog->created_at->format('F d, Y') }}</li>
                                <li><a href="#">Tips & Tricks</a>,<a href="#">Uncategorized</a></li>


                            </ul>
                        </div>
                        <div class="ko-blog-ctn-wrap">
                            <p>{!! $blog->description !!}</p>
                        </div>
                        {{-- <form action="#">
                            <h3>Leave a Reply</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <div class="ko-input-field">
                                <input type="text" placeholder="Name*" required>
                            </div>
                            <div class="ko-input-field">
                                <input type="email" placeholder="Email*" required>
                            </div>
                            <div class="ko-input-field">
                                <textarea cols="45" rows="8" maxlength="65525" placeholder="Comment"></textarea>
                            </div>
                            <button class="ko-btn" type="submit">Post Comment</button>
                        </form> --}}
                    </div>
                </div>
                <div class="ko-col-4">
                    <aside class="ko-recentpost">
                        <div class="ko-recentpost-cards-wrap">
                            <h3>Recent Blogs</h3>
                            @foreach ($recentBlogs as $recentBlog)
                                <div class="ko-recentpost-card">
                                    <div class="ko-recentpost-graphic">
                                        <a href="{{ route('blog.list', $recentBlog->slug) }}">
                                            <img src="{{ asset($recentBlog->image) }}" alt="{{ $recentBlog->title }}">
                                        </a>
                                    </div>
                                    <div class="ko-recentpost-content">
                                        <a
                                            href="{{ route('blog.list', $recentBlog->slug) }}">{{ $recentBlog->title }}</a>
                                        <p>{{ $recentBlog->created_at->format('F d, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="ko-post-tags">
                            <h3>Popular Tags</h3>
                            <ul class="ko-post-tags-list">
                                <li><a href="#">Application</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Internet</a></li>
                                <li><a href="#">Music</a></li>
                            </ul>
                        </div> --}}
                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- singlePost section end -->

</main>
<x-footer />
