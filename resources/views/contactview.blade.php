<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('contact view') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4 flex items-center justify-between bg-gray-100">
            <a href="{{ route('dashboard') }}"
            class="text-xl font-semibold text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                  </svg>
                </a>



        </div>
        <div class="px-4 py-5">
            <table class="w-full text-md  text-md shadow-md rounded mb-4 rounded-lg overflow-hidden">
                <thead>
                    <tr class="border-b text-gray-600 bg-gradient-to-r from-blue-200 to-indigo-200 rounded">
                        <th class="text-left py-3 px-6">ID</th>
                        <th class="text-left py-3 px-6">name</th>
                        <th class="text-left py-3 px-6">email</th>
                        <th class="text-left py-3 px-6">number</th>
                        <th class="text-left py-3 px-6">message</th>
                        <th class="text-left py-3 px-6"></th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Repeat this block for each job -->
                    @foreach ($contacts as $contact)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="text-left py-3 px-6">{{ $contact->id }}</td>
                            <td class="text-left py-3 px-6">{{ $contact->name }}</td>
                            <td class="text-left py-3 px-6">{{ $contact->email }}</td>
                            <td class="text-left py-3 px-6">{{ $contact->number }}</td>
                            <td class="text-left py-3 px-6">{{ $contact->message }}</td>
                            <td class="text-left py-3 px-6 flex justify-end items-center">

                                <form action="{{ route('jobs.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fillRule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clipRule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="mt-8">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>


</x-app-layout>
