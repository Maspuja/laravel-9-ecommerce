@extends('layouts.header')

@section('content')
    <div class="container col-md-6">

        <h1 class="card card-header py-1 mb-4 text-center text-uppercase">Profile</h1>
    
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-dismissible fade show" role="alert" data-mdb-color="danger">
                    <strong>{{ $error }}</strong> 
                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>   
            @endforeach        
        @endif
    <form action="{{ route('edit_profile') }}" method="post">
        @csrf
            <!-- Email -->
            <div class="form-outline mb-4">
              <input type="email" value="{{ $user->email}}" readonly id="form1Example1" class="form-control" />
              <label class="form-label" for="form1Example1">Email address</label>
            </div>

            <!-- Role -->
            <div class="form-outline mb-4">
                <input type="text" value="{{ $user->is_admin ? 'Admin' : 'Member'  }}" readonly id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Role</label>
            </div>

            <!-- name -->
            <div class="form-outline mb-4">
                <input type="text" name="name" value="{{ $user->name }}" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Name</label>
            </div>            
          
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
            <button type="submit" class="btn btn-primary btn-block">Change Profile</button>
          </form>
        
</div
@endsection