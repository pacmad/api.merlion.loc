<div class="menu-top">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="menu-item">
                @foreach($categories as $category)
                    <div class="card-header" id="headingOne-{{ $category->id }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne-{{ $category->id }}" aria-expanded="true" aria-controls="collapseOne-{{ $category->id }}">
                                {{ $category->name }}
                            </button>
                        </h5>
                    </div>
                @endforeach
            </div>
            <div class="menu-list">
                @foreach($categories as $category)
                    <div id="collapseOne-{{ $category->id }}" class="collapse " aria-labelledby="headingOne-{{ $category->id }}" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                @foreach($category->children as $cats)
                                    <div class="col-md-3">
                                        <h5>{{ $cats->name }}</h5>
                                        <hr />
                                        <ul>
                                            @foreach($cats->children as $cat)
                                                <li><a href="">{{$cat->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>