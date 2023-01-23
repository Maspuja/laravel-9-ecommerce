<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    
    <form action="{{ route('edit_profile') }}" method="post">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $user->name }}">
        <br>
        <label for="">Email</label>
        <input type="email" name="email" value="{{ $user->email}}" readonly>
        <label for="">New Password</label>
        <input type="password" name="password" >
        <br>
        <label for="">Confirm password</label>
        <input type="password" name="password_confirmation" id="">
    </form>
    
</body>
</html>