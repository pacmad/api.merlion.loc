@extends('welcome')

@section('content')

<div class="row my-4">
    
<div class="col-3 pr-0">
<div class="p-3 bg-white rounded shadow-sm">
    <img class="pl-0 rounded" src="{{ $product->image }}" alt="Card image cap" data-toggle="tooltip" data-placement="top" title="{{ $product->name }}"  style="width: 100%;">
</div>
<div class="my-3 ">
    <div class="form-group mt-4">
        <div class="input-group">  
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-link"></i></span>
            </div>
            <input style="font-size: 12px" class="form-control" type="text" placeholder="Наименование" name="image" value="{{ $product->image }}">            
        </div>
    </div>
</div>
</div>
<div class="col-9">
    <div class="p-3 bg-white rounded shadow-sm">
        <div class="form-group">

            <div class="row">
                <div class="col-8">
                    <h6 class="">{{ str_limit($product->name)}}</h6>
                </div>                
                <div class="col-4 text-right">
                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-save"></i></button>                
                    <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>                
                </div>
            </div>
            <div class="border-bottom border-gray mb-4 pb-2 clearfix"></div>
        </div> 
                    

        {{Form::open([
    		'route'	=>	['products.update', $product->id],
    		'method'	=>	'put'
    	])}}
        

            <div class="form-group mt-4">
                <div class="input-group">  
                    <div class="input-group-prepend">
                        <span class="input-group-text">Наименование</span>
                    </div>
                    <input class="form-control" type="text" placeholder="Наименование" name="name" value="{{ $product->name }}">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">  
                    <div class="input-group-prepend">
                        <span class="input-group-text">Артикул</span>
                    </div>
                    <input class="form-control" type="text" placeholder="Артикул" name="articul" value="{{ $product->articul }}">
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Цена</label>
                        <div class="input-group">                        
                            <input class="form-control" type="text" placeholder="Цена" name="price_base" value="{{ $product->price_base }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-rub" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label>Цена старая</label>   
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Артикул" name="price_base" value="{{ $product->price_old }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-rub" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label>Спец Цена</label>   
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Артикул" name="price_base" value="{{ $product->price_sp }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-rub" aria-hidden="true"></i></span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="form-group  clearfix">
                <div class="row">
                    <div class="col-4">
                        <label class="clearfix w-100">Екатеринбург</label>  
                        <div class="input-group">                  
                            <input class="form-control" type="text" placeholder="Екатеринбург" name="store_ekb" value="{{ $product->store_ekb }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-truck" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="clearfix w-100">Новосибирск</label>
                        <div class="input-group">    
                            <input class="form-control" type="text" placeholder="Новосибирск" name="store_nsk" value="{{ $product->store_nsk }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-truck" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">    
                        <label class="">Москва</label>
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Москва" name="store_msk" value="{{ $product->store_msk }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-truck" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Категория</label>

                <select multiple class="form-control" name="category_id">
                    <option>-</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? ' selected' : '' }}>{{ $category->name }}</option>
                        @foreach($category->children as $sub_cat)
                            <option value="{{ $sub_cat->id }}" {{ $sub_cat->id == old('category_id', $product->category_id) ? ' selected' : '' }}>-{{ $sub_cat->name }}</option>
                            @foreach($sub_cat->children as $sub__cat)
                                <option value="{{ $sub__cat->id }}" {{ $sub__cat->id == old('category_id', $product->category_id) ? ' selected' : '' }}>- -{{ $sub__cat->name }}</option>
                            @endforeach
                        @endforeach
                    @endforeach
                </select>
            </div> 

            <div class="form-group">
                <label>Описание</label>
                <textarea name="about" class="form-control">{{ $product->about }}</textarea>
            </div>   

               
            {{ Form::close() }}

    </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
