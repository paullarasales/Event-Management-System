<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <!-- In judge.dashboard view -->
        @foreach ($contestants as $contestant)
        <div>
            <h3>{{ $contestant->fullname }}</h3>
            <form action="{{ route('judge.submitGrades', ['contestant' => $contestant->id]) }}" method="post">
                @csrf
                <input type="hidden" name="contestant_id" value="{{ $contestant->id }}">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                
                @foreach ($event->criteria as $criteria)
                    <div>
                        <label for="grades[{{ $criteria->id }}]">{{ $criteria->criteria }}:</label>
                        <input type="number" name="grades[{{ $criteria->id }}]" required>
                    </div>
                @endforeach
                
                <button type="submit">Submit Grades</button>
            </form>
        </div>
        @endforeach
</body>
</html>