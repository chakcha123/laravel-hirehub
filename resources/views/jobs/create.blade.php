<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Job') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 mt-10 flex items-center justify-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <form action="{{ route('jobs.store') }}" method="POST">

                @csrf <!-- CSRF token for security -->

                <!-- Job Title Section -->
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Job Title:</label>
                    <input id="title" name="title"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter job title">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- location Section -->
                <div class="mb-6">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">location:</label>
                    <input id="location" name="location"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address">
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />

                </div>

                <!-- salary Section -->

                <div class="mb-6">

                    <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">salary:</label>
                    <input id="salary" name="salary"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address">
                    <x-input-error :messages="$errors->get('salary')" class="mt-2" />

                </div>

                <!-- experience Section -->

                <div class="mb-6">

                    <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">experience:</label>
                    <input id="experience" name="experience"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address">
                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />

                </div>

                <!-- company_name Section -->

                <div class="mb-6">

                    <label for="company_name" class="block text-gray-700 text-sm font-bold mb-2">company name:</label>
                    <input id="company_name" name="company_name"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address">
                    <x-input-error :messages="$errors->get('company_name')" class="mt-2" />

                </div>


                <!-- company_location Section -->

                <div class="mb-6">

                    <label for="company_location" class="block text-gray-700 text-sm font-bold mb-2">company
                        location:</label>
                    <input id="company_location" name="company_location"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address">
                    <x-input-error :messages="$errors->get('company_location')" class="mt-2" />

                </div>



                <!-- company_website Section -->

                <div class="mb-6">

                    <label for="company_website" class="block text-gray-700 text-sm font-bold mb-2">company
                        website:</label>
                    <input id="company_website" name="company_website"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address">
                    <x-input-error :messages="$errors->get('company_website')" class="mt-2" />

                </div>


                <!-- Work Timing System Section -->
                <div class="mb-6">
                    <label for="timing" class="block text-gray-700 text-sm font-bold mb-2">Work Timing
                        System:</label>
                    <select id="timing" name="timing"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-blue-500">
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="flexible">Flexible</option>
                        <!-- Add more options as needed -->
                    </select>
                    <x-input-error :messages="$errors->get('timing')" class="mt-2" />

                </div>

                <!-- Job Description Section -->
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Job
                        Description:</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter job description"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />

                </div>



                <!-- Submit Button and Character Limit Section -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-white py-2 px-4 rounded-md transition duration-300 gap-2">
                        Post
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                            id="send" fill="#fff">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path
                                d="M3.4 20.4l17.45-7.48c.81-.35.81-1.49 0-1.84L3.4 3.6c-.66-.29-1.39.2-1.39.91L2 9.12c0 .5.37.93.87.99L17 12 2.87 13.88c-.5.07-.87.5-.87 1l.01 4.61c0 .71.73 1.2 1.39.91z">
                            </path>
                        </svg>
                    </button>
                    <span class="text-gray-500 text-sm">Max 280 characters</span>
                </div>
            </form>
        </div>
    </div>




</x-app-layout>
