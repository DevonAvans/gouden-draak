@if (session('message'))
<section class="alert {{ session('status') }}">
  {{ session('message') }}
</section>
@endif