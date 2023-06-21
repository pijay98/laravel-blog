@include('backpanel.layouts.master')

<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('role.create')}}" class="btn btn-primary rounded">Create Roles</a>
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
     @forelse($roles as $role)
     
    <tr>
        <td style="padding-left:40px;">{{$role->name}}</td>
        <td class="d-flex">
            <div>
        <a href="{{route('role.assign.permission',$role->id)}}" class="btn btn-success btn-sm rounded">
        <i class="material-symbols-outlined">assignment_ind</i>
        Assign Permission
        </a>
        <a href="{{route('role.edit',$role->id)}}" class="btn btn-warning btn-sm rounded">
        <i class="material-symbols-outlined">edit</i>
        Edit
        </a>
</div>
        <form action="{{route('role.destroy',$role->id)}}" method="post">
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
        <td style="padding-left:40px;" colspan="4">No Roles found</td>
    </tr>
    @endforelse
</table>
