<x-committee-layout>
    <div class="flex flex-col h-screen items-center w-full mb-50">
        <!-- Header -->
        <div class="py-5 mt-2 h-12 w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <h2 class="py-2 text-lg">
                        {{ __('Create Event')}}
                    </h2>
                    <form method="POST" action="{{ route('create.event') }}">
                        @csrf

                        <!-- Event Details -->
                        <div class="flex flex-row h-1/5 w-full border-[3px] gap-10 p-5">
                            <!-- Left -->
                            <div class="flex flex-col w-1/2 gap-5">
                                <div class="flex flex-col w-96">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" placeholder="Add Event" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm">
                                </div>
                                <div class="flex flex-col w-96">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" placeholder="Add Description" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm h-40">
                                </div>
                            </div>
                            <!-- Right -->
                            <div class="flex flex-col w-1/2 gap-5">
                                <div class="flex flex-col w-96">
                                    <label for="start_date">Day</label>
                                    <input type="date" name="start_date" placeholder="Add Event" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm">
                                </div>
                                <div class="flex flex-col w-96">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" placeholder="Add Location" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm h-14">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row items-center">
                            <!-- Add Judge -->
                            <div class="flex items-center flex-col h-1/5 w-1/2 border-[3px] p-5">
                                <div id="judge-fields-container" class="flex flex-col">
                                    <!-- Judge fields will be added here dynamically -->
                                </div>
                                <div class="flex flex-row">
                                    <button type="button" id="add-judge-btn" class="outline-none border-0 bg-green-700 text-customWhite h-10 w-32 rounded">
                                        Add Judge
                                    </button>
                                </div>
                            </div>

                            <!-- Add Contestant -->
                            <div class="flex items-center flex-col h-1/5 w-1/2 border-[3px] p-5">
                                <div id="contestant-fields-container">
                                    <!-- Contestant fields will be added here dynamically -->
                                </div>
                                <div class="flex flex-row">
                                    <button type="button" id="add-contestant-btn" class="outline-none border-0 bg-green-700 text-customWhite h-10 w-40 rounded">
                                        Add Contestant
                                    </button>
                                </div>
                            </div>
                        </div>
                         <!-- Add Criteria -->
                         <div class="flex items-center flex-col h-1/5 w-80 border-[1px] p-5">
                            <div id="criteria-fields-container">
                                <!-- Criteria fields will be added here dynamically -->
                            </div>
                            <div class="flex flex-row">
                                <button type="button" id="add-criteria-btn" class="outline-none border-0 bg-purple-700 text-customWhite h-10 w-40 rounded">
                                    Add Criteria
                                </button>
                            </div>
                        </div>
                        <div class="">
                            <button class="outline-none border-0 bg-blue-700 text-customWhite h-10 w-32 rounded">
                                {{ __('Save Event') }}
                            </button>
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
                        <div class="flex flex-col w-full">
                            <label for="username[${judgeIndex}]">Judge Name</label>
                            <input type="text" name="username[${judgeIndex}]" placeholder="Add Judge Name" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="password[${judgeIndex}]">Password</label>
                            <input type="text" name="password[${judgeIndex}]" placeholder="Password" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm ">
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
                        <div class="flex flex-col w-96">
                            <label for="fullname[${contestantIndex}]">Contestant Name</label>
                            <input type="text" name="fullname[${contestantIndex}]" placeholder="Add Contestant Name" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm">
                        </div>
                    </div>
                `;
                contestantContainer.appendChild(contestantFields);
                contestantIndex++;
            });

            addCriteriaBtn.addEventListener('click', function() {
                const criteriaFields = document.createElement('div');
                criteriaFields.innerHTML = `
                <div class="flex flex-row w-1/2 gap-5 mb-5">
                    <div class="flex flex-col w-96">
                        <label for="criteria[${criteriaIndex}]">Criteria</label>
                        <input type="text" name="criteria[${criteriaIndex}]" placeholder="Add Criteria" class="outline-none border-b-[3px] border-l border-gray-300 shadow-sm">
                        </div>
                    </div>
                `;
                criteriaContainer.appendChild(criteriaFields);
                criteriaIndex++;
            });
        });
    </script>
</x-committee-layout>
