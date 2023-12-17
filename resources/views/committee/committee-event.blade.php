<x-committee-layout>
    <div class="flex flex-col h-screen items-center w-full">
        <!-- Header -->
        <div class="py-5 mt-2 h-12 w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex w-full justify-start mb-5">
                    <h2 class="py-2 text-lg">
                        {{ __('Create New Event')}}
                    </h2>
                </div>
                <div class="flex flex-col bg-white overflow-hidden shadow-2xl sm:rounded-lg">
                    <form method="POST" action="{{ route('create.event') }}">
                        @csrf
                        
                        <!-- Event Details -->
                        <div class="flex flex-row h-4/6 w-full gap-10 p-3 mt-50">
                            <!-- Left -->
                            <div class="flex flex-col items-center justify-center w-1/2 gap-5">
                                <div class="flex flex-col w-96">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" placeholder="Add Event" class="outline-none border-solid border-white shadow-2xl">
                                </div>
                                <div class="flex flex-col w-96">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" placeholder="Description" class="outline-none border-white shadow-2xl">
                                </div>
                                <div id="contestant-fields-container" class="flex flex-col items-center justify-center mx-auto mt-5">
                                    <!-- Contestant fields will be added here dynamically -->
                                </div>
                                <div class="flex flex-row items-center justify-center">
                                    <button type="button" id="add-contestant-btn" class="bg-white text-blue-500 h-10 w-40 rounded border border-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none">
                                        Add Contestant
                                    </button>
                                </div>
                                <div id="add-criteria-section" class="flex flex-col gap-10 p-5 w-96">
                                    <div id="criteria-fields-container" class="flex flex-wrap items-center justify-center">
                                        <!-- Criteria fields will be added here dynamically -->
                                    </div>
                                    <div class="flex flex-row items-center justify-center">
                                        <button type="button" id="add-criteria-btn" class="bg-white text-blue-500 h-10 w-32 rounded border border-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none">
                                            Add Criteria
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Right -->
                            <div class="flex flex-col w-1/2 gap-5">
                                <div class="flex flex-col w-96">
                                    <label for="start_date">Date</label>
                                    <input type="date" name="start_date" placeholder="Date" class="outline-none border-white shadow-2xl">
                                </div>
                                <div class="flex flex-col w-96">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" placeholder="Location" class="outline-none border-white shadow-2xl">
                                </div>
                                <div id="judge-fields-container" class="flex flex-col items-center justify-center mt-5">
                                        <!-- Judge fields will be added here dynamically -->
                                </div>
                                <div class="flex flex-row items-center justify-center">
                                    <button type="button" id="add-judge-btn" class="bg-white text-blue-500 h-10 w-32 rounded border border-blue-500 hover:bg-blue-500 hover:text-white focus:outline-none">
                                        Add Judge
                                    </button>
                                </div>
                                <div class="flex items-center justify-center mr-3.5 mt-12 gap-5">
                                    <button class="outline-none border border-blue-500 shadow-2xl h-10 w-32 rounded">
                                        <a href="{{ route('event.cancel') }}" class="text-blue-500">
                                            {{ __('Cancel') }}
                                        </a>
                                    </button>                             
                                    <button class="outline-none border-0 bg-blue-700 text-white h-10 w-32 rounded">
                                        {{ __('Save Event') }}
                                    </button>                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const judgeContainer = document.getElementById('judge-fields-container');
            const addJudgeBtn = document.getElementById('add-judge-btn');
            const contestantContainer = document.getElementById('contestant-fields-container');
            const addContestantBtn = document.getElementById('add-contestant-btn');
            const criteriaContainer = document.getElementById('criteria-fields-container');
            const addCriteriaBtn = document.getElementById('add-criteria-btn');

            let criteriaIndex = 0;
            let contestantIndex = 0;
            let judgeIndex = 0;

            addJudgeBtn.addEventListener('click', function() {
                const judgeFields = document.createElement('div');
                judgeFields.innerHTML = `
                    <div class="flex flex-row w-1/2 gap-5 mb-5">
                        <div class="flex flex-col w-full mx-auto">
                            <label for="username[${judgeIndex}]">Judge Name</label>
                            <input type="text" name="username[${judgeIndex}]" placeholder="Add Judge Name" class="outline-none border-blue-500 shadow-2xl">
                        </div>
                        <div class="flex flex-col w-full mx-auto">
                            <label for="password[${judgeIndex}]">Password</label>
                            <input type="text" name="password[${judgeIndex}]" placeholder="Password" class="outline-none border-blue-500 shadow-2xl">
                        </div>
                    </div>
                `;
                judgeContainer.appendChild(judgeFields);
                judgeIndex++;
            });

            addContestantBtn.addEventListener('click', function() {
                const contestantFields = document.createElement('div');
                contestantFields.innerHTML = `
                    <div class="flex flex-row w-1/2 gap-5 mb-5">
                        <div class="flex flex-col flex-wrap w-96">
                            <label for="fullname[${contestantIndex}]">Contestant/Group Name</label>
                            <input type="text" name="fullname[${contestantIndex}]" placeholder="Add Contestant Name" class="outline-none border-blue-500 shadow-sm">
                        </div>
                    </div>
                `;
                contestantContainer.appendChild(contestantFields);
                contestantIndex++;
            });


            addCriteriaBtn.addEventListener('click', function() {
                const criteriaFields = document.createElement('div');
                criteriaFields.innerHTML = `
                    <div class="flex flex-row w-full gap-5 mb-5">
                        <div class="flex flex-col w-48">
                            <label for="criteria[${criteriaIndex}]">Criteria</label>
                            <input type="text" name="criteria[${criteriaIndex}]" placeholder="Add Criteria" class="outline-none border-blue-500 shadow-2xl">
                        </div>
                        <div class="flex flex-col w-48">
                            <label for="points[${criteriaIndex}]">Points</label>
                            <input type="text" name="points[${criteriaIndex}]" placeholder="Add Points" class="outline-none border-blue-500 shadow-2xl">
                        </div>
                    </div>
                `;
                criteriaContainer.appendChild(criteriaFields);
                criteriaIndex++;
            });

        });
    </script>
</x-committee-layout>
