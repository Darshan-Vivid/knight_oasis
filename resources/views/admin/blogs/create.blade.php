<x-header :title="'Create Blogs'" />
<div class="blogs">
    <div class="container">
        <h1>Create Blogs</h1>
        <form class="store-blogs" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter blog title"
                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="description" name="description" id="description" placeholder="Enter blog description"
                    cols="3" rows="5" class="myeditor form-control @error('description') is-invalid @enderror"
                    value="{{ old('description') }}"></textarea>
                @error('description')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                    value="{{ old('image') }}">
                @error('image')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<x-footer />
