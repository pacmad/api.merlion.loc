@extends('welcome')


@section('content')

    <div class="clearfix row">

        @foreach($products as $product)
            <div class="card col-3">
                <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}">
                <div class="card-block">
                    <h4 class="card-title" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}">{{ str_limit($product->name, 18)}}</h4>
                    <p class="card-text">{{ str_limit($product->about, 50)}}</p>
                    <p class="card-text"><small class="text-muted">{{ $product->price_base }}</small></p>
                </div>
            </div>
        @endforeach

    </div>

    <footer class="footer row">
        <div class="container row">
            <div class="mt-3 clearfix">
                {{ $products->links() }}
            </div>
            <span class="text-muted col-12 clearfix">Place sticky footer content here.</span>
        </div>
    </footer>

    <script></script>

@endsection