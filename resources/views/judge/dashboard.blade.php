<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($contestants as $contestant)
    <div>
        <h3>{{ $contestant->fullname }}</h3>
        <form action="{{ route('judge.submitGrades', ['contestant' => $contestant->id]) }}" method="post">
            @csrf
            <label for="grade">Grade:</label>
            <input type="number" name="grade" step="0.1" min="0" max="10" required>
            <button type="submit">Submit Grade</button>
        </form>
    </div>
@endforeach
</body>
</html>