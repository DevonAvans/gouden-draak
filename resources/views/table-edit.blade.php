@extends('layouts.main')

@section('content')
<h1>Edit tafel</h1>
<form class="user-container" method="POST" action="">
  @csrf
  @method('PUT')
  <section>
    <label for="user">Medewerker</label>
    <select id="user_id" name="user_id">
      @foreach($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </section>

  <section>
    <button type="submit">
      Update
    </button>
  </section>
</form>
@endsection
