@include('backpanel.layouts.master')
 
<div style = "position:relative; left:40px; top:80px;">
    <a href="{{route('role.index')}}" class="btn btn-primary rounded">All Roles</a>
</div>
<h3 class="text-center" style="padding-top:60px;">Assign Permission to {{$role->name}}</h3>

@if (count($errors) > 0)
         @foreach ($errors->all() as $error)
   <div class = "alert alert-danger">
            {{ $error }}
   </div>

         @endforeach
@endif
<form action="{{route('role.store.permission',$role->id)}}" method="post">
    @csrf
    @forelse($permissions as $permission)
    <div class="form-group">
        <table class="table">
            <tr>
                <td>
        <label for="permission" style="padding-left:40px;">{{$permission->name}}</label>
                </td>
                <td class="text-right">
        <input type="checkbox" name="permission[]" id="permission" value="{{$permission->id}}" @if($role->hasPermissionTo($permission->id)) checked @endif>
                </td>
            </tr>
        </table>
</div>
    @empty
    <p>No permission added yet</p>
    @endforelse
    <button type="submit" class="btn btn-primary btn-block">Save Permission</button>
</form>




