<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>up Monument</title>
</head>

<body>
    <h1>atsvaidziat</h1>

    <form action="{{  route('monuments.update', $monument->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Nosaukums:</label>
            <input type="text" id="title" name="title" value="{{$monument->title}}" required>
        </div>

        <div>
            <label for="state">Pagasts:</label>
            <input type="text" id="state" name="state" value="{{$monument->state}}" required>
        </div>
        <div>
            <label for="location">Atrašānās vietas piezīmes:</label>
            <input type="text" id="location" name="location" value="{{$monument->location}}" required>
        </div>
        <div>
            <label for="people">Saistītās personas</label>
            <input type="text" id="people" name="people" value="{{$monument->people}}" required>
        </div>
        <div>
            <label for="description">Apraksts:</label>
            <textarea id="description" name="description" required cols="80" rows="20">{{$monument->description}}</textarea>
        </div>

        <div>
            <label for="type">Veida nosaukums:</label>
            <select id="type" name="type">
                @foreach ($types as $type)
                <option value="{{ $type->id }}">
                    {{ $type->title }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Post</button>
    </form>
    <h2>vesture</h2>
    @foreach ($monument->OldImages as $image)

    <img width=200 alt="bilde" src="{{asset('storage/' . $image->path)}}">
    @endforeach
    <h2>tagande</h2>
    @foreach ($monument->NewImages as $image)

    <img width=200 alt="bilde" src="{{asset('storage/' . $image->path)}}">

    @endforeach
    <form action="{{ route('images.store', ['monument_id' => $monument->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="file" name="image"><br>
        <label for="type">Attēla veids:</label>
        <select id="type" name="type" value="historical">
            <option value="historical">Vēsturisks</option>
            <option value="recent">Aktuāls</option>
        </select>
        <button type="submit">Pievienot bildi</button>
    </form>
</body>

</html>