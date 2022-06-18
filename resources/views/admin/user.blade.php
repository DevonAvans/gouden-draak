<link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
<h1>User</h1>
<form class="user-container" method="POST" action="">
  @csrf
  @method($method)
  <section>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{$user->name ?? ''}}">
  </section>
  <section>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{$user->email ?? ''}}">
  </section>
  @if (auth()->user()->role_id == 1 && $user->role_id != 1)
  <section>
    <label for="role">Role</label>
    <select id="role_id" name="role_id" required>
      @foreach($roles as $role)
      <option value="{{$role->id}}" @if(isset($user) && $user->id == $role->id)
        selected
        @endif
        >{{$role->name}}</option>
      @endforeach
    </select>
  </section>
  @endif
  <section>
    <button type="submit">Update</button>
  </section>
</form>