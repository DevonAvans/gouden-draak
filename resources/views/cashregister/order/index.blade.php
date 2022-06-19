<link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
<h1>Orders</h1>

@include('admin.partials.message')

@foreach($orders as $order)
<section style="display: flex; gap: 25px; align-items: center">
    <h2>{{ $order->id }}</h2>
    <p>&euro;{{ number_format($order->total, 2) }}</p>
    <p>{{ $order->table_id ?? '' }}</p>
    <p>{{ $order->created_at }}</p>
    <p><a href="{{route('cashregister.order.edit', $order->id)}}">Edit</a></p>
    <p><a href="{{route('cashregister.order.delete', $order->id)}}">Delete</a></p>
</section>
@endforeach