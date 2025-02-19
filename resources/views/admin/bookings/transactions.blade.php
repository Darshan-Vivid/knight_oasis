<x-admin.header :title="'Transactions'" />
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" >

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    <h5 class="mb-4 card-title">Transactions</h5>
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
                            <th>TRANSACTION ID</th>
                            <th>AMOUNT</th>
                            <th>METHOD</th>
                            <th>STATUS</th>
                            <th>Create Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($transactions))
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction_id}}</td>
                                <td>{{ $transaction->amount}}</td>
                                <td>{{ $transaction->method }}</td>
                                <td>
                                    @if($transaction->status == 1)
                                        <span class="badge bg-info-subtle text-info">PAID</span>
                                    @elseif ($transaction->status == 0)
                                        <span class="badge bg-danger">CANCLED</span>
                                    @endif
                                </td>
                                <td>{{ $transaction->created_at }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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