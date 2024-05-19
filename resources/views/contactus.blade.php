<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Job') }}
        </h2>
    </x-slot>

    <div>

        <form class="form bg-white p-4 my-6 relative w-11/12 mx-auto"  method="POST"
             action='{{ route('contact.create') }}''>
            @csrf
            {{-- @if ($successMessage)
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ $successMessage }}</span>
            </div>
            @endif --}}
            <h3 class="text-xl text-gray-900 font-semibold">Let us call you!</h3>
            <p class="text-gray-600">To help you choose your property</p>
            <div class="flex space-x-3 mt-2">
                <input
                    type="text"
                    name="name"
                    placeholder="Your Name"
                    class="border p-2 w-1/2"
                    value="{{ old('name') }}"
                />

                @error('name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input
                    type="tel"
                    name="number"
                    placeholder="Your Number"
                    class="border p-2 w-1/2"
                    value="{{ old('number') }}"
                />

                @error('number')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>
            <input
                type="email"
                name="email"
                placeholder="Your Email"
                class="border p-2 w-full mt-2"
                value="{{ old('email') }}"
            />

            @error('email')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <textarea
                name="message"
                cols="10"
                rows="3"
                placeholder="Tell us about desired property"
                class="border p-2 mt-2 w-full"
            >{{ old('message') }}</textarea>

            @error('message')
            <span class="text-red-500">{{ $message }}</span>
            @enderror


            <input
                type="submit"
                value="Submit"
                class="w-full mt-4 bg-blue-600 hover:bg-blue-500 text-white font-semibold p-2"
            />
        </form>

    </div>

</x-app-layout>
