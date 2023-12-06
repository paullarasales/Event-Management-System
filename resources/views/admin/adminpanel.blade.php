<x-admin-layout>
    <div class="flex flex-col h-screen p-6">
        <div class="flex flex-col w-full h-12 gap-5">
            <h1 class="p-5 text-xl font-semibold">
                Users
            </h1>
             <!-- Table -->
             @if($users && count($users) > 0)
             <table class="w-full border-collapse">
                     <thead class="bg-gray-50 border-b-2 border-gray-200">
                         <tr>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">First Name</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Last Name</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">Position</th>
                             <th class="p-3 text-lg font-semibold tracking-wide text-left">User Type</th>
                         </tr>
                     </thead>
                 <tbody>
                     <!-- Loop through events and display them -->
                     @foreach ($users as $user)
                         <tr>
                             <td class="p-3 text-md text-gray-700">{{ $user->firstname }}</td>
                             <td class="p-3 text-md text-gray-700">{{ $user->lastname }}</td>
                             <td class="p-3 text-md text-gray-700">{{ $user->position }}</td>
                             <td class="p-3 text-md text-gray-700">{{ $user->usertype }}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         @else
             <p>No events found.</p>
         @endif
        </div>
           
    </div>
</x-admin-layout>
