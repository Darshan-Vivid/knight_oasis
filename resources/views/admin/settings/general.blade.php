<x-admin.header :title="'Site Settings'" />

<h3>General Settings</h3>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    <h5 class="mb-0 card-title">Blogs</h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex-wrap gap-2 d-flex align-items-start">
                        <button class="btn btn-subtle-danger d-none" id="remove-actions"
                            ><i class="ri-delete-bin-2-line"></i></button>
                        <a href="" class="btn btn-primary add-btn">
                            <i class="align-baseline bi bi-plus-circle me-1"></i> Add Blog
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle table-centered table-nowrap">
                        <thead class="table-active">
                            <tr>
                                <th>
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="option"
                                            id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div> --}}
                                </th>
                                <th class="cursor-pointer sort" data-sort="products">Blogs</th>
                                <th class="cursor-pointer sort" data-sort="products">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                                <tr>
                                    <td>
                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child">
                                            <label class="form-check-label"></label>
                                        </div> --}}
                                    </td>
                                    <td class="products">
                                        <div class="d-flex align-items-center">
                                            <div class="p-1 rounded avatar-xs bg-light me-2">
                                                <img src="" alt=""
                                                    class="img-fluid d-block">
                                            </div>
                                            <div>
                                                <h6 class="mb-0"><a href="#"
                                                        class="text-reset products">{{-- --}}</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{--  --}}</td>
                                    <td>
                                        <div class="dropdown position-static">
                                            <button class="btn btn-subtle-secondary btn-sm btn-icon" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="noresult" style="display: none">
                    <div class="py-4 text-center">
                        <div class="mx-auto mb-4 avatar-md">
                            <div class="avatar-title bg-light text-primary rounded-circle fs-4xl">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                        <h5 class="mt-2">Sorry! No Result Found</h5>
                        <p class="mb-0 text-muted">We've searched more than 150+ products We did not find any
                            products for you search.</p>
                    </div>
                </div>
                <div class="mt-3 row align-items-center">
                    <div class="col-sm">
                        <div class="text-center text-muted text-sm-start">
                            Showing <span class="fw-semibold">a1</span>
                            of
                            <span class="fw-semibold">a0</span> Results
                        </div>
                    </div>
                    <div class="mt-3 col-sm-auto mt-sm-0">
                        <div class="gap-2 pagination-wrap hstack justify-content-center">
                            <a class="page-item pagination-prev disabled" href="#">
                                <i class="align-middle mdi mdi-chevron-left"></i>
                            </a>
                            <ul class="mb-0 pagination listjs-pagination"></ul>
                            <a class="page-item pagination-next" href="#">
                                <i class="align-middle mdi mdi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<x-admin.footer />
