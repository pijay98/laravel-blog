@include('backpanel.layouts.master')
 
<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('post.index')}}" class="btn btn-primary rounded">All Posts</a>
</div>
<h3 class="text-center" style="padding-top:60px;">Create a new Posts</h3>
@if (count($errors) > 0)
         @foreach ($errors->all() as $error)
   <div class = "alert alert-danger">
            {{ $error }}
   </div>

         @endforeach
@endif
<form action="{{route('post.store')}}" method="post">
    @csrf
    <div style = "position:relative; left:40px; top:10px;">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" name="title">
</div>
<div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
        <label for="excerpt">Excerpt</label>
        <textarea name="excerpt" id="excerpt" class="form-control" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
        <label for="category_id">Select Category</label>
         <select name="category_id" id="category_id" class="form-control">
            <option value="0">Select Category</option>
            @forelse($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @empty
            @endforelse
</select>
</div>
<button class="btn btn-primary rounded" type="submit" value="draft" name="status">Save Post</button>
<button class="btn btn-success rounded" type="submit" value="publish" name="status">Publish Post</button>
</div>
</form>


