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
                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf
                    @method('post')

                    {{-- Order ID --}}
                    <div class="mb-3">
                        <label for="order_id" class="form-label">Order ID</label>
                        <select class="form-select" id="category" name="order_id" required>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }}</option>
                            @endforeach
                        </select>                         </div>

                    {{-- Total Amount --}}
                    <div class="mb-3">
                        <label for="total_amount" class="form-label">Total Amount</label>
                        <input type="text" class="form-control" id="total_amount" name="total_amount" required>
                    </div>

                    {{-- Payment Status --}}
                    <div class="mb-3">
                        <label for="payment_status" class="form-label">Payment Status</label>
                        <select class="form-select" id="payment_status" name="payment_status" required>
                            <option value="unpaid">Unpaid</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary">Create Invoice</button>
                </form>
            </div>
           
        </div>
    </div>

</div>
@endsection

           
