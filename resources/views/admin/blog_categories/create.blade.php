<x-admin.header :title="'Create Blogs Categories'" />
<h4>Add Blog Categories</h4>
<form class="store-blogs" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Blog Category Title</h5>
                            <p class="text-muted">Blog Title Information refers to the data related to the titles of
                                blog posts.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Blog Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter blog title" required>
                                @error('title')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gap-2 mb-3 hstack justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
    </div>
</form>

<x-admin.footer />

