<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
    </x-slot>


    <div class=" flex flex-col jus items-center justify-center overflow-hidden  p-6 sm:py-1 mt-10 bg-white">


        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class='flex flex-wrap justify-center '>
            <div class="my-12 grid sm:grid-cols-1 md:grid-cols-2 sw:grid-cols-3 gap-3">
                @foreach ($jobs as $job)
                    <div
                        class="bg-white m-1 shadow-xl shadow-gray-100 w-full max-w-4xl flex flex-col sm:flex-row gap-3 sm:items-center  justify-between px-5 py-4 rounded-md border-2 border-gray-200">
                        <div>
                            <span class="text-blue-500 text-sm">{{ $job->title }}</span>
                            <h3 class="font-bold mt-px">{{ $job->description }}</h3>
                            <div class="flex items-center gap-3 mt-2">
                                <span
                                    class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm">{{ $job->timing }}</span>
                                <span class="text-slate-600 text-sm flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg> {{ $job->location }}
                                </span>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('job.details',$job->id) }}" >
                                <button
                                    class="bg-blue-100 text-blue-400 font-medium px-4 py-2 rounded-md flex items-center justify-center transition duration-300 ease-in-out hover:bg-blue-200 focus:outline-none">
                                    Details
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="my-8 ">
            {{ $jobs->links() }}
        </div>

    </div>




</x-app-layout>
