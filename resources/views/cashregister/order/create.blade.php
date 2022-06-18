<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<section class="cash-register-container">
  <section class="menu-container">
    @foreach ($dishes as $category=>$dish)
    <section class="category-container">
      <h2 class="category-title">{{ $category }}</h2>
      <section class="dishes-container">
        @foreach ($dish as $d)
        <section class="dish-container">
          <p class="dish-menu_text">{{ $d->menu_text }}</p>
          <p class="dish-name">{{ $d->name }}</p>
          <p class="dish-price">{{ $d->price }}</p>
          <button class="add-button">Add</button>
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
      </section>
    </section>
    <section class="total-container">
      <h2>Total</h2>
      <section>
        <p class="total-price">€ 0,00</p>
        <button>Check-out</button>
        <button>Delete</button>
      </section>
    </section>
  </section>
</section>