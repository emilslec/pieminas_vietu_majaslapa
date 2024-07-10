<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$monument->title}}</title>
</head>

<body>
    <h1>Show monument</h1>
    <div>
        <h2>{{ $monument->title }}</h2>
        <p>{{ $monument->description }}</p>
        <h2>dalibnieki</h2>
        @foreach ($monument->participants as $participant)
        <p>{{$participant->person->name}} --
            {{$participant->role->title}}
        </p>
        @endforeach
    </div>
</body>

</html>