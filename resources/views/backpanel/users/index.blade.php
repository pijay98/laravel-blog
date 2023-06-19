@include('backpanel.layouts.master')

<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('user.create')}}" class="btn btn-primary rounded">Create Users</a>
</div>
<h2 style="padding-top: 100px; padding-left:40px">All Users</h2>
@if(session('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif
<table class="table table-hover">
    <tr>
        <th style="padding-left:40px;">Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>

    </tr>
     @forelse($users as $user)
     
    <tr>
        <td style="padding-left:40px;">
        <img src="{{$user->avatar}}" width="70px" height="70px">
    </td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        @isset($user->roles[0]->name)
        <td>{{strtoupper($user->roles[0]->name)}}</td>
        @endisset
        <td>
        <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning btn-sm rounded">
        <i class="material-symbols-outlined">edit</i>
        Edit
        </a>
        <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger btn-sm rounded">
        <i class="material-symbols-outlined">delete</i>
        Delete
</a>
        </td>

    </tr>
    @empty
    <tr>
        <td style="padding-left:40px;" colspan="4">No data</td>
    </tr>
    @endforelse
</table>
