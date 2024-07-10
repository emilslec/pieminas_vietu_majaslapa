<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog page</title>
</head>

<body>

    <h1>Vietas</h1>
    <form method="GET" action="{{ route('monuments.index') }}">
        <div>
            <label for="person">Cilvēks</label>
            <input type="text" id="person" name="person" value="{{request('person');}}">
        </div>
        <div>
            <label for="category" value="{{request('category');}}">Tips</label>
            <select id="category" name="category">
                <option value="">Izvēlieties tipu...</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="title">Nosaukums</label>
            <input type="text" id="title" name="title" value="{{request('title');}}">
        </div>
        <button type="submit">Meklēt</button>
        <button type="submit" name="clear" value="1">Notīrīt izvēli</button>
    </form>
    @foreach ($monuments as $monument)
    <h2><a href="{{ route('monuments.show', $monument->id) }}">{{ $monument->title }}</a></h2>
    <p> {{$monument->description}}</p>
    <p>Veids - {{$monument->type->title}}</p>


    @endforeach

</body>

</html>