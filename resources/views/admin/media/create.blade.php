<x-admin.header :title="'Manage Media'" />
<h3>Add Media</h3>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-auto text-end">
                        <div class="gap-2 d-flex">
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCourse"><i
                                    class="align-baseline bi bi-person-plus me-1"></i> Add Media</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="border-0 modal-content">
            <div class="p-3 modal-header bg-danger">
                <h5 class="text-white modal-title" id="addCourseLabel">Add Media</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form class="tablelist-form" method="POST" action="{{ route('media.store') }}"
                enctype="multipart/form-data" novalidate autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div id="alert-error-msg" class="py-2 d-none alert alert-danger"></div>
                    <div class="mb-3">
                        <label class="form-label">Media Image<span class="text-danger">*</span></label>
                        <div class="text-center border border-dashed dropzone course-dropzone border-1"
                            style="min-height: 80px;">
                            <div class="fallback">
                                {{-- <input type="file" name="media" id="media" multiple="multiple" id="fileInput"> --}}
                            </div>
                            <div class="my-3 dz-message needsclick">
                                <label for="media" class="mb-3" style="cursor: pointer;">
                                    <i class="bi bi-cloud-download fs-1"></i>
                                </label>
                                <h5 class="mb-0 fs-md">Drop image here or click to upload.</h5>
                            </div>
                            <input type="file" name="media" id="media" multiple="multiple" class="d-none">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="gap-2 hstack justify-content-end">
                        <button type="submit" class="btn btn-primary" id="add-btn">Add Media</button>
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                                class="align-baseline bi bi-x-lg me-1"></i> Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row row-cols-xl-5 row-cols-sm-2 row-cols-1">
    @foreach ($mediaFiles as $media)
        <div class="col">
            <div class="overflow-hidden card">
                <div
                    class="text-center card-body bg-info-subtle learning-widgets d-flex align-items-center justify-content-center">
                    <img src="{{ asset($media->url) }}" alt="{{ $media->name }}" class="avatar-lg">
                </div>
                <div class="gap-2 card-body border-top hstack align-items-center">
                    <div class="flex-shrink-0 dropdown">
                        <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ asset($media->url) }}" target="_blank"><i
                                        class="align-baseline bi bi-eye me-1"></i> View</a></li>
                            <li>
                                <button type="button" class="dropdown-item delete-media-btn"
                                    data-delete-url="{{ route('media.destroy', $media->id) }}">
                                    <i class="align-baseline bi bi-trash3 me-1"></i> Delete
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
                        <p class="mx-3 mb-0 text-muted fs-lg">Are you sure you want to remove this record?</p>
                    </div>
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="gap-2 mt-4 mb-2 d-flex justify-content-center">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn w-sm btn-danger">Yes, Delete It!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".delete-media-btn").on("click", function() {
            let deleteUrl = $(this).data("delete-url");
            $("#deleteForm").attr("action", deleteUrl);
            $("#deleteRecordModal").modal("show");
        });
    });
</script>
<x-admin.footer />
