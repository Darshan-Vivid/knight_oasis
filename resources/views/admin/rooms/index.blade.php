<x-admin.header :title="'All Rooms'" />

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" >

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    <h5 class="mb-4 card-title">All Rooms</h5>
                </div>
                <div class="mb-4 search-box">
                    <a href="{{ route('rooms.create') }}" class="btn btn-primary add-btn">
                        <i class="align-baseline bi bi-plus-circle me-1"></i> Add Rooms
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
                <table id="fixed-header" class="table align-middle table-bordered dt-responsive nowrap table-striped"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            {{-- <th scope="col">Description</th>
                            <th scope="col">Allowed Guests</th>
                            <th scope="col">Size</th>
                            <th scope="col">Beds</th>
                            <th scope="col">Amenities</th>
                            <th scope="col">Services</th>
                            <th scope="col">Featured Image</th>
                            <th scope="col">Gallery Images</th> --}}
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->quantity }}</td>
                                <td>{{ $room->price }}</td>
                                {{-- <td>{{ $room->description }}</td>
                                <td>{{ $room->allowd_guests }}</td>
                                <td>{{ $room->size }}</td>
                                <td>
                                    @php
                                    $beds = json_decode($room->beds, true); // Decoding the JSON string
                                    @endphp
                                    @if($beds)
                                    {{ $beds['quentity'] }}
                                    Name: {{ $beds['name'] }}
                                    @endif
                                </td>
                                <td>
                                    @php
                                    $amenities = json_decode($room->amenities); // Decoding the JSON array
                                    @endphp
                                    @if($amenities)
                                    @foreach($amenities as $amenity)
                                    Amenity ID: {{ $amenity }}<br>
                                    @endforeach
                                    @else
                                    No amenities
                                    @endif
                                </td>
                                <td>
                                    @php
                                    $services = json_decode($room->service); // Decoding the JSON array
                                    @endphp
                                    @if($services)
                                    @foreach($services as $service)
                                    Service ID: {{ $service }}<br>
                                    @endforeach
                                    @else
                                    No services
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ $room->feature_img }}" alt="Featured Image" style="max-width: 100px;">
                                </td>
                                <td>
                                    @php
                                    $galleryImages = json_decode($room->gallery_img); // Decoding the JSON array
                                    @endphp
                                    @if($galleryImages)
                                    @foreach($galleryImages as $image)
                                    <img src="{{ $image }}" alt="Gallery Image" style="max-width: 100px;"><br>
                                    @endforeach
                                    @else
                                    No gallery images
                                    @endif
                                </td> --}}
                                <td>{{ $room->created_at }}</td>
                                <td>{{ $room->updated_at }}</td>
                                <td>
                                    <div class="dropdown position-static">
                                        <button class="btn btn-subtle-secondary btn-sm btn-icon" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('rooms.edit', $room->id) }}" class="dropdown-item edit-item-btn" ><i class="align-middle ph-pencil me-1"></i>Edit</a></li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn"
                                                    data-delete-url="{{ route('rooms.destroy', $room->id) }}"
                                                    onclick="setDeleteFormAction(this)"><i class="align-middle ph-trash me-1">
                                                </i> Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                        <p class="mx-3 mb-0 text-muted fs-lg">Are you sure you want to remove this service <b>permanently</b> ?</p>
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
