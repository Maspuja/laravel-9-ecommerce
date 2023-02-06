@extends('layouts.header')

@section('content')


<div class="container col-md-5 mb-5 mt-3">
    <div class="card">
        <div class="card-header">
            <h1>Form category</h1>
            @if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-dismissible fade show" role="alert" data-mdb-color="danger">
        <strong>{{ $error }}</strong> 
            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>   
@endforeach        
@endif 
        </div>
        <div class="card-body col-md-10">
        <form action="{{ route('store_category') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-outline mb-3">
                <input type="text" name="name" class="form-control" />
                <label class="form-label" for="form1Example1">Category name</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
    </div>
</div>
    
    
@endsection