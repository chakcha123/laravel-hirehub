<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Job') }}
        </h2>
    </x-slot>

    <div class="py-16 bg-white ">
        <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6 ">
            <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                <div class="md:5/12 lg:w-5/12">
                    <img src="{{ asset('images/im3.jpg') }}" alt="image" loading="lazy" width="" height="" />
                </div>
                <div class="md:7/12 lg:w-6/12">
                    <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">About HireHub</h2>
                    <p class="mt-6 text-gray-600">HireHub is dedicated to connecting job seekers with their ideal
                        careers. Our mission is to simplify the job search process and provide a platform where talent
                        meets opportunity. We believe in empowering individuals to achieve their career goals.</p>
                    <p class="mt-4 text-gray-600"> Our team is committed to innovation and excellence. We continuously
                        improve our platform to ensure a seamless and efficient job search experience for all users.
                        Join HireHub and take the next step in your career journey.</p>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>
