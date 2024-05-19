<x-app-layout>
    <style>
        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Job Details') }}
        </h2>
    </x-slot>

    <section class="section-4 bg-white">
        <div class="container py-5">
            <div class="flex items-center justify-between mb-5">
                <nav aria-label="breadcrumb" class="rounded-md p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <button onclick="goBack()" class="boder-2 border-blue-500 text-blue-400 flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                                <span>Back to Jobs</span>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <form method="POST" action="{{ route('saveJob', $jobDetail->id) }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <div class="card shadow border-0 bg-white">
                            <div class="p-4">
                                <h4 class="text-xl font-semibold text-blue-400 mb-2">{{ $jobDetail->title }}</h4>
                                <div class="flex items-center text-gray-900 mb-2">
                                    <p class="ml-1 flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        {{ $jobDetail->location }}
                                    </p>
                                </div>
                            </div>
                            <div class="border-t border-gray-300 p-4">
                                @if (!empty($jobDetail->salary))
                                <div class="mb-4">
                                    <h4 class="text-lg font-semibold text-blue-400 mb-2">Salary</h4>
                                    <p>{{ $jobDetail->salary }}</p>
                                </div>
                                @endif

                                @if (!empty($jobDetail->experience))
                                <div class="mb-4">
                                    <h4 class="text-lg font-semibold text-blue-400 mb-2">Experience</h4>
                                    <p>{{ $jobDetail->experience }}</p>
                                </div>
                                @endif

                                @if (!empty($jobDetail->description))
                                <div class="mb-4">
                                    <h4 class="text-lg font-semibold text-blue-400 mb-2">Description</h4>
                                    <p>{{ $jobDetail->description }}</p>
                                </div>
                                @endif

                                <div class="text-right">
                                    @if (Auth::check())
                                    <button type="submit" class="btn bg-blue-400 hover:bg-blue-500 text-white mr-2">Save</button>
                                    @else
                                    <a href="{{ route('login') }}" class="btn btn-primary mr-2">Login to Save</a>
                                    @endif
                                    @if (Auth::check())
                                    <button type="button" onclick="openModal()" class="btn bg-blue-50 hover:bg-blue-100">Apply</button>
                                    @else
                                    <a href="{{ route('login') }}" class="btn btn-blue">Login to Apply</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="card shadow border-0 bg-white">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-blue-400 mb-2 text-center">Job Summary</h3>
                                <ul class="border-t border-gray-300 p-4 ml-4">
                                    <li><span class="font-semibold">Published on:</span> {{ \Carbon\Carbon::parse($jobDetail->created_at)->format('d, M Y') }}</li>
                                    <li><span class="font-semibold">Timing System:</span> {{ $jobDetail->timing }}</li>
                                    <li><span class="font-semibold">Location:</span> {{ $jobDetail->location }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card shadow border-0 my-4">
                            <div class="p-4">
                                <div class="summary_header pb-1 pt-4">
                                    <h3 class="text-lg font-semibold text-blue-400 mb-1 text-center">Company Details</h3>
                                </div>

                                <div class="pt-3">
                                    <ul class="border-t border-gray-300 p-4 ml-4">
                                        <li><span class="font-semibold">Name: </span>{{$jobDetail->company_name}}</li>
                                        @if(!empty($jobDetail->company_location))
                                        <li><span class="font-semibold">Location: </span>{{$jobDetail->company_location}}</li>
                                        @endif
                                        @if(!empty($jobDetail->company_website))
                                        <li><span class="font-semibold">Website: </span><a href="{{$jobDetail->company_website}}">{{$jobDetail->company_website}}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                    style="background: rgba(0,0,0,.7); display: none;">
                    <div class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Apply for Job</p>
                                <div class="modal-close cursor-pointer z-50" onclick="modalClose()">
                                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                    </svg>
                                </div>
                            </div>
                            <!--Body-->
                            <form >
                            {{-- id="applyForm" method="POST" action="{{ route('applyJob', $jobDetail->id) }}"> --}}
                                {{-- @csrf --}}
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                        Full Name
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Your full name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                        Email
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Your email address" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                        Phone Number
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" name="phone" type="text" placeholder="Your phone number" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                                        Why are you the best candidate?
                                    </label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message" placeholder="Write a short text explaining why you are the best candidate" required></textarea>
                                </div>
                            </form>
                            <!--Footer-->
                            <div class="flex justify-end pt-2">
                                <button class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300" onclick="modalClose()">Cancel</button>
                                <button class="focus:outline-none px-4 bg-blue-400 p-3 ml-3 rounded-lg text-white hover:bg-blue-300" onclick="document.getElementById('applyForm').submit();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>

<script>
    function goBack() {
        window.history.back();
    }

    const modal = document.querySelector('.main-modal');
    const closeButton = document.querySelectorAll('.modal-close');

    const modalClose = () => {
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    }

    const openModal = () => {
        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');
        modal.style.display = 'flex';
    }

    for (let i = 0; i < closeButton.length; i++) {
        const elements = closeButton[i];
        elements.onclick = (e) => modalClose();
    }

    window.onclick = function(event) {
        if (event.target == modal) modalClose();
    }
</script>
