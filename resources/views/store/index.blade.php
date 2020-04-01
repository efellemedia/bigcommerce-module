@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col w-full">
            <h1 class="text-3xl font-bold mb-4">Store</h1>
        </div>
    </div>

    <div class="row">
        <div class="col w-full">
            <div class="grid">
                @forelse($products as $product)
                    <a href="{{ $product->path() }}" class="bg-white rounded overflow-hidden h-full text-grey-darkest no-underline shadow border">
                        <img class="w-full block" src="{{ $product->images->first()['url_standard'] }}" alt="{{ $product->name }}">
                        
                        <div class="px-6 py-4">
                            <div class="text-sm mb-2">{{ $product->name }}</div>
                        </div>

                        <div class="px-6 py-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                @include('bigcommerce::partials.products.price')
                            </span>
                        </div>
                    </a>
                @empty
                    <li>No products yet.</li>
                @endforelse
            </div>
        </div>
    </div>
@endsection