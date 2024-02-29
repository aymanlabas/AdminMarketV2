@extends('admin.body')
@section('title')
    Menus-liste
@endsection
@section('contenu')

<div class="container-fluid">

    <!-- Page Heading -->
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:
                    <form action="{{ route('invoices.search') }}" method="GET">
                        @csrf
                        <input type="text" name="query" placeholder="Search pages..."  class="form-control"> <button type="submit" class="btn btn-primary">Search</button>
                    </form>                
                </label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->order_id }}</td>
                                    <td>{{ $invoice->total_amount }}</td>
                                    <td>{{ $invoice->payment_status }}</td>
                                    <td>{{ $invoice->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table></div></div>
                    <div class="row"><div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div><div class="col-sm-12 col-md-7">
                    
                        {{ $invoices->links('component.pagination') }}
    
    
                    </div>
            </div>
        </div>
    
    </div>

@endsection