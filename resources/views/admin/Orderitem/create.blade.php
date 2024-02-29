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
                <form action="{{ route('orderitems.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="order_id" class="form-label">Order ID</label>
                        <select class="form-select" id="category" name="order_id" required>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }}</option>
                            @endforeach
                        </select>                    </div>
                    <div class="mb-3">
                        <label for="menu_id" class="form-label">Menu ID</label>
                        <select class="form-select" id="category" name="menu_id" required>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->id }}--{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
           
        </div>
    </div>

</div>
@endsection
