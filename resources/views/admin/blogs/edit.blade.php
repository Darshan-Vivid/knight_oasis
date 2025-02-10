<x-admin.header :title="'Edit Blog'" />
<h4>Edit Blog</h4>
<form class="store-blogs" action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="card-title mb-3">Blog Title</h5>
                            <p class="text-muted">
                                Blog Title Information refers to the data related to the titles
                                of blog posts.
                            </p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Blog Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('name', $blog->title) }}" />
                                @error('title')
                                    <span class="form-error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="card-title mb-3">Blog Description</h5>
                            <p class="text-muted">
                                Blog Description Information refers to the summary or excerpt of
                                a blog post that provides a brief overview of its content.
                            </p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Blog Description <span class="text-danger">*</span></label>
                                <textarea name="description"
                                    class="myeditor @error('description') is-invalid @enderror form-control"
                                    id="description" cols="3" rows="5">
{{ old('description', $blog->description) }}</textarea>
                                @error('description')
                                    <span class="form-error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="card-title mb-3">Blog Media</h5>
                            <p class="text-muted">
                                Blog Media Information refers to the visual and multimedia
                                element associated with a blog post.
                            </p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Blog Images <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="media-upload main-image-upload form-control @error('image') is-invalid @enderror" />
                                @error('image')
                                    <span class="form-error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border rounded">
        <div class="d-flex flex-wrap gap-2 p-2">
            <div class="flex-shrink-0 me-3">
                <div class="avatar-sm bg-light rounded p-2">
                    @if ($blog->image)
                        <img data-dz-thumbnail="" class="img-fluid rounded d-block" src="{{ asset($blog->image) }}">
                    @endif
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="pt-1">
                    <h5 class="fs-md mb-1" data-dz-name=""></h5>
                    <p class="fs-sm text-muted mb-0" data-dz-size="">
                        <strong></strong>
                    </p>
                    <strong class="error text-danger" data-dz-errormessage=""></strong>
                </div>
            </div>
            <div class="flex-shrink-0 ms-3">
                <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
            </div>
        </div>
    </div>
    <div class="hstack gap-2 justify-content-end mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: "#description",
            height: 300,
            menubar: false,
            plugins: "advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help",
            toolbar: "undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
            content_style: "body { font-family: Arial, sans-serif; font-size: 14px; }",
        });
    });
</script>
<script src="{{ URL::asset('admin/libs/list.js/list.min.js') }}"></script>
<script src="{{ URL::asset('admin/libs/list.pagination.js/list.pagination.min.js') }}"></script>
<script src="{{ URL::asset('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('admin/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('admin/js/pages/ecommerce-product-list.init.js') }}"></script>
<script src="{{ URL::asset('admin/js/app.js') }}"></script>
<x-admin.footer />
