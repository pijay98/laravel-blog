@include('backpanel.layouts.master')
 
<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('user.index')}}" class="btn btn-primary rounded">All Users</a>
</div>
<h3 class="text-center" style="padding-top:60px;">Update {{$users->name}}</h3>
@if (count($errors) > 0)
         @foreach ($errors->all() as $error)
   <div class = "alert alert-danger">
            {{ $error }}
   </div>

         @endforeach
@endif
<form action="{{route('user.update',$users->id)}}" method="post">
    @csrf
    <div style = "position:relative; left:40px; top:10px;">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="{{$users->name}}">
</div>

<div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" name="email" value="{{$users->email}}">
</div>

<div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="password">
</div>

<div class="form-group">
        <label for="roles">Roles</label>
        <select id="roles" name="role_id" class="form-control">
                @foreach($roles as $role)
                <option value="{{$role->id}}" {{$role->id == $users->role_id  ? 'selected' : ''}} >{{strtoupper($role->name)}}</option>
                @endforeach
</select>
</div>
<button class="btn btn-primary btn-block rounded" type="submit">Update User</button>
</div>
</form>



