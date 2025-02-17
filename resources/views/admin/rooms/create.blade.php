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

<form class="store-blogs" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Room Title</h5>
                            <p class="text-muted">Room Title Information refers to the data related to the group of the rooms.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Room Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter room title" required>
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
                            <p class="text-muted">Room Quantity refers to the number related to the number of rooms in group.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Room Quantity <span class="text-danger">*</span></label>
                                <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter number of rooms in group" required>
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
                            <p class="text-muted">Room Price refers to the number related to the price of the single room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="price" class="form-label">Room Price<span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter price of the single room" required>
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
                            <h5 class="mb-3 card-title">Room Description</h5>
                            <p class="text-muted">Room Description refers to the summary or excerpt of a room  that provides a brief overview of its content.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Room Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" placeholder="Enter room description" rows="5" class="myeditor form-control @error('description') is-invalid @enderror"></textarea>
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
                            <p class="text-muted">Room Allow Guest refers to the number related to allowd number of the guests in the single room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="allowd_guests" class="form-label">Room Allow Guest<span class="text-danger">*</span></label>
                                <input type="number" name="allowd_guests" id="allowd_guests" class="form-control @error('allowd_guests') is-invalid @enderror" placeholder="Enter the number of guest allowd in the single room" required>
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
                                <input type="number" name="size" id="size" class="form-control @error('size') is-invalid @enderror" placeholder="Enter the size of the single room in feets" required>
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
                            <p class="text-muted">Room Beds refers to quantity and the name of Bed of the single room.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label for="bed_quantity" class="form-label">Room Beds <span class="text-danger">*</span></label>
                                <div class="gap-2 d-flex">
                                    <input type="number" name="bed_quantity" id="bed_quantity" class="form-control @error('bed_quantity') is-invalid @enderror" placeholder="Quantity" required>
                                    <input type="text" name="bed_name" id="bed_name" class="form-control @error('bed_name') is-invalid @enderror" placeholder="Name of bed" required>
                                </div>
                                @error('bed_quantity')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                                @error('bed_name')
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
                                <label class="form-label">Select Bed Types <span class="text-danger">*</span></label>
                                <div class="flex-wrap gap-3">
                                    @if (isset($amenities) && count($amenities) > 0)
                                        @foreach ($amenities as $amenity)

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity->id }}">
                                            <label class="form-check-label" for="single_bed">{{ $amenity->name }}</label>
                                        </div>
                                        @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



{{--
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4">
                            <h5 class="mb-3 card-title">Blog Media</h5>
                            <p class="text-muted">Blog Media Information refers to the visual and multimedia element
                                associated with a blog post.</p>
                        </div>
                        <div class="col-xxl-8">
                            <div class="mb-3">
                                <label class="form-label">Blog Images <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control" required>
                                @error('image')
                                    <span class="form-error-message text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="gap-2 mb-3 hstack justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
    </div> --}}
</form>


<x-admin.footer />
