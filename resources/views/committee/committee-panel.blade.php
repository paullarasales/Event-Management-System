<x-committee-layout>
    <div class="flex flex-col h-screen p-6">
        <div class="flex flex-col w-full h-12 gap-5">
            <h1 class="p-5 text-2xl font-semibold">
                Events
            </h1>
             <!-- Table -->
             @if($events && count($events) > 0)
             <table class="w-full border-collapse">
                     <thead class="bg-gray-50 border-b-2 border-gray-200">
                         <tr>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Title</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Description</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Date</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Location</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Status</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Operation</th>
                         </tr>
                     </thead>
                 <tbody>
                     <!-- Loop through events and display them -->
                     @foreach ($events as $event)
                         <tr>
                             <td class="p-3 text-md text-gray-700">{{ $event->title }}</td>
                             <td class="p-3 text-md text-gray-700">{{ $event->description }}</td>
                             <td class="p-3 text-md text-gray-700">{{ $event->start_date }}</td>
                             <td class="p-3 text-md text-gray-700">{{ $event->location }}</td>
                             <td class="p-3 text-md text-green-700">{{ $event->status }}</td>
                             <td>
                                <div class="flex items-center justify-evenly">
                                    <!-- Other icons or content -->
                                
                                    <!-- Delete Button -->
                                    <a href="{{ route('committee.committee-panel.destroy', ['event' => $event->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $event->id }}').submit();">
                                        <button type="button" class="text-red-500">Delete</button>
                                    </a>
                                    
                                    <form id="delete-form-{{ $event->id }}" action="{{ route('committee.committee-panel.destroy', ['event' => $event->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>                                  
                                </div>
                            </td>                            
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         @else
             <p>No events found.</p>
         @endif
        </div>
           
    </div>
</x-committee-layout>
