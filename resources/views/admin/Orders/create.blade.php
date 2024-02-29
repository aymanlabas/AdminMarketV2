@extends('admin.body')
@section('contenu')


<div class="container-fluid">

    <!-- Page Heading -->
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Menus</h6>
        </div>
        <div class="card-body">
            <div class="container mt-5">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customer" class="form-label">Customer</label>
                        <select class="form-select" id="customer" name="customer_id">
                            @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reference" class="form-label">Order Reference</label>
                        <input type="text" class="form-control" id="reference" name="order_reference" >
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" selected>Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="requests" class="form-label">Special Requests</label>
                        <textarea class="form-control" id="requests" name="special_requests" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
           
        </div>
    </div>

</div>
@endsection