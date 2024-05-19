<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saved Jobs') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4 flex items-center justify-between bg-gray-100">
            <h1 class="text-xl font-semibold text-gray-800">Saved Jobs</h1>

        </div>
        <div class="px-4 py-5">
            @if ($savedjobs->isEmpty())
            <p class="text-center text-gray-500">No saved jobs found.</p>
           @else
            <table class="w-full text-md bg-white border-collapse">
                <thead>
                    <tr class="border-b text-gray-600 bg-gray-100">
                        <th class="text-left py-3 px-6">Job Title</th>
                        <th class="text-left py-3 px-6">Location</th>
                        <th class="text-left py-3 px-6">Work Hours</th>
                        <th class="text-left py-3 px-6">Job Description</th>
                        <th class="text-left py-3 px-6"></th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Repeat this block for each job -->
                    @foreach ($savedjobs as $savedjob)
                    <form method="POST" action="{{ route('removeSavedJob', $savedjob->id) }}">

                        @csrf
                        @method('POST')
                        <tr class="border-b hover:bg-gray-50">
                            <td class="text-left py-3 px-6">{{ $savedjob->job->title }}</td>
                            <td class="text-left py-3 px-6">{{ $savedjob->job->location }}</td>
                            <td class="text-left py-3 px-6">{{ $savedjob->job->timing }}</td>
                            <td class="text-left py-3 px-6">{{ $savedjob->job->description }}</td>
                            <td class="text-left py-3 px-6 flex justify-end items-center">
                                <button type="submit"
                                    class="text-sm text-red-500 hover:text-red-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fillRule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </form>
                    @endforeach

                </tbody>
            </table>
            @endif

            <div class="mt-8">
                {{ $savedjobs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>




