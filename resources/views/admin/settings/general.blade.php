<x-admin.header :title="'Site Settings'" />

<h3>General Settings</h3>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    <h5 class="mb-0 card-title">Settings</h5>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex-wrap gap-2 d-flex align-items-start">
                        <button class="btn btn-subtle-danger d-none" id="remove-actions"><i
                                class="ri-delete-bin-2-line"></i></button>
                        <a href="" class="btn btn-primary add-btn">
                            <i class="align-baseline bi bi-arrow-clockwise me-1"></i> Update
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table mb-0 table-nowrap table-striped-columns" id="ko_settings_table" >
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Type</th>
                                <th scope="col">Value</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ( $settings as $setting)
                            <tr>
                                <td><?= $setting->slug ?></td>
                                <td><?= $setting->value ?></td>
                                <td><button type="button" class="btn btn-sm btn-light" id="ko_settings_table_{{ $setting->type }}" >Edit</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<x-admin.footer />
