<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catchy Contest</title>
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
            background-color: #f7f7f7; /* Set a light background color */
            color: #333; /* Set text color */
        }

        html, body {
            height: 100%;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        header {
            /* background-color: #e74c3c; Red background for the header */
            padding: 1rem;
            text-align: center;
            color: white;
        }

        .contestant-container {
            background-color: #fff; /* White background for each contestant */
            margin: 1rem 0;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .grades-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        button {
            background-color: #3498db; /* Blue button background */
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <header>
            <p class="text-black">Judge: {{ Auth::guard('judge')->user()->username }}</p>
            <form action="{{ route('judge.logout') }}" method="post">
                @csrf
                <button type="submit" class="">Logout</button>
            </form>
        </header>

        @foreach ($contestants as $contestant)
        <div class="contestant-container">
            <h3>{{ $contestant->fullname }}</h3>
            <form action="{{ route('judge.submitGrades', ['contestant' => $contestant->id]) }}" method="post">
                @csrf
                <div class="grades-container">
                    @foreach ($event->criteria as $criteria)
                        <div>
                            <span>{{ $criteria->points }}</span>
                            <label for="grades[{{ $criteria->id }}]">{{ $criteria->criteria }}:</label>
                            <input type="text" name="grades[{{ $criteria->id }}]" required>
                        </div>
                    @endforeach
                    <button type="submit">Submit Grades</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</body>
</html>
