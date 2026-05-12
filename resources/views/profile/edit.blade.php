<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-orange-50 to-white py-10">

    <div class="max-w-5xl mx-auto px-4">

        {{-- PROFILE HERO --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-10
                mb-10
                border border-white/50
            "
        >

            <div class="flex items-center gap-8">

                {{-- AVATAR --}}

                @if(auth()->user()->avatar)

                    <img
                        src="{{ asset('storage/' . auth()->user()->avatar) }}"
                        class="
                            w-36
                            h-36
                            rounded-full
                            object-cover
                            border-4
                            border-orange-400
                            shadow-xl
                        "
                    >

                @else

                    <img
                        src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                        class="
                            w-36
                            h-36
                            rounded-full
                            border-4
                            border-orange-400
                            shadow-xl
                        "
                    >

                @endif

                {{-- INFO --}}

                <div>

                    <h1
                        class="
                            text-5xl
                            font-black
                            text-gray-800
                            mb-3
                        "
                    >

                        {{ auth()->user()->name }}

                    </h1>

                    <p
                        class="
                            text-gray-500
                            text-xl
                            mb-6
                        "
                    >

                        {{ auth()->user()->email }}

                    </p>

                    {{-- STATS --}}

                    <div class="flex gap-5">

                        <div
                            class="
                                bg-orange-100
                                px-6
                                py-4
                                rounded-2xl
                            "
                        >

                            <p class="text-gray-500">
                                Posts
                            </p>

                            <h2
                                class="
                                    text-3xl
                                    font-black
                                    text-orange-500
                                "
                            >

                                {{ auth()->user()->posts->count() }}

                            </h2>

                        </div>

                        <div
                            class="
                                bg-pink-100
                                px-6
                                py-4
                                rounded-2xl
                            "
                        >

                            <p class="text-gray-500">
                                Likes
                            </p>

                            <h2
                                class="
                                    text-3xl
                                    font-black
                                    text-pink-500
                                "
                            >

                                {{ auth()->user()->likes->count() }}

                            </h2>

                        </div>

                        <div
                            class="
                                bg-blue-100
                                px-6
                                py-4
                                rounded-2xl
                            "
                        >

                            <p class="text-gray-500">
                                Comments
                            </p>

                            <h2
                                class="
                                    text-3xl
                                    font-black
                                    text-blue-500
                                "
                            >

                                {{ auth()->user()->comments->count() }}

                            </h2>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- UPLOAD AVATAR --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-8
                mb-10
                border border-white/50
            "
        >

            <h2
                class="
                    text-3xl
                    font-black
                    text-gray-800
                    mb-6
                "
            >

                Upload Avatar 📸

            </h2>

            <form
                action="/profile/avatar"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <input
                    type="file"
                    name="avatar"
                    class="
                        w-full
                        bg-gray-100
                        rounded-2xl
                        p-5
                        text-lg
                        border-0
                        mb-5

                        file:mr-4
                        file:py-3
                        file:px-6
                        file:rounded-2xl
                        file:border-0
                        file:text-sm
                        file:font-bold
                        file:bg-orange-500
                        file:text-white
                    "
                >

                <button
                    class="
                        bg-gradient-to-r
                        from-orange-500
                        to-pink-500
                        text-white
                        px-8
                        py-4
                        rounded-2xl
                        shadow-xl
                        font-bold
                    "
                >

                    Upload Avatar

                </button>

            </form>

        </div>

        {{-- PROFILE INFO --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-8
                mb-10
                border border-white/50
            "
        >

            @include(
                'profile.partials.update-profile-information-form'
            )

        </div>

        {{-- PASSWORD --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-8
                mb-10
                border border-white/50
            "
        >

            @include(
                'profile.partials.update-password-form'
            )

        </div>

        {{-- DELETE ACCOUNT --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-8
                border border-white/50
            "
        >

            @include(
                'profile.partials.delete-user-form'
            )

        </div>

    </div>

</div>

</x-app-layout>
