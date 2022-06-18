<link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
<h1>Users</h1>
<section class="users-container">
  <section class="header">
    <section>Name</section>
    <section>Email</section>
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
      <p><a href="{{route('admin.user.edit', $user->id)}}">Edit</a></p>
    </section>
  </section>
  @endforeach
</section>
<p><a href="{{route('admin.user.create')}}">Create</a></p>