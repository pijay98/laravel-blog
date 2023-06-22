@include('backpanel.layouts.master')
 
<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('category.index')}}" class="btn btn-primary rounded">Update</a>
</div>
<h3 class="text-center" style="padding-top:60px;">Update {{$category->name}}</h3>
@if (count($errors) > 0)
         @foreach ($errors->all() as $error)
   <div class = "alert alert-danger">
            {{ $error }}
   </div>

         @endforeach
@endif
<form action="{{route('category.update',$category->id)}}" method="post">
    @csrf
    @method('put')
    <div style = "position:relative; left:40px; top:10px;">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="{{$category->name}}">
</div>
<button class="btn btn-primary btn-block rounded" type="submit">Update Category</button>
</div>
</form>



