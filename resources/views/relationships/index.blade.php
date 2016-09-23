<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>L5DBEK-A</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <p style="margin-top: 20px;"><a href="{{ route('one.to.one') }}">One to One</a> |
            <a href="{{ route('one.to.many') }}">One to Many</a> |
            <a href="{{ route('many.to.many') }}">Many to Many</a> |
            <a href="{{ route('has.many.through') }}">Has Many Through</a> |
            <a href="{{ route('polymorphic') }}">Polymorphic</a></p>
        <h1>L5DBEK-A: Relationships</h1>
        <h3>
            <div class="row">
                <div class="col-md-6">
                    {{ $title }}
                </div>
                @if($route != '')
                <div class="col-md-6 text-right">
                    <form action="{{ route($route) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-default">Novo Registro</button>
                    </form>
                </div>
                @endif
            </div>
        </h3>
        <div class="well">
            {{-- @foreach($collection as $customer)
                <p>{{ $customer->address->street }}</p>
            @endforeach --}}
            {{ var_dump($collection->toArray()) }}
        </div>
    </div>
</body>
</html>