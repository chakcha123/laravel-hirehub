<section>
    <div class="xs:w-full mx-auto shadow-2xl p-4 rounded-xl h-fit self-center">
        <form action="{{ route('profile.update') }}" method="post" encType="multipart/form-data">
            @csrf
            @method('patch')
            <!-- Cover Image -->
            <div class="w-full rounded-sm bg-cover bg-center bg-no-repeat items-center" style="background-image: url('{{ $user->profile_banner ? asset('storage/' . $user->profile_banner) : 'https://images.unsplash.com/photo-1449844908441-8829872d2607?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw2fHxob21lfGVufDB8MHx8fDE3MTA0MDE1NDZ8MA&ixlib=rb-4.0.3&q=80&w=1080' }}');">
                <!-- Profile Image -->
                <div class="mx-auto flex justify-center w-[141px] h-[141px] bg-white rounded-full bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : 'https://images.pexels.com/photos/171945/pexels-photo-171945.jpeg?auto=compress&cs=tinysrgb&w=600' }}');">                    <div class="bg-white rounded-full w-6 h-6 text-center ml-28 mt-4">
                        <input type="file" name="profile_pic" id="profile_pic" hidden>
                        <label for="profile_pic">
                            <svg data-slot="icon" class="w-6 h-5 text-blue-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"></path>
                            </svg>
                        </label>
                    </div>
                </div>
                <div class="flex justify-end">
                    <input type="file" name="profile_banner" id="profile_banner" hidden>
                    <div class="bg-white flex items-center gap-1 rounded-tl-md px-2 text-center font-semibold">
                        <label for="profile_banner" class="inline-flex items-center gap-1 cursor-pointer">Cover
                            <svg data-slot="icon" class="w-6 h-5 text-blue-700" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"></path>
                            </svg>
                        </label>
                    </div>
                </div>
            </div>
            <h2 class="text-center mt-1 font-semibold">Upload Profile and Cover Image</h2>
            <a href="{{ route('sevedjobs')}}"
                class="text-decoration-none text-sm text-blue-400 hover:text-blue-500 focus:outline-none text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                  </svg>


            </a>
            <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">

                <div class="w-full mt-6">
                    <label for="name" class="mb-2">First Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-2 p-4 w-full border-2 rounded-lg" placeholder="First Name">
                </div>
                <div class="w-full mt-6">
                    <label for="last_name" class="mb-2">First Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="mt-2 p-4 w-full border-2 rounded-lg" placeholder="First Name">
                </div>

            </div>
            <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                <div class="w-full mt-6">
                    <label for="sex" class="mb-2">Sex</label>
                    <select id="sex" name="sex" class="w-full text-grey border-2 rounded-lg p-4 pl-2 pr-2">
                        <option disabled selected>Select Sex</option>
                        <option value="Male" {{ $user->sex == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $user->sex == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="w-full mt-6">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" id="email" name="email" class="text-grey p-4 w-full border-2 rounded-lg" placeholder="Email" value="{{ $user->email }}">
                </div>
            </div>

            <div class="w-full rounded-lg bg-blue-500 mt-4 text-white text-lg font-semibold">
                <button type="submit" class="w-full p-3">Submit</button>
            </div>

        </form>
    </div>
</section>
