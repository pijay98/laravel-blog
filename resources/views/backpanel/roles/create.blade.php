@include('backpanel.layouts.master')
 
<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('role.index')}}" class="btn btn-primary rounded">All Roles</a>
</div>
<h3 class="text-center" style="padding-top:60px;">Create a new Role</h3>
@if (count($errors) > 0)
         @foreach ($errors->all() as $error)
   <div class = "alert alert-danger">
            {{ $error }}
   </div>

         @endforeach
@endif
<form action="{{route('role.store')}}" method="post">
    @csrf
    <div style = "position:relative; left:40px; top:10px;">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name">
</div>
<button class="btn btn-primary btn-block rounded" type="submit">Save Role</button>
</div>
</form>


