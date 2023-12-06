<x-admin-layout>
    <div class="flex flex-col h-screen w-full">
        <!-- Title -->
        <div class="flex justify-start w-full h-16 p-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Committee') }}
            </h2>
        </div>
        <div class="flex flex-row p-6 h-5/6 w-9/12 gap-2 ">
            <form method="POST" action="{{ route('committee.create') }}" enctype="multipart/form-data">
                @csrf
                <!-- head -->
                <div class="flex flex-row h-1/5 w-max gap-10">
                    <div class="flex flex-col w-56">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" placeholder="Juan" class="outline-none border shadow-sm">
                    </div>
                    <div class="flex flex-col w-56">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" placeholder="Cruz" class="outline-none border shadow-sm">
                    </div>                
                </div> 
                <!-- mid -->
                <div class="flex flex-row h-1/5 w-max">
                    <div class="flex flex-col w-96">
                        <label for="positon">School Postion</label>
                        <input type="text" name="position" placeholder="IT Instructor" class="outline-none border shadow-sm">
                    </div> 
                </div>
                <!-- bottom -->
                <div class="flex flex-row h-1/5 w-max gap-16">
                    <div class="flex flex-col w-60">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="juandelacruz@gmail.com" class="outline-none border shadow-sm">
                    </div>
                    <div class="flex flex-col w-60">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="outline-none border shadow-sm">
                    </div> 
                </div>
                <!-- button -->
                <div class="flex flex-row h-100 gap-10">
                    <div class="">
                        <button class="outline-none border-0 bg-blue-700 text-customWhite h-10 w-32 rounded">
                            {{ __('Save') }}
                        </button>
                    </div>
                    <div class="">
                        <button class="outline-none border-0 bg-red-700 text-customWhite h-10 w-32 rounded">
                            <a href="{{ route('committee.cancel') }}">
                                {{ __('Cancel') }}
                            </a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
