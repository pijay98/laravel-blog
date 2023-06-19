@include('backpanel.layouts.master')
 
<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('user.index')}}" class="btn btn-primary rounded">All Users</a>
</div>
<h3 class="text-center" style="padding-top:60px;">Create a new User</h3>
<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div style = "position:relative; left:40px; top:10px;">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name">
</div>

<div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" name="email">
</div>

<div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="password">
</div>

<div class="form-group">
        <label for="roles">Roles</label>
        <select id="roles" name="role_id" class="form-control">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{strtoupper($role->name)}}</option>
                @endforeach
</select>
</div>
<div>
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar">
</div>
<button class="btn btn-primary btn-block rounded" type="submit">Save User</button>
</div>
</form>


