<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Job') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 mt-10 flex items-center justify-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <form action="{{ route('jobs.update', ['job' => $job->id]) }}" method="POST">

                @csrf <!-- CSRF token for security -->
                @method('PUT')
                <!-- Job Title Section -->
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Job Title:</label>
                    <input id="title" name="title"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-blue-500"
                        placeholder="Enter job title"
                        value="{{ $job->title }}">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- location Section -->
                <div class="mb-6">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">location:</label>
                    <input id="location" name="location"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-blue-500"
                        placeholder="Enter address"
                        value="{{ $job->location }}">
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />

                </div>

                <!-- salary Section -->
                <div class="mb-6">
                    <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">salary:</label>
                    <input id="salary" name="salary"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-blue-500"
                        placeholder="Enter address"
                        value="{{ $job->salary }}">
                        <x-input-error :messages="$errors->get('salary')" class="mt-2" />

                </div>


                <!-- experience Section -->

                <div class="mb-6">

                    <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">experience:</label>
                    <input id="experience" name="experience"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address"
                        value="{{ $job->experience }}">
                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />

                </div>

                <!-- company_name Section -->

                <div class="mb-6">

                    <label for="company_name" class="block text-gray-700 text-sm font-bold mb-2">company name:</label>
                    <input id="company_name" name="company_name"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address"
                        value="{{ $job->company_name }}">
                    <x-input-error :messages="$errors->get('company_name')" class="mt-2" />

                </div>


                <!-- company_location Section -->

                <div class="mb-6">

                    <label for="company_location" class="block text-gray-700 text-sm font-bold mb-2">company
                        location:</label>
                    <input id="company_location" name="company_location"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address"
                        value="{{ $job->company_location }}">
                    <x-input-error :messages="$errors->get('company_location')" class="mt-2" />

                </div>



                <!-- company_website Section -->

                <div class="mb-6">

                    <label for="company_website" class="block text-gray-700 text-sm font-bold mb-2">company
                        website:</label>
                    <input id="company_website" name="company_website"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Enter address"
                        value="{{ $job->company_website }}">
                    <x-input-error :messages="$errors->get('company_website')" class="mt-2" />

                </div>



                <!-- Work Timing System Section -->
                <div class="mb-6">
                    <label for="timing" class="block text-gray-700 text-sm font-bold mb-2">Work Timing
                        System:</label>
                    <select id="timing" name="timing"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-blue-500">
                        <option value="full-time" @if($job->timing == 'full-time') selected @endif>Full-time</option>
                        <option value="part-time" @if($job->timing == 'part-time') selected @endif>Part-time</option>
                        <option value="flexible" @if($job->timing == 'flexible') selected @endif>Flexible</option>
                        <!-- Add more options as needed -->
                    </select>
                    <x-input-error :messages="$errors->get('timing')" class="mt-2" />

                </div>

                <!-- Job Description Section -->
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Job
                        Description:</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-blue-500"
                        placeholder="Enter job description"
                        >{{ $job->description }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                </div>



                <!-- Submit Button and Character Limit Section -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-white py-2 px-4 rounded-md transition duration-300 gap-2">
                        Update
                    </button>
                    <button
                    href="{{ route('dashboard') }}"
                    class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-white py-2 px-4 rounded-md transition duration-300 gap-2">
                    Cancle</button>
                </div>
            </form>
        </div>
    </div>




</x-app-layout>
