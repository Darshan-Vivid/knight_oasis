<x-admin.header :title="'Manage Media'" />
<h3>Add Media</h3>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-auto text-end">
                        <div class="d-flex gap-2">
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCourse"><i
                                    class="bi bi-person-plus align-baseline me-1"></i> Add Media</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger p-3">
                <h5 class="modal-title text-white" id="addCourseLabel">Add Media</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form class="tablelist-form" method="POST" action="{{ route('media.store') }}"
                enctype="multipart/form-data" novalidate autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                    <div class="mb-3">
                        <label class="form-label">Media Image<span class="text-danger">*</span></label>
                        <div class="dropzone course-dropzone border border-1 border-dashed text-center"
                            style="min-height: 80px;">
                            <div class="fallback">
                                {{-- <input type="file" name="media" id="media" multiple="multiple" id="fileInput"> --}}
                            </div>
                            <div class="dz-message needsclick my-3">
                                <label for="media" class="mb-3" style="cursor: pointer;">
                                    <i class="bi bi-cloud-download fs-1"></i>
                                </label>
                                <h5 class="fs-md mb-0">Drop image here or click to upload.</h5>
                            </div>
                            <input type="file" name="media" id="media" multiple="multiple" class="d-none">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary" id="add-btn">Add Media</button>
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                                class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row row-cols-xl-5 row-cols-sm-2 row-cols-1">
    @foreach ($mediaFiles as $media)
        <div class="col">
            <div class="card overflow-hidden">
                <div
                    class="card-body bg-info-subtle text-center learning-widgets d-flex align-items-center justify-content-center">
                    <img src="{{ asset($media->url) }}" alt="{{ $media->name }}" class="avatar-lg">
                </div>
                <div class="card-body border-top hstack align-items-center gap-2">
                    <div class="dropdown flex-shrink-0">
                        <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ asset($media->url) }}" target="_blank"><i
                                        class="bi bi-eye align-baseline me-1"></i> View</a></li>
                            <li>
                                <button type="button" class="dropdown-item delete-media-btn"
                                    data-delete-url="{{ route('media.destroy', $media->id) }}">
                                    <i class="bi bi-trash3 align-baseline me-1"></i> Delete
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div id="deleteRecordModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-md-5">
                <div class="text-center">
                    <div class="text-danger">
                        <i class="bi bi-trash display-4"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="mb-2">Are you sure?</h3>
                        <p class="text-muted fs-lg mx-3 mb-0">Are you sure you want to remove this record?</p>
                    </div>
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn w-sm btn-danger">Yes, Delete It!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".delete-media-btn").on("click", function() {
            let deleteUrl = $(this).data("delete-url");
            $("#deleteForm").attr("action", deleteUrl);
            $("#deleteRecordModal").modal("show");
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
