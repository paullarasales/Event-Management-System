<x-committee-layout>
    <div class="committee-container max-w-screen-md mx-auto">
        @foreach($events as $event)
            <div class="event-section bg-white my-4 p-6 rounded shadow-md">
                <h2 class="text-2xl font-bold mb-4">{{ $event->title }}</h2>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-blue-500 text-white">Contestant</th>
                            <th class="py-2 px-4 bg-blue-500 text-white">Average Grade</th>
                            <th class="py-2 px-4 bg-blue-500 text-white">Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event->rankedContestants() as $rank => $contestant)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4">{{ $contestant->fullname }}</td>
                                <td class="py-2 px-4">{{ $contestant->average_grade }}</td>
                                <td class="py-2 px-4">#{{ $rank + 1 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-committee-layout>
