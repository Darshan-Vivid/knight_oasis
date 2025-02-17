<x-admin.header :title="'Blog Listings'" />
<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" >
<div id="productList">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-4 card-title">Blog Listings</h5>
                    </div>
                    <div class="mb-4 search-box">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary add-btn">
                            <i class="align-baseline bi bi-plus-circle me-1"></i> Add Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="fixed-header" class="table align-middle table-bordered dt-responsive nowrap table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>IMAGE</th>
                                <th>TITLE</th>
                                <th>DESCRIPTION</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($blog))
                                @foreach ($blog as $b)
                                <tr>
                                    <td class="products">
                                        <div class="d-flex align-items-center">
                                            <div class="p-1 rounded avatar-xs bg-light me-2">
                                                <img src="{{ asset($b->image) }}" alt="{{ $b->title }}"
                                                    class="img-fluid d-block">
                                            </div>
                                            <div>
                                                <h6 class="mb-0"><a href="#"
                                                        class="text-reset products">{{ $b->title }}</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $b->title }}</td>
                                    <td>{{ strip_tags($b->description) }}</td>
                                    <td><div class="dropdown position-static">
                                        <button class="btn btn-subtle-secondary btn-sm btn-icon" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item edit-item-btn"
                                                    href="{{ route('blogs.edit', $b->id) }}"><i
                                                        class="align-middle ph-pencil me-1"></i> Edit</a></li>
                                            <a class="dropdown-item remove-item-btn" href="javascript:void(0);"
                                                data-delete-url="{{ route('blogs.destroy', $b->id) }}"
                                                onclick="setDeleteFormAction(this)">
                                                <i class="align-middle ph-trash me-1"></i> Remove
                                            </a>
                                        </ul>
                                    </div></td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="flex-grow-1">
                    </div>
                    <div class="flex-shrink-0">
                        <div class="flex-wrap gap-2 d-flex align-items-start">
                            <button class="btn btn-subtle-danger d-none" id="remove-actions"><i
                                    class="ri-delete-bin-2-line"></i></button>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle table-centered table-nowrap">
                            <thead class="table-active">
                                <tr>
                                    <th>
                                        
                                    </th>
                                    <th class="cursor-pointer sort" data-sort="products">Blogs</th>
                                    <th class="cursor-pointer sort" data-sort="products">Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($blog as $b)
                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td class="products">
                                            <div class="d-flex align-items-center">
                                                <div class="p-1 rounded avatar-xs bg-light me-2">
                                                    <img src="{{ asset($b->image) }}" alt="{{ $b->title }}"
                                                        class="img-fluid d-block">
                                                </div>
                                                <div>
                                                    <h6 class="mb-0"><a href="#"
                                                            class="text-reset products">{{ $b->title }}</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ strip_tags($b->description) }}</td>
                                        <td>
                                            <div class="dropdown position-static">
                                                <button class="btn btn-subtle-secondary btn-sm btn-icon" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn"
                                                            href="{{ route('blogs.edit', $b->id) }}"><i
                                                                class="align-middle ph-pencil me-1"></i> Edit</a></li>
                                                    <a class="dropdown-item remove-item-btn" href="javascript:void(0);"
                                                        data-delete-url="{{ route('blogs.destroy', $b->id) }}"
                                                        onclick="setDeleteFormAction(this)">
                                                        <i class="align-middle ph-trash me-1"></i> Remove
                                                    </a>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
                            <p class="mb-0 text-muted">We've searched all blog, We did not find any
                                blogs for you search.</p>
                        </div>
                    </div>
                    <div class="mt-3 row align-items-center">
                        <div class="col-sm">
                            
                        </div>
                        <div class="mt-3 col-sm-auto mt-sm-0">
                            <div class="gap-2 pagination-wrap hstack justify-content-center">
                                
                                <ul class="mb-0 pagination listjs-pagination"></ul>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- Delete Confirmation Modal -->
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
                        <p class="mx-3 mb-0 text-muted fs-lg">Are you sure you want to remove this blog category<b>permanently</b>?</p>
                    </div>
                </div>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="gap-2 mt-4 mb-2 d-flex justify-content-center">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn w-sm btn-danger">Yes!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- App js -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset("admin/js/app.js") }}"></script>
<script src="{{ asset("admin/js/pages/datatables.init.js") }}"></script>

<x-admin.footer />
