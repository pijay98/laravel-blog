@include('backpanel.layouts.master')
 
<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('permission.index')}}" class="btn btn-primary rounded">All Permissions</a>
</div>
<h3 class="text-center" style="padding-top:60px;">Create a new Permission</h3>
@if (count($errors) > 0)
         @foreach ($errors->all() as $error)
   <div class = "alert alert-danger">
            {{ $error }}
   </div>

         @endforeach
@endif
<form action="{{route('permission.store')}}" method="post">
    @csrf
    <div style = "position:relative; left:40px; top:10px;">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name">
</div>
<button class="btn btn-primary btn-block rounded" type="submit">Save Permission</button>
</div>
</form>


