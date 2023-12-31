@include('backpanel.layouts.master')

<style>
        .form-file-group{
                width:500px;
                height:200px;
                border:4px dashed #000;
        }
        .form-file-group p{
                width:100%;
                height:100%;
                text-align:center;
                line-height:170px;
        }
</style>
 
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
<div class="form-file-group">
        <input type="file" name="feature_image" style="display:none;" id="file-upload" onchange="previewfile(this)">
        <p onclick="document.getElementById('file-upload').click()">Drag your file here or click in this area to upload</p>
</div>
<div id="previewBox" style="display:none">
<img src="" id="previewImg" width="500px" class="img-fluid">
<i class="material-symbols-outlined" style="cursor:pointer" onclick="removePreview()">delete</i>
</div>
<button class="btn btn-primary rounded" type="submit" value="draft" name="status">Save Post</button>
<button class="btn btn-success rounded" type="submit" value="publish" name="status">Publish Post</button>
</div>
</form>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
 CKEDITOR.replace('content', {
   filebrowserUploadUrl:"{{route('post.upload',['_token'=>csrf_token()])}}",
   filebrowserUploadMethod:"form"
 });

 function previewfile(input){

        let file=$("input[type=file]").get(0).files[0];
        if(file){
           let reader = new FileReader();
           reader.onload = function (){
                $("#previewImg").attr('src',reader.result);
                $("#previewBox").css('display','block');
           }
          $(".form-file-group").css('display','none');
          reader.readAsDataURL(file);
        }
 }
 function removePreview(){

        $("#previewImg").attr('src','');
        $("#previewBox").css('display','none');
        $(".form-file-group").css('display','block');

 }
 </script>


