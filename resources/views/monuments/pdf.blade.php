<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieminekļu saraksts</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <h3>Pieminekļu saraksts</h3>
    @foreach ($monuments as $monument)
    <div class="monument">
        <span class="id">{{ $monument->id }}</span>:
        <span class="title">{{ $monument->title }}</span>
    </div>
    @endforeach
</body>

</html>