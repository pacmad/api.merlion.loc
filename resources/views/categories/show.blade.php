@extends('welcome')


@section('content')
    <div class="row my-4">

        <div class="col-3 pr-0">

            <div class="p-3 mb-3 bg-white rounded shadow-sm">
                <ul class="m-0 pl-2  ">

                    @foreach($result as $cats)
                        <li><a href="{{ route('categories.show', $cats->id) }}">{{ $cats->name }}</a></li>

                    @endforeach
                </ul>


                    @foreach($resultId as $child)

                        @if(!$child->children)
                            @foreach($result as $cats)
                                <li><a href="{{ route('categories.show', $cats->id) }}">{{ $cats->name }}</a></li>

                            @endforeach
                        @endif

                            @if($child->children)
                                @foreach($child->children as $childl)
                                    <li><a href="{{ route('categories.show', $childl->id) }}">{{ $childl->name }}</a></li>
                                @endforeach
                            @endif

                    @endforeach

                {{--{{$traverse($nodes)}}--}}

            </div>

        </div>
        <div class="col-9">
            <div class="p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">{{ $category->name }}</h6>


        @foreach($products as $product)
            <div class="media text-muted pt-3">
                <a href="{{route('products.edit', $product->id)}}">
                    <img class="mr-2 rounded" src="{{ $product->image }}" alt="Card image cap" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}"  style="width: 32px; height: 32px;">
                </a>
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
                        @if($product->props)
                            @foreach($product->props as $prop)
                                {{ str_replace('=', ': ', $prop) }}<br>
                            @endforeach
                        @endif
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



            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="card-body">
                        @foreach($nodes as $shop)
                            <div class="col-md-12 mt-5">
                                <h4>{{ $shop->name }}</h4>
                                <hr />
                                <div class="row">
                                    @foreach($shop->children as $cats)
                                        <div class="col-md-4 mb-4">
                                            <strong>{{ $cats->name }}</strong>
                                            <hr class="my-1" />
                                            @foreach($cats->children as $cat)
                                                <small class="d-block">{{$cat->name}}</small>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
