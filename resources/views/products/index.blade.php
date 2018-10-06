@extends('welcome')


@section('content')
    @foreach($products as $product)
    
    <div class="media text-muted pt-3">
      <img class="mr-2 rounded" src="{{ $product->image }}" alt="Card image cap" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}"  style="width: 32px; height: 32px;">
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{ str_limit($product->name)}}</strong>
          <a href="#"> 
            {{ $product->price_base }} руб
          </a>
        </div>
        <span class="d-block"> <strong>Артикул: </strong>{{ $product->articul }}</span>
        <span class="d-block"> <strong>Наличие</strong>
            <ul>
                <li>Екатеринбург: {{ $product->store_ekb }}</li>
                <li>Новосибирск: {{ $product->store_nsk }}</li>
                <li>Москва: {{ $product->store_msk }}</li>
            </ul>
        </span>
        <span class="d-block">{{ str_replace('Описание=', '', $product->about) }}</span>
        <span class="d-block">
            {{-- @foreach($product->props as $prop)
                {{ str_replace('=', ': ', $prop) }}<br>
            @endforeach --}}
        </span>
      </div>
    </div>
    @endforeach

    <div class="d-block clearfix mt-5">
        <div class="pull-right">
            {{ $products->links() }}
            <small class="text-right d-block mt-3"><a href="#">All suggestions</a></small>
        </div>
    </div>


    {{-- <div class="clearfix row">

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

    <script></script> --}}

@endsection