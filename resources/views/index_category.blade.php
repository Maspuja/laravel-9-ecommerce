@extends('layouts.header')

@section('content')

@if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

<a href="{{ route('create_category') }}" class="btn btn-primary m-2"> + Add category</a>
  
    <table class="table table-responsive table-bordered">
        <tr>
            <th>No</th>
            <th>Category Name
            <th>Created at</th>
            <th>Update at</th>
            <th>Action</th>
        </tr>
        
        <?php $i=1; ?>
         @foreach ($categorys as $category)
        <tr>
            <td>{{ $i++; }}</td>    
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at}}</td>
            <td>
                <form action="{{ route('edit_category', $category) }}" method="get" >
                    @csrf
                    <button type="submit" class="badge rounded-pill badge-light text-dark" ><i class="fas fa-edit"></i> Edit </button>
                </form>
                
                <form action="{{ route('delete_category', $category) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge rounded-pill badge-dark"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </td>
            
        </tr>
         @endforeach
            
    </table> 
@endsection