<x-admin.header :title="'Create Media'"/>
{{-- <x-header :title="'Create Media'" /> --}}

<h3>Add Media</h3>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center gy-3">
                    <!--end col-->
                    <div class="col-lg-auto text-end">
                        <div class="d-flex gap-2">
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCourse"><i class="bi bi-person-plus align-baseline me-1"></i> Add Media</button>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end row-->
</div>
<!--end col-->

<div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger p-3">
                <h5 class="modal-title text-white" id="addCourseLabel">Add Media</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>

            <form class="tablelist-form" method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data" novalidate autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                    <div class="mb-3">
                        <label class="form-label">Media Image<span class="text-danger">*</span></label>
                        <div class="dropzone course-dropzone border border-1 border-dashed text-center" style="min-height: 80px;">
                            <div class="fallback">
                                <input type="file" name="media" id="media" multiple="multiple" id="fileInput">
                            </div>
                            <div class="dz-message needsclick my-3">
                                <label for="fileInput" class="mb-3" style="cursor: pointer;">
                                    <i class="bi bi-cloud-download fs-1"></i>
                                </label>
                                <h5 class="fs-md mb-0">Drop image here or click to upload.</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="add-btn">Add Media</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- modal-content -->
    </div>
</div>

<div class="row row-cols-xl-5 row-cols-sm-2 row-cols-1">
    @foreach($mediaFiles as $media)
        <div class="col">
            <div class="card overflow-hidden">
                <div class="card-body bg-info-subtle text-center learning-widgets d-flex align-items-center justify-content-center">
                    <img src="{{ asset($media->url) }}" alt="{{ $media->name }}" class="avatar-lg">
                </div>
                <div class="card-body border-top hstack align-items-center gap-2">
                    <div class="dropdown flex-shrink-0">
                        <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ asset($media->url) }}" target="_blank"><i class="bi bi-eye align-baseline me-1"></i> View</a></li>
                            <li>
                                <form action="{{ route('media.destroy', $media->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this media?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i class="bi bi-trash3 align-baseline me-1"></i> Delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
    @endforeach
</div>

    <x-admin.footer />
