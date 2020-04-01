@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col w-full">
            <h1 class="text-3xl font-bold mb-4">Cart <span class="font-light text-base tracking-wider">({{ $_COOKIE['bigcommerce_cart_count'] ?? 0 }} items)</span></h1>
        </div>
    </div>

    <div class="row">
        <div class="col w-full">
            @if ($cart)
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th></th>
                            <th class="text-right">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Total</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cart->line_items->physical_items as $item)
                            <tr>
                                <td><img src="{{ $item->image_url }}" alt="{{ $item->product->name }}" width="75"></td>
                                <td><a href="{{ $item->product->path }}">{{ $item->product->name }}</a></td>
                                <td class="text-right text-sm">@include('bigcommerce::partials.products.price', ['product' => $item->product])</td>
                                <td>
                                    <div class="form-number justify-center">
                                        <form action="/cart/update" method="POST">
                                            @csrf
                                            <input type="hidden" name="line_items[0][quantity]" value="{{ $item->quantity - 1 }}">
                                            <button type="submit" class="button decrease-button"><i class="fas fa-xs fa-minus fa-fw"></i></button>
                                        </form>

                                        <input type="text" name="line_items[0][quantity]" value="{{ $item->quantity }}" class="form-input">

                                        <form action="/cart/update" method="POST">
                                            @csrf
                                            <input type="hidden" name="line_items[0][quantity]" value="{{ $item->quantity + 1 }}">
                                            <button type="submit" class="button increase-button"><i class="fas fa-xs fa-plus fa-fw"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-right text-sm">${{ money_format('%i', $item->extended_sale_price) }}</td>
                                <td class="text-right">
                                    <form action="/cart/{{ $item->id }}" method="POST" class="align-middle">
                                        @method('DELETE')
                                        @csrf

                                        <p-button type="submit" theme="danger">Remove</p-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-10">
                    <a class="bg-blue-500 group hover:bg-blue-700 px-4 py-2 rounded text-white font-semibold" href="/store">
                        <span class="mr-2 group-hover:text-white">Continue Shopping</span>
                        <i class="fas fa-store-alt fa-fw group-hover:text-white"></i>
                    </a>
                </div>
                
                <div class="flex justify-end mt-20">
                    <div class="flex flex-wrap w-full md:w-1/2 lg:w-1/3 bg-gray-100 border">
                        <div class="w-1/2 flex items-center pt-6 px-6"><strong>Subtotal:</strong></div>
                        <div class="w-1/2 flex justify-end tracking-wide mb-3 pt-6 px-6">${{ money_format('%i', $cart->base_amount) }}</div>

                        <div class="w-1/2 flex items-center px-6"><strong>Discount:</strong></div>
                        <div class="w-1/2 flex justify-end tracking-wide mb-3 px-6">${{ money_format('%i', $cart->discount_amount) }}</div>

                        <div class="w-1/2 flex items-center pb-6 px-6"><strong>Grand total:</strong></div>
                        <div class="w-1/2 flex justify-end text-2xl tracking-wide pb-6 px-6">${{ money_format('%i', $cart->cart_amount) }}</div>
                    </div>
                </div>

                <div class="flex justify-end mt-3">
                    <div class="flex flex-wrap w-full md:w-1/2 lg:w-1/3">
                        <a href="{{ $cart->redirect_urls->checkout_url }}" size="large" class="button button--large text-center w-full font-light tracking-wide">Continue to Checkout</a>
                    </div>
                </div>
            @else
                <h2>Your Shopping Cart is empty.</h2>
            @endif
        </div>
    </div>
@endsection