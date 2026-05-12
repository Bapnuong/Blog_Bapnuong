<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-slate-100 via-orange-50 to-white py-10">

        <div class="max-w-6xl mx-auto px-4">

            {{-- PROFILE HERO --}}

            <div
                class="bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 mb-10 border border-white/50"
            >

                <div
                    class="flex flex-col md:flex-row items-center md:items-start gap-10"
                >

                    {{-- AVATAR --}}

                    <div class="relative">

                        <img
                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                            class="w-40 h-40 rounded-full border-4 border-orange-400 shadow-2xl"
                        >

                        <div
                            class="absolute bottom-2 right-2 bg-green-500 w-6 h-6 rounded-full border-4 border-white"
                        ></div>

                    </div>

                    {{-- INFO --}}

                    <div class="flex-1">

                        <h1
                            class="text-5xl md:text-6xl font-black text-gray-800"
                        >

                            {{ Auth::user()->name }}

                        </h1>

                        <p
                            class="text-gray-500 mt-4 text-xl"
                        >

                            {{ Auth::user()->email }}

                        </p>

                        <p
                            class="text-gray-600 mt-5 text-lg leading-relaxed max-w-2xl"
                        >

                            Welcome to your personal profile dashboard.
                            Manage your account, security and personal information here.

                        </p>

                        {{-- STATS --}}

                        <div
                            class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8"
                        >

                            {{-- POSTS --}}

                            <div
                                class="bg-gradient-to-r from-orange-500 to-pink-500 text-white p-6 rounded-3xl shadow-xl hover:scale-105 transition"
                            >

                                <p class="text-lg opacity-90">
                                    Posts
                                </p>

                                <h2
                                    class="text-5xl font-black mt-3"
                                >

                                    {{ Auth::user()->posts->count() }}

                                </h2>

                            </div>

                            {{-- LIKES --}}

                            <div
                                class="bg-gradient-to-r from-pink-500 to-red-500 text-white p-6 rounded-3xl shadow-xl hover:scale-105 transition"
                            >

                                <p class="text-lg opacity-90">
                                    Likes
                                </p>

                                <h2
                                    class="text-5xl font-black mt-3"
                                >

                                    {{ Auth::user()->likes->count() }}

                                </h2>

                            </div>

                            {{-- COMMENTS --}}

                            <div
                                class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white p-6 rounded-3xl shadow-xl hover:scale-105 transition"
                            >

                                <p class="text-lg opacity-90">
                                    Comments
                                </p>

                                <h2
                                    class="text-5xl font-black mt-3"
                                >

                                    {{ Auth::user()->comments->count() }}

                                </h2>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- SETTINGS --}}

            <div class="space-y-10">

                {{-- UPDATE PROFILE --}}

                <div
                    class="bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 border border-white/50"
                >

                    <div class="mb-8">

                        <h2
                            class="text-4xl font-black text-gray-800"
                        >

                            Profile Information

                        </h2>

                        <p
                            class="text-gray-500 mt-2 text-lg"
                        >

                            Update your personal information and email address.

                        </p>

                    </div>

                    @include(
                        'profile.partials.update-profile-information-form'
                    )

                </div>

                {{-- PASSWORD --}}

                <div
                    class="bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 border border-white/50"
                >

                    <div class="mb-8">

                        <h2
                            class="text-4xl font-black text-gray-800"
                        >

                            Security

                        </h2>

                        <p
                            class="text-gray-500 mt-2 text-lg"
                        >

                            Change your password to keep your account secure.

                        </p>

                    </div>

                    @include(
                        'profile.partials.update-password-form'
                    )

                </div>

                {{-- DELETE ACCOUNT --}}

                <div
                    class="bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 border border-red-100"
                >

                    <div class="mb-8">

                        <h2
                            class="text-4xl font-black text-red-500"
                        >

                            Danger Zone

                        </h2>

                        <p
                            class="text-gray-500 mt-2 text-lg"
                        >

                            Permanently delete your account and all data.

                        </p>

                    </div>

                    @include(
                        'profile.partials.delete-user-form'
                    )

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
