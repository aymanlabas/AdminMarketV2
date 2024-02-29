@extends('admin.body')
@section('contenu')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">

    <!-- Page Heading -->
  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Menus</h6>
        </div>
        <div class="card-body">
            <div class="container mt-5">
                <form action="{{ route('stockes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="menu" class="form-label">Menu</label>
                        <select class="form-select" id="category" name="menu_id" required>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ingredient" class="form-label">Ingredient Name</label>
                        <input type="text" class="form-control" id="ingredient" name="ingredient_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="threshold" class="form-label">Alert Threshold</label>
                        <input type="number" class="form-control" id="threshold" name="alert_threshold" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
           
        </div>
    </div>

</div>
@endsection