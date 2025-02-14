<x-admin.header :title="'Blog Listings'" />

<!-- Titlebar -->
{{-- <div class="row">
    <!-- Listings -->
    <div class="col-lg-12 col-md-12">
        <div class="dashboard-list-box margin-top-0">
            <h4>Blog Listings</h4>
            <div class="add-button">
                <a href="{{ route('blogs.create') }}" class="button btc-add-button">Add Blog</a>
            </div>
            @foreach ($blog as $blogs)
                <div class="list-box-listing">
                    <div class="list-box-listing-img">
                        <a href="javascript:void(0)">
                            <img src="{{ asset($blogs->image) }}" alt="Blog Image">
                        </a>
                    </div>

                    <div class="list-box-listing-content">
                        <div class="inner">
                            <h3><a href="javascript:void(0)">{{ $blogs->title }}</a></h3>
                        </div>
                    </div>

                    <div class="list-box-listing-content">
                        <div class="inner">
                            <span>{{ Illuminate\Support\Str::limit(strip_tags($blogs->description), 25, '...') }}</span>
                        </div>
                    </div>
                </div>
                <div class="buttons-to-right">
                    <a href="{{ route('blogs.edit', $blogs->id) }}" class="button gray"><i class="sl sl-icon-note"></i>
                        Edit</a>
                    <form class="delete-form" action="{{ route('blogs.destroy', $blogs->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <!-- Hidden submit button -->
                    </form>
                    <form action="{{ route('blogs.destroy', $blogs->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this media?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item"><i class="align-baseline bi bi-trash3 me-1"></i> Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}

<div id="productList">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-4 card-title">Blog Listings</h5>
                    </div>
                    <div class="mb-4 search-box">
                        <input type="text" class=" form-control search" placeholder="Search Blogs">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mb-0 card-title">Blogs <span
                                class="badge bg-dark-subtle text-dark ms-1">{{ $total_blogs }}</span></h5>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="flex-wrap gap-2 d-flex align-items-start">
                            <button class="btn btn-subtle-danger d-none" id="remove-actions"><i
                                    class="ri-delete-bin-2-line"></i></button>
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary add-btn">
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
                                @foreach ($blog as $b)
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
                            <div class="text-center text-muted text-sm-start">
                                Showing <span class="fw-semibold">{{ $blog->lastItem() }}</span>
                                of
                                <span class="fw-semibold">{{ $total_blogs }}</span> Results
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

<x-admin.footer />
