@extends('layouts.header')

@section('content')
    <div class="container col-md-6 mt-3">

        <h1 class="card card-header py-1 mb-4 text-center text-uppercase">Change Password</h1>
        
    
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-dismissible fade show" role="alert" data-mdb-color="danger">
                    <strong>{{ $error }}</strong> 
                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>   
            @endforeach        
        @endif

        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    <form action="{{ route('change_password') }}" method="post">
        @csrf        
          
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form1Example2" class="form-control" />
              <label class="form-label" for="form1Example2">New Password</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password_confirmation" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Confirm Password</label>
              </div>
          
            
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
          </form>
        
</div
@endsection