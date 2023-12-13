<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,800&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        /* Add this if needed */
        html, body {
            height: 100%;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
   <!-- In your Blade view -->
@foreach ($contestants as $contestant)
<div>
    <h3>{{ $contestant->fullname }}</h3>
    <form action="{{ route('judge.submitGrades', ['contestant' => $contestant->id]) }}" method="post">
        @csrf
        <!-- Other hidden fields or form inputs... -->
        
        @foreach ($event->criteria as $criteria)
            <div>
                <span>{{ $criteria->points }}</span>
                <label for="grades[{{ $criteria->id }}]">{{ $criteria->criteria }}:</label>
                <input type="text" name="grades[{{ $criteria->id }}]" required>
            </div>
        @endforeach
        
        <button type="submit">Submit Grades</button>
    </form>
</div>
@endforeach

</body>
</html>
