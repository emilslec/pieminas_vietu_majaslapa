<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Obejekti</title>
</head>

<body>

    <h1>Vietas</h1>
    <form method="GET" action="{{ route('monuments.index') }}">
        <div>
            <label for="title">Nosaukums</label>
            <input type="text" id="title" name="title" value="{{request('title');}}">
        </div>
        <div>
            <label for="state">Pagasts</label>
            <input type="text" id="state" name="state" value="{{request('state');}}">
        </div>
        <div>
            <label for="location">Vieta</label>
            <input type="text" id="location" name="location" value="{{request('location');}}">
        </div>
        <div>
            <label for="person">Cilvēks </label>
            <input type="text" id="person" name="person" value="{{request('person');}}">// vajag pēc vairākiem?
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
        <button type="submit">Meklēt</button>
        <button type="submit" name="clear" value="1">Notīrīt izvēli</button>
    </form>
    <h2><a href="{{ route('monuments.create') }}">Izveidot</a></h2>
    @foreach ($monuments as $monument)
    <h2><a href="{{ route('monuments.show', $monument->id) }}">{{ $monument->title }}</a></h2>
    <p> {{$monument->description}}</p>
    <p>Veids - {{$monument->type->title}}</p>
    <p>{{$monument->state}} - {{$monument->location}}</p>
    <form method="GET" action="{{ route('monuments.edit', $monument->id)}}">
        <button type="submit">update </button>
    </form>

    @endforeach

</body>

</html>