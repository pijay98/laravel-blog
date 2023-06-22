@include('backpanel.layouts.master')

<div style = "position:relative; left:40px; top:80px;" class="d-flex justify-content-between">
    <a href="{{route('category.create')}}" class="btn btn-primary rounded">Create Categories</a>
    <a href="{{route('category.trash')}}" class="btn btn-danger rounded">Trash</a>
</div>
<h2 style="padding-top: 100px; padding-left:40px">All Categories</h2>
@if(session('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif
<table class="table table-hover">
    <tr>
        <th  style="padding-left:40px;">Name</th>
        <th>Slug</th>
        <th>Actions</th>

    </tr>
     @forelse($categories as $category)
     
    <tr>
        <td style="padding-left:40px;">{{$category->name}}</td>
        <td>{{$category->slug}}</td>
        <td class="d-flex">
            <div>
        <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning btn-sm rounded">
        <i class="material-symbols-outlined">edit</i>
        Edit
        </a>
</div>
        <form action="{{route('category.destroy',$category->id)}}" method="post">
            @csrf
            @method('delete')
        <button type="submit" class="btn btn-danger btn-sm rounded">
        <i class="material-symbols-outlined">delete</i>
        Delete
</button>
</form>
        </td>

    </tr>
    @empty
    <tr>
        <td style="padding-left:40px;" colspan="4">No Categories found</td>
    </tr>
    @endforelse
</table>
