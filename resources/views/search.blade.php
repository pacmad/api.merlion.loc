
{{ Form::open(['route' => ['products.index'], 'method' => 'get', 'class' => 'form-inline my-2 my-lg-0']) }}
    <input type="search" name="q" class="form-control mr-sm-2" value="{{ request('query') }}" placeholder="Поиск" style="width: 450px">
    {{ Form::submit('Search', ['class' => 'btn btn-outline-success my-2 my-sm-0']) }}
{{ Form:: close() }}