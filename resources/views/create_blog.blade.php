@extends('layouts.header')

@section('content')


<div class="container col-md-12">
    <div class="card">
        <div class="card-header text-center">
            <h1 class="text-uppercase">Form input Blog</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-dismissible fade show" role="alert" data-mdb-color="danger">
                        <strong>{{ $error }}</strong> 
                            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                    </div>   
                @endforeach        
            @endif 
        </div>
        
        <div class="card-body col-md-12">
        <form action="{{ route('store_blog') }}" method="post" enctype="multipart/form-data">
            @csrf

            
            <select class="select" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" >{{ $category->id }}{{ $category->name }}</option>
                @endforeach  
            </select>
            <label class="form-label select-label">Blog Category</label>

            <div class="form-outline mt-3 mb-3">
                <input type="text" name="name" class="form-control" />
                <label class="form-label" for="form1Example1">Blog name</label>
            </div>

            <div class="form-outline mb-3">
                <textarea class="form-control" placeholder="Description " name="description" id="editor" rows="3" maxlength="250"></textarea>
                
            </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
          
            <div class="mb-3">
                <label class="form-label" for="customFile">image</label>
                <input type="file" class="form-control" name="image" id="customFile" />
            </div>
            <button type="submit" class="btn btn-primary">Save Blog</button>
        </form>
        </div>
    </div>
</div>

    
@endsection