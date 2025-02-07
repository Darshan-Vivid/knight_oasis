<x-admin.header :title="'Edit Blogs'"/>
{{-- <x-header :title="'Edit Blogs'" /> --}}
<!-- Titlebar -->
<div class="row">
    <div class="col-lg-12">
        <form class="update-shop-form" action="{{ route('blogs.update', $blog->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="add-listing">
                <!-- Section -->
                <div class="add-listing-section">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                    </div>
                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-12">
                            <h5>Title</h5>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('name', $blog->title) }}">
                            @error('title')
                                <span class="form-error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">
                    <!-- Description -->
                    <div class="form">
                        <h5>Description</h5>
                        <textarea name="description"
                            class="myeditor @error('description') is-invalid @enderror form-control" id="description"
                            cols="3" rows="5">{{ old('description', $blog->description) }}</textarea>
                        @error('description')
                            <span class="form-error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-picture"></i>Image</h3>
                    </div>
                    <div class="submit-section btcfile">
                        <label class="upload-box">
                            <input type="file" name="image" id="image" accept="image/*"
                                class="media-upload main-image-upload form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="form-error-message">{{ $message }}</span>
                            @enderror
                            <div class="icon-upload">
                                <span class="plus-icon"></span>
                                <p> Click here or drop files to upload</p>
                            </div>
                        </label>
                        <div class="mt-2 image-preview">
                            @if ($blog->image)
                                <img class="imageThumb" src="{{ asset($blog->image) }}">
                            @endif
                        </div>
                    </div>

                </div>
                <!-- Section / End -->
                <button type="submit" class="button preview" id="store-shop">Update <i
                        class="fa fa-arrow-circle-right"></i></button>
            </div>
        </form>
    </div>
<x-admin.footer />
