<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Monument</title>
</head>

<body>
    <h1>Izveidot</h1>

    <form action="{{  route('monuments.store') }}" method="POST">
        @csrf
        @method('POST')

        <div>
            <label for="title">Nosaukums:</label>
            <input type="text" id="title" name="title" value="" required>
        </div>

        <div>
            <label for="description">Apraksts:</label>
            <textarea id="description" name="description" required cols="80" rows="20"></textarea>
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
</body>

</html>