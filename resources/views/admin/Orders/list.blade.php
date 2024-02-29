@extends('admin.body')
@section('title')
    Order-liste
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
                    <form action="{{ route('order.search') }}" method="GET">
                        @csrf
                        <input type="text" name="query" placeholder="Search pages..."  class="form-control"> <button type="submit" class="btn btn-primary">Search</button>
                    </form>                
                </label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order Reference</th>
                                <th>Status</th>
                                <th>Special Requests</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_reference }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->special_requests }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-warning text-ligth" href="{{ route('orders.edit' , $order->id) }}">Edite</a>
                                        <form action="{{ route('orders.delete' , $order->id) }}" >
                                            @method('delete')
                                           <button class="btn btn-danger text-ligth" type="submit">Delete</button>

                                        </form>
                                    
                                    </td>
                                </tr>
                            @endforeach
                        </table></div></div>
                        <div class="row"><div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                        </div><div class="col-sm-12 col-md-7">
                        
                            {{ $orders->links('component.pagination') }}
        
        
                        </div>
                </div>
            </div>
        
        </div>

@endsection