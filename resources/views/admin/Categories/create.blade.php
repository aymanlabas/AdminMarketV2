@extends('admin.body')
@section('contenu')


<div class="container-fluid">

    <!-- Page Heading -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Category</h6>
        </div>
        <div class="card-body">
            <form  action="{{route("categories.store")}}" method="POST">
                @csrf
                @method('post')
                <div class="mb-3">
                  <label for="namecategorie" class="form-label">Name of Category</label>
                  <input type="text" class="form-control" id="categoriename" name="name" aria-describedby="emailHelp">
                </div>
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
           
        </div>
    </div>

</div>
@endsection
