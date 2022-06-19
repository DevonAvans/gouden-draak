@extends('layouts.kassa')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<section class="cash-register-container" id="vue">
  <section class="menu-container">
    @foreach ($dishes as $category=>$dish)
    <section class="category-container">
      <h2 class="category-title">{{ $category }}</h2>
      <section class="dishes-container">
        @foreach ($dish as $d)
        <section class="dish-container">
          <p class="dish-menu-text">{{ $d->menu_text }}</p>
          <p class="dish-name">{{ $d->name }}</p>
          <p class="dish-price">&euro;{{ $d->price }}</p>
          <form action="/api/v1/orders" method="POST">
            @csrf
            <input type="hidden" name="dish_id" value="{{ $d->id }}">
            <!-- input comment -->
            <input type="text" name="comment" placeholder="Optional comment">
            <button type="submit">Add</button>
          </form>
        </section>
        @endforeach
      </section>
    </section>
    @endforeach
  </section>
  <section class="order-total-container">
    <section class="order-wrapper">
      <h2>Orders</h2>
      <section class="dishes-list">
        @if(isset($order))
        @foreach($order as $o)
        <form action="/api/v1/orders" method="POST">
          @csrf
          @method('DELETE')
          <input type="hidden" name="dish_id" value="{{ $o['id'] }}">
          <order-list menuText="{{$o['menu_text']}}" name="{{$o['name']}}" price="{{$o['price']}}" amount="{{$o['amount']}}"></order-list>
        </form>
        @endforeach
        @endif
      </section>
    </section>
    <section class="total-container">
      <h2>Total</h2>
      <section>
        <p class="total-price">&euro;{{number_format($total, 2)}}</p>
        <form action="" method="POST">
          @csrf
          @method('POST')
          <button type="submit">Check-out</button>
        </form>
        <p>
          <a href="{{route('cashregister.api.order.delete')}}">Delete</a>
        </p>
      </section>
    </section>
  </section>
</section>
<script defer src="{{ mix('js/app.js') }}"></script>
@endsection
