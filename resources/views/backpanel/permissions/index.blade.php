@include('backpanel.layouts.master')

<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('permission.create')}}" class="btn btn-primary rounded">Create Permissions</a>
</div>
<h2 style="padding-top: 100px; padding-left:40px">All Roles</h2>
@if(session('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif
<table class="table table-hover">
    <tr>
        <th  style="padding-left:40px;">Name</th>
        <th>Actions</th>

    </tr>
     @forelse($permissions as $permission)
     
    <tr>
        <td style="padding-left:40px;">{{$permission->name}}</td>
        <td>
        <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-warning btn-sm rounded">
        <i class="material-symbols-outlined">edit</i>
        Edit
        </a>
        <form action="{{route('permission.destroy',$permission->id)}}" method="post">
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
        <td style="padding-left:40px;" colspan="4">No Permissions found</td>
    </tr>
    @endforelse
</table>
