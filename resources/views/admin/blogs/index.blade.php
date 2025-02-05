<x-header :title="'Blog Listings'" />
<!-- Titlebar -->
<div class="row">
    <!-- Listings -->
    <div class="col-lg-12 col-md-12">
        <div class="dashboard-list-box margin-top-0">
            <h4>Blog Listings</h4>
            <div class="add-button">
                <a href="{{ route('blogs.create') }}" class="button btc-add-button">Add Blog</a>
            </div>
            @foreach ($blog as $blogs)
                <div class="list-box-listing">
                    <div class="list-box-listing-img">
                        <a href="javascript:void(0)">
                            <img src="{{ asset($blogs->image) }}" alt="Blog Image">
                        </a>
                    </div>

                    <div class="list-box-listing-content">
                        <div class="inner">
                            <h3><a href="javascript:void(0)">{{ $blogs->title }}</a></h3>
                        </div>
                    </div>

                    <div class="list-box-listing-content">
                        <div class="inner">
                            <span>{{ Illuminate\Support\Str::limit(strip_tags($blogs->description), 25, '...') }}</span>
                        </div>
                    </div>
                </div>
                <div class="buttons-to-right">
                    <a href="{{ route('blogs.edit', $blogs->id) }}" class="button gray"><i class="sl sl-icon-note"></i>
                        Edit</a>
                    <form class="delete-form" action="{{ route('blogs.destroy', $blogs->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <!-- Hidden submit button -->
                    </form>
                    <a href="javascript:void(0)" class="button gray delete-link"><i class="sl sl-icon-close"></i> Delete</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<x-footer />
