@extends('layouts.main')

@section('content')
<section class="news">
  @foreach($news as $new)
  <article class="row">
    <section class="header-container">
      <section class="time-container">
        <span>{{date('h:m', strtotime($new->updated_at))}}</span>
        <span>{{date('d-M-y', strtotime($new->updated_at))}}</span>
      </section>
      <h2>{{ $new->title }}</h1>
    </section>
    <p>{{ $new->content }}</p>
    </div>
  </article>
  @endforeach
</section>
@endsection