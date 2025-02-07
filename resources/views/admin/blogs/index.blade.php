<x-admin.header :title="'Blog Listings'"/>
{{-- <x-header :title="'Blog Listings'" /> --}}
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
                    <form action="{{ route('blogs.destroy', $blogs->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this media?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item"><i class="bi bi-trash3 align-baseline me-1"></i> Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
<x-admin.footer />
