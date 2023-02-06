@extends('layouts.header')

@section('content')

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
                <form action="{{ route('edit_category', $category) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-xs btn-warning"> Edit Category </button>
                </form>
            </td>
            
        </tr>
         @endforeach
            
    </table> 
@endsection