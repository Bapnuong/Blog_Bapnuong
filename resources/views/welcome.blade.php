<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-orange-50 to-white py-10">

    <div class="max-w-7xl mx-auto px-4">

        {{-- HERO --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-10
                mb-10
                border border-white/50
                text-center
            "
        >

            <h1
                class="
                    text-6xl
                    font-black
                    text-gray-800
                    mb-6
                "
            >

                Welcome To BapBlog ✨

            </h1>

            <p
                class="
                    text-xl
                    text-gray-500
                    max-w-3xl
                    mx-auto
                    leading-relaxed
                "
            >

                Share your stories, ideas, travel experiences,
                technology thoughts, and connect with everyone.

            </p>

            <div class="mt-8 flex justify-center gap-5">

                <a
                    href="/dashboard"
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
                        hover:scale-105
                        transition
                    "
                >

                    Explore Posts

                </a>
                @if(!auth()->check())
                <a
                    href="/login"
                    class="
                        bg-white
                        text-gray-800
                        px-8
                        py-4
                        rounded-2xl
                        shadow-xl
                        font-bold
                        hover:scale-105
                        transition
                    "
                >

                    Login

                </a>
                @endif

            </div>

        </div>

        {{-- POSTS --}}

        <div class="space-y-8">

            @foreach($posts as $post)

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

                    {{-- HEADER --}}

                    <div
                        class="
                            flex
                            items-center
                            gap-4
                            mb-6
                        "
                    >

                        @if($post->user->avatar)

                            <img
                                src="{{ asset('storage/' . $post->user->avatar) }}"
                                class="
                                    w-16
                                    h-16
                                    rounded-full
                                    object-cover
                                    border-2
                                    border-orange-400
                                "
                            >

                        @else

                            <img
                                src="https://ui-avatars.com/api/?name={{ $post->user->name }}"
                                class="
                                    w-16
                                    h-16
                                    rounded-full
                                    border-2
                                    border-orange-400
                                "
                            >

                        @endif

                        <div>

                            <h2
                                class="
                                    text-3xl
                                    font-black
                                    text-gray-800
                                "
                            >

                                {{ $post->title }}

                            </h2>

                            <p class="text-gray-500 mt-1">

                                By {{ $post->user->name }}

                            </p>

                        </div>

                    </div>

                    {{-- IMAGE --}}

                    @if($post->image)

                        <img
                            src="{{ asset('storage/' . $post->image) }}"
                            class="
                                w-full
                                rounded-3xl
                                mb-6
                                max-h-[500px]
                                object-cover
                            "
                        >

                    @endif

                    {{-- CONTENT --}}

                    <p
                        class="
                            text-gray-700
                            text-lg
                            leading-relaxed
                        "
                    >

                        {{ Str::limit($post->content, 300) }}

                    </p>

                </div>

            @endforeach

        </div>

    </div>

</div>

</x-app-layout>
