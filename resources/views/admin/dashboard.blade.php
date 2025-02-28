<x-admin.header :title="'Dashboard'" />

<div class="row">
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-primary-subtle text-primary fs-3xl rounded p-3">
                        <img src="{{ asset('assets/images/total-b.png') }}" class="w-100" />
                    </div>
                </div>
                <h4>0</h4>
                <p class="text-muted mb-4">Total Bookings</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar" style="width: 100%"></div>
            </div>
        </div>
    </div>

    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded p-3">
                        <img src="{{ asset('assets/images/total-r.png') }}" class="w-100" />
                    </div>
                </div>
                <h4>$<span>0</span></h4>
                <p class="text-muted mb-4">Total Revenue</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-secondary" style="width: 100%"></div>
            </div>
        </div>
    </div>

    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded p-3">
                        <img src="{{ asset('assets/images/monthly-b.png') }}" class="w-100" />
                    </div>
                </div>
                <h4>0</h4>
                <p class="text-muted mb-4">Last Month Bookings</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>

    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-success-subtle text-success fs-3xl rounded p-3">
                        <img src="{{ asset('assets/images/total-r.png') }}" class="w-100" />
                    </div>
                </div>
                <h4>0</h4>
                <p class="text-muted mb-4">Last Month Revenue</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-success" style="width: 100%"></div>
            </div>
        </div>
    </div>

</div>

<x-admin.footer />