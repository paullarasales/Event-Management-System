<x-committee-layout>
    <div>
        <h1>Committee Dashboard</h1>

        @foreach($events as $event)
            <h2>{{ $event->title }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>Contestant</th>
                        @foreach($event->criteria as $criteria)
                            <th>{{ $criteria->criteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($event->contestants as $contestant)
                        <tr>
                            <td>{{ $contestant->fullname }}</td>
                            @foreach($contestant->grades as $grade)
                                <td>{{ $grade->grade }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</x-committee-layout>