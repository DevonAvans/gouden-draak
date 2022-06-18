<link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
<h1>Users</h1>

@include('admin.partials.message')

<section class="users-container">
  <section class="header">
    <section>Name</section>
    <section>Email</section>
    <section>Role</section>
  </section>
  @foreach ($users as $user)
  <hr>
  <section class="row">
    <section>
      <p>{{ $user->name }}</p>
    </section>
    <section>
      <p>{{ $user->email }}</p>
    </section>
    <section>
      <p>{{ $user->role->name }}</p>
    </section>
    <section class="button-container">
      <p><a href="{{route('admin.user.edit', $user->id)}}">Edit</a></p>
      @if($user->role_id != 1)
      <p><a href="{{route('admin.user.delete', $user->id)}}">Delete</a></p>
      @endif
    </section>
  </section>
  @endforeach
</section>
<p><a href="{{route('admin.user.create')}}">Create</a></p>