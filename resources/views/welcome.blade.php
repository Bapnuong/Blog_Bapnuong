<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BapBlog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-100 via-orange-50 to-white">

<div class="min-h-screen py-10">

    <div class="max-w-5xl mx-auto px-4">

        {{-- HERO SECTION --}}

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
                    text-5xl
                    md:text-6xl
                    font-black
                    text-gray-800
                    mb-6
                "
            >
                Welcome To BapBlog ✨
            </h1>

            <p
                class="
                    text-lg
                    md:text-xl
                    text-gray-500
                    max-w-3xl
                    mx-auto
                    leading-relaxed
                "
            >
                Share your stories, ideas, travel experiences,
                technology thoughts, and connect with everyone.
            </p>

            <div class="mt-8 flex justify-center gap-5 flex-wrap">

                @if(auth()->check())

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
                        Dashboard
                    </a>

                @else

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

                    <a
                        href="/register"
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
                        Register
                    </a>

                @endif

            </div>

        </div>

        {{-- POSTS FEED --}}

        <div class="space-y-8">

            @foreach($posts as $post)

                <a href="/posts/{{ $post->id }}" class="block">

                    <div
                        class="
                            bg-white/80
                            backdrop-blur-xl
                            rounded-[35px]
                            shadow-xl
                            p-8
                            border border-white/50

                            hover:-translate-y-1
                            hover:shadow-2xl

                            transition
                            duration-300
                        "
                    >

                        {{-- HEADER --}}

                        <div class="flex items-center gap-4 mb-6">

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
                                        text-2xl
                                        md:text-3xl
                                        font-black
                                        text-gray-800
                                    "
                                >
                                    {{ $post->title }}
                                </h2>

                                <div class="flex items-center gap-2 mt-1">

                                    <p class="text-gray-500 text-sm">
                                        By {{ $post->user->name }}
                                    </p>

                                    <span class="text-gray-300">•</span>

                                    <p class="text-gray-400 text-sm">
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>

                                </div>

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
                                mb-6
                            "
                        >
                            {{ Str::limit($post->content, 180) }}
                        </p>

                        {{-- STATS --}}

                        <div class="flex items-center gap-6">

                            <div
                                class="
                                    bg-pink-100
                                    text-pink-500
                                    px-4
                                    py-2
                                    rounded-xl
                                    font-semibold
                                    text-sm
                                "
                            >
                                ❤️ {{ $post->likes->count() }} Likes
                            </div>

                            <div
                                class="
                                    bg-blue-100
                                    text-blue-500
                                    px-4
                                    py-2
                                    rounded-xl
                                    font-semibold
                                    text-sm
                                "
                            >
                                💬 {{ $post->comments->count() }} Comments
                            </div>

                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</div>

</body>
</html>
