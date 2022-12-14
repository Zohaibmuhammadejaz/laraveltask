@extends('category.layout1')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($categorys as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->categoryname }}</td>
        <td>{{ $category->categorydetails }}</td>
        <td>
            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">View</a>

                <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Update</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $categorys->links() !!}

@endsection