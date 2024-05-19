<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Job') }}
        </h2>
    </x-slot>



    <section class="h-[450px] flex bg-cover bg-center bg-no-repeat bg-gray-900 text-gray-300 items-center" style="background-image: url('{{asset('images/banner.jpg')}}');">

    </section>




    <div class="grid min-h-[140px] w-screen place-items-center overflow-x-scroll rounded-lg p-6 md:overflow-visible">
        <div class="relative flex md:flex-row flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div
                class="relative w-full md:w-4/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none md:rounded-r rounded-t-xl md:rounded-xl bg-clip-border">
                <img src="{{ asset('images/img0.jpg') }}" alt="image" class="object-cover w-full h-full" />
                <!-- Black Friday Mega Offer -->
                <div
                    class="absolute inset-0 flex items-center justify-center text-white bg-black bg-opacity-75 rounded-xl">
                    <h2 class="text-4xl xl:text-6xl font-bold text-center">HireHub <br />
                        <span class="text-blue-500"> Your Future Awaits </span>
                    </h2>
                </div>
                <!-- End Black Friday Mega Offer -->
            </div>
            <div class="p-6 my-auto">
                <h6
                    class="xl:text-3xl block mb-4 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-500 uppercase">
                    Startups
                </h6>
                <h4
                    class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 xl:text-4xl">
                    Your Path to Career Success Starts Here
                </h4>
                <p class="block mb-8 font-sans text-base antialiased font-normal leading-relaxed text-gray-700 xl:text-2xl">
                    Discover your dream job with our user-friendly Job Finder website.
                    Easily search, apply, and get hiblue. Unlock endless career opportunities
                    and connect with top employers today. Start your journey towards a
                    better future now!
                </p>
                <a class="text-decoration-none inline-block">
                    <button onclick="scrollToSession('jobs')"
                        class="xl:text-2xl flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all rounded-lg select-none hover:bg-blue-500/10 active:bg-blue-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button">
                        Apply Now
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true" class="xl:w-8 h-8 w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>


    <div class="py-16 bg-white">
        <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-2">
            <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12 xl:gap-20">
                <div class="md:5/12 lg:w-8/12">
                    <img src="{{ asset('images/im2.jpg') }}" alt="image" loading="lazy" width=""
                        height="" />
                </div>
                <div class="md:7/12 lg:w-8/12">
                    <h2 class="text-2xl text-gray-900 font-bold md:text-4xl lg:text-5xl">How It Works for Job Seekers</h2>
                    <p class="mt-6 text-gray-600 lg:text-2xl"> Our streamlined process makes finding your next job easy. Simply
                        create a profile, browse available positions,
                        and apply with a single click. Let employers discover your talents and connect with you directly
                        for interviews.</p>
                    <p class="mt-4 text-gray-600  lg:text-2xl">With HireHub, your dream job is just a few clicks away.
                        Start your journey to a fulfilling career today!</p>
                </div>
            </div>
        </div>
    </div>


    <div class="py-16 bg-white">
        <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
            <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12 xl:gap-20">

                <div class="md:7/12 lg:w-8/12">
                    <h2 class="text-2xl text-gray-900 font-bold md:text-4xl lg:text-5xl">Benefits of Using HireHub</h2>
                    <p class="mt-6 text-gray-600  lg:text-2xl">Discover the advantages of using HireHub for your job search. Our
                        platform offers personalized job recommendations,
                        a user-friendly interface, and direct connections to top employers. Maximize your chances of
                        landing the perfect job.</p>
                    <p class="mt-4 text-gray-600  lg:text-2xl"> Enjoy seamless job hunting with HireHub. Save time and effort
                        while finding the right career opportunity
                        for you. Start exploring today!</p>
                </div>
                <div class="md:5/12 lg:w-8/12">
                    <img src="{{ asset('images/im1.jpg') }}" alt="image" loading="lazy" width=""
                        height="" />
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white pb-10 px-4" id="jobs">
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
                            <a href="{{ route('job.details', $job->id) }}">
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

        <div class="my-8 px-10">
            {{ $jobs->links() }}
        </div>
    </div>

    <div class="bg-white">
        <section class="text-gray-700">
            <div class="container px-5 py-5  mx-auto">
                <div class="text-center mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4">
                        Frequently Asked Question
                    </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
                        The most common questions about how our business works and what
                        can do for you.
                    </p>
                </div>
                <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                    <div class="w-full lg:w-1/2 px-4 py-2">
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                How do I search for jobs on your platform?
                            </summary>

                            <span>
                                You can search for jobs by entering keywords, selecting job
                                categories, and filtering by location, salary, and job type
                                on our homepage. You can also create job alerts to receive
                                notifications about new job listings matching your preferences.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold bg-gray-200 rounded-md py-2 px-4">
                                Can I apply for jobs directly through your platform?
                            </summary>

                            <span>
                                Yes, you can apply for jobs directly through our platform.
                                Simply click on the job listing you're interested in, and
                                you'll find instructions on how to apply, including any
                                required documents or application forms.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                Is my personal information secure on your platform?
                            </summary>

                            <span>
                                Yes, we take the security and privacy of your personal
                                information seriously. Our platform uses encryption and
                                other security measures to protect your data. We also
                                adhere to strict privacy policies to ensure your information
                                is not shared without your consent.
                            </span>
                        </details>
                    </div>
                    <div class="w-full lg:w-1/2 px-4 py-2">
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                How can I edit my profile or resume on your platform?
                            </summary>

                            <span class="px-4 py-2">
                                You can edit your profile and upload or update your resume
                                in the "Profile" section of your account dashboard. Simply
                                log in to your account, navigate to the "Profile" tab, and
                                click on the edit button next to the section you want to modify.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                Can I save job listings for later viewing?
                            </summary>

                            <span class="px-4 py-2">
                                Yes, you can save job listings to your account for later viewing.
                                Simply click on the "Save" button next to any job listing,
                                and it will be added to your saved jobs list, accessible from
                                your account dashboard.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                How can I contact support if I have a question or issue?
                            </summary>

                            <span class="px-4 py-2">
                                If you have any questions or encounter any issues while using
                                our platform, you can contact our customer support team via
                                email at chakcah20@gmail.com or through the contact form on
                                our website. We're here to help!
                            </span>
                        </details>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <script>
        function scrollToSession(sessionId) {
            var session = document.getElementById(sessionId);
            session.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

</x-app-layout>
