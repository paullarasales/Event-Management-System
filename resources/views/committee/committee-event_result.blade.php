<x-committee-layout>
    <div>
        <h1>Committee Dashboard</h1>

        @foreach($events as $event)
            <h2>{{ $event->title }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Contestant</th>
                        <th>Average Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event->rankedContestants() as $rank => $contestant)
                        <tr>
                            <td>#{{ $rank + 1 }}</td>
                            <td>{{ $contestant->fullname }}</td>
                            <td>{{ $contestant->average_grade }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</x-committee-layout>
