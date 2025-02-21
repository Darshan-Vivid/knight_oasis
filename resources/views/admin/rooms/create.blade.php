<x-admin.header :title="'Add Room'" />

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    <h3 class="mb-4 card-title">Add Room</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="store-blogs" action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Room Title</h5>
                            <p class="text-muted">Room Title Information refers to the data related to the group of the
                                rooms.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Room Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Enter room title" value="{{ old('title') }}" required>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Room Quantity</h5>
                            <p class="text-muted">Room Quantity refers to the number related to the number of rooms in
                                group.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Room Quantity <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="quantity" id="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    placeholder="Enter number of rooms in group" min="0" value="{{ old('quantity') }}" required>
                                @error('quantity')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Room Price</h5>
                            <p class="text-muted">Room Price refers to the number related to the price of the single
                                room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="price" class="form-label">Room Price<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter price of the single room" min="0" value="{{ old('price') }}" required>
                                    <span class="input-group-text">.00</span>
                                </div>
                                @error('price')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Room Offer Price</h5>
                            <p class="text-muted">Room Offer Price refers to the number related to the offring price of the single
                                room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for=offer_price class="form-label">Room Offer Price<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name=offer_price id=offer_price class="form-control @error('offer_price') is-invalid @enderror" placeholder="Enter offer price of the single room" min="0" value="{{ old('offer_price') }}" required>
                                    <span class="input-group-text">.00</span>
                                </div>
                                @error('offer_price')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Room Description</h5>
                            <p class="text-muted">Room Description refers to the summary or excerpt of a room that
                                provides a brief overview of its content.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Room Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" placeholder="Enter room description"
                                    rows="5"
                                    class="myeditor form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Room Allow Guest</h5>
                            <p class="text-muted">Room Allow Guest refers to the number related to allowd number of the
                                guests in the single room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="allowd_guests" class="form-label">Room Allow Guest<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="allowd_guests" id="allowd_guests"
                                    class="form-control @error('allowd_guests') is-invalid @enderror"
                                    placeholder="Enter the number of guest allowd in the single room" min="0" value="{{ old('allowd_guests') }}" required>
                                @error('allowd_guests')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Room Size</h5>
                            <p class="text-muted">Room Size refers to the size of the single room in feets .</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="size" class="form-label">Room Size<span class="text-danger">*</span></label>
                                <input type="number" name="size" id="size"
                                    class="form-control @error('size') is-invalid @enderror"
                                    placeholder="Enter the size of the single room in feets" min="0" value="{{ old('size') }}" required>
                                @error('size')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Room Beds</h5>
                            <p class="text-muted">Room Beds refers to quantity and the name of Bed of the single room.
                            </p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="bed_quantity" class="form-label">Room Beds <span
                                        class="text-danger">*</span></label>
                                <div class="gap-2 d-flex">
                                    <input type="number" name="bed_quantity" id="bed_quantity"
                                        class="form-control @error('bed_quantity') is-invalid @enderror"
                                        placeholder="Quantity" min="0" value="{{ old('bed_quantity') }}" required>
                                    <input type="text" name="bed_name" id="bed_name"
                                        class="form-control @error('bed_name') is-invalid @enderror"
                                        placeholder="Name of bed" value="{{ old('bed_name') }}" required>
                                </div>
                                @error('bed_quantity')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                                @error('bed_name')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bed_price" class="form-label">Bed Price/Bed<span class="text-danger">*</span></label>
                                <div class="gap-2">
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" name="bed_price" id="bed_price" class="form-control @error('bed_price') is-invalid @enderror" placeholder="Enter price for extra beds" min="0" value="{{ old('bed_price') }}" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                @error('bed_price')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Room Amenities</h5>
                            <p class="text-muted">Room Amenities refers to the facilities you provide to the room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Select Amenities <span class="text-danger">*</span></label>
                                <div class="flex-wrap gap-3">
                                    @forelse ($amenities as $amenity)
                                        @if($amenity->status == 1)
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="amenities[]"
                                                    value="{{ $amenity->id }}"
                                                    {{ in_array($amenity->id, old('amenities', [])) ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="amenities">{{ $amenity->name }}</label>
                                            </div>
                                        @endif
                                    @empty
                                        <div class="form-check"> No amenities found </div>
                                    @endforelse
                                </div>
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
                            <h5 class="mb-3 card-title">Room Services</h5>
                            <p class="text-muted">Room Services refers to the facilities you provide with the room price.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Select Services <span class="text-danger">*</span></label>
                                <div class="flex-wrap gap-3">
                                    @forelse ($services as $service)
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="services[]"
                                                value="{{ $service->id }}"
                                                {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="services">{{ $service->name }}</label>
                                        </div>
                                    @empty
                                        <div class="form-check"> No services found </div>
                                    @endforelse
                                </div>
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
                            <h5 class="mb-3 card-title">Room Features</h5>
                            <p class="text-muted">Room Features refers to the description of features related to the room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Room Features</label>
                                <textarea name="features" id="features" placeholder="Enter room features" rows="5"
                                    class="myeditor form-control @error('features') is-invalid @enderror">{{ old('features') }}</textarea>
                                @error('features')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
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
                            <h5 class="mb-3 card-title">Featured Image</h5>
                            <p class="text-muted">Featured Image refers to the visual multimedia element
                                associated with a room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Featured Image <span class="text-danger">*</span></label>
                                <input type="file" name="featured_image" id="featured_image" class="form-control" required>
                                @error('featured_image')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Gallery Images</h5>
                            <p class="text-muted">Gallery Images refers images to showcase more visuals of the room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Gallery Images</label>
                                <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" multiple>
                                @error('gallery_images')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Tour Video</h5>
                            <p class="text-muted">Tour Video refersto video for showcase more visuals of the room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Tour Video</label>
                                <input type="file" name="tour_video" id="tour_video" class="form-control" accept=".mp4,.avi,.mkv,.flv,.mov">
                                @error('tour_video')
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
        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: "#features",
            height: 300,
            menubar: false,
            plugins: "advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help",
            toolbar: "undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
            content_style: "body { font-family: Arial, sans-serif; font-size: 14px; }",
        });
    });
</script>

<x-admin.footer />
