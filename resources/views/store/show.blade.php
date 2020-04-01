@extends('layouts.default')

@section('content')
    <div class="product-view">

        {{-- Product Heading --}}
        <div class="product-view__heading row">
            <div class="col w-full">

                {{-- Product Title --}}
                <h1 class="title">{{ $product->name }}</h1>

                {{-- Product Price --}}
                <div class="price">
                    @include('bigcommerce::partials.products.price')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col w-1/3">
                <img src="{{ $product->images->first()->url_standard }}" alt="{{ $product->name }}">
            </div>

            <div class="col w-2/3">
                {!! $product->description !!}

                <dl>
                    <dt>ID</dt>
                    <dd>{{ $product->id }}</dd>

                    <dt>SKU</dt>
                    <dd>{{ $product->sku }}</dd>

                    <dt>Weight</dt>
                    <dd>{{ $product->weight() }}</dd>
                </dl>

                @foreach ($product->options as $option)
                    <div class="block mb-6">
                        <label class="block mb-2 font-bold">Option: {{ $option->display_name }}</label>
                        {{ $option->type }}
                        <pre>{{ collect(get_object_vars($option))->toJson() }}</pre>
                        {{-- @includeIf('bigcommerce::partials.products.'.$option->type) --}}
                    </div>
                @endforeach

                <div>
                    <form action="/cart" method="POST">
                        @csrf

                        <input type="hidden" name="line_items[0][product_id]" value="{{ $product->id }}">
                        <input type="number" name="line_items[0][quantity]" min="1" value="1" class="form-input w-20">
                        <input type="number" name="line_items[0][variant_id]" value="{{ $variant->id }}" class="form-input w-20" readonly>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 px-4 py-2 rounded text-white font-semibold"><i class="fas fa-shopping-basket fa-fw mr-2"></i> Add to cart</button>
                    </form>
                </div>
            </div>
        </div>

        @if(request()->has('debug'))
            <div class="row">
                <div class="col w-full">
                    <h3>Product Data</h3>
                    <pre>{{ $product }}</pre>

                    <h3>Image Data</h3>
                    <pre>{{ $product->images }}</pre>

                    <h3>Related Data</h3>
                    <pre>{{ $product->related }}</pre>

                    <h3>Variant Data</h3>
                    <pre>{{ $product->variants }}</pre>

                    <h3>Option Data</h3>
                    <pre>{{ $product->options }}</pre>

                    <h3>Modifier Data</h3>
                    <pre>{{ $product->modifiers }}</pre>

                    <h3>Video Data</h3>
                    <pre>{{ $product->videos }}</pre>

                    <h3>Custom Field Data</h3>
                    <pre>{{ $product->customfields }}</pre>

                    <h3>Review Data</h3>
                    <pre>{{ $product->reviews }}</pre>

                    <h3>Rule Data</h3>
                    <pre>{{ $product->rules }}</pre>
                </div>
            @endif
        </div>
    </div>
@endsection