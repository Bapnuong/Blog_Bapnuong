@php
    use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>BapBlog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-100 via-orange-50 to-white scroll-smooth">

<div class="min-h-screen py-6 md:py-10">

    <div class="max-w-5xl mx-auto px-3 sm:px-4">

        {{-- HERO SECTION --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[30px]
                md:rounded-[35px]
                shadow-2xl
                p-5 md:p-10
                mb-8 md:mb-10
                border border-white/50
                text-center
            "
        >

            <h1
                class="
                    text-3xl
                    sm:text-4xl
                    md:text-6xl
                    font-black
                    text-gray-800
                    mb-4 md:mb-6
                    leading-tight
                "
            >
                Welcome To BapBlog ✨
            </h1>

            <p
                class="
                    text-base
                    sm:text-lg
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

            <div
                class="
                    mt-6 md:mt-8
                    flex
                    justify-center
                    gap-3 md:gap-5
                    flex-wrap
                "
            >

                @if(auth()->check())

                    <a
                        href="/dashboard"
                        class="
                            bg-gradient-to-r
                            from-orange-500
                            to-pink-500
                            text-white
                            px-5 py-3
                            md:px-8 md:py-4
                            rounded-2xl
                            shadow-xl
                            font-bold
                            hover:scale-105
                            transition
                            text-sm md:text-base
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
                            px-5 py-3
                            md:px-8 md:py-4
                            rounded-2xl
                            shadow-xl
                            font-bold
                            hover:scale-105
                            transition
                            text-sm md:text-base
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
                            px-5 py-3
                            md:px-8 md:py-4
                            rounded-2xl
                            shadow-xl
                            font-bold
                            hover:scale-105
                            transition
                            text-sm md:text-base
                        "
                    >
                        Register
                    </a>

                @endif

            </div>

        </div>

        {{-- POSTS FEED --}}

        <div class="space-y-6 md:space-y-8">

            @foreach($posts as $post)

                <a
                    href="/posts/{{ $post->id }}"
                    class="block"
                >

                    <div
                        class="
                            bg-white/80
                            backdrop-blur-xl
                            rounded-[30px]
                            md:rounded-[35px]
                            shadow-xl
                            p-5 md:p-8
                            border border-white/50

                            hover:-translate-y-1
                            hover:shadow-2xl

                            transition
                            duration-300
                        "
                    >

                        {{-- HEADER --}}

                        <div
                            class="
                                flex
                                flex-col
                                sm:flex-row
                                sm:items-center
                                gap-4
                                mb-5 md:mb-6
                            "
                        >

                            @if($post->user && $post->user->avatar)

                                <img
                                    src="{{ asset('storage/' . $post->user->avatar) }}"
                                    loading="lazy"
                                    class="
                                        w-14 h-14
                                        md:w-16 md:h-16
                                        rounded-full
                                        object-cover
                                        border-2
                                        border-orange-400
                                    "
                                >

                            @else

                                <img
                                    src="https://ui-avatars.com/api/?name={{ $post->user->name ?? 'Unknown' }}"
                                    loading="lazy"
                                    class="
                                        w-14 h-14
                                        md:w-16 md:h-16
                                        rounded-full
                                        border-2
                                        border-orange-400
                                    "
                                >

                            @endif

                            <div class="w-full">

                                <h2
                                    class="
                                        text-xl
                                        sm:text-2xl
                                        md:text-3xl
                                        font-black
                                        text-gray-800
                                        leading-tight
                                    "
                                >
                                    {{ $post->title }}
                                </h2>

                                <div
                                    class="
                                        flex
                                        flex-wrap
                                        items-center
                                        gap-2
                                        mt-2
                                    "
                                >

                                    <p
                                        class="
                                            text-gray-500
                                            text-xs sm:text-sm
                                        "
                                    >
                                        By {{ $post->user->name ?? 'Unknown' }}
                                    </p>

                                    <span class="text-gray-300">•</span>

                                    <p
                                        class="
                                            text-gray-400
                                            text-xs sm:text-sm
                                        "
                                    >
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>

                                </div>

                            </div>

                        </div>

                        {{-- IMAGE --}}

                        @if($post->image)

                            <img
                                src="{{ asset('storage/' . $post->image) }}"
                                loading="lazy"
                                class="
                                    w-full
                                    rounded-3xl
                                    mb-5 md:mb-6
                                    max-h-[220px]
                                    sm:max-h-[320px]
                                    md:max-h-[500px]
                                    object-cover
                                "
                            >

                        @endif

                        {{-- CONTENT --}}

                        <p
                            class="
                                line-clamp-3
                                text-gray-700
                                text-base md:text-lg
                                leading-relaxed
                                mb-5 md:mb-6
                            "
                        >
                            {{ \Illuminate\Support\Str::limit($post->content, 180) }}
                        </p>

                        {{-- STATS --}}

                        <div
                            class="
                                flex
                                flex-wrap
                                items-center
                                gap-3
                            "
                        >

                            <div
                                class="
                                    bg-pink-100
                                    text-pink-500
                                    px-3 py-2
                                    md:px-4
                                    rounded-xl
                                    font-semibold
                                    text-xs sm:text-sm
                                "
                            >
                                ❤️ {{ $post->likes_count }} Likes
                            </div>

                            <div
                                class="
                                    bg-blue-100
                                    text-blue-500
                                    px-3 py-2
                                    md:px-4
                                    rounded-xl
                                    font-semibold
                                    text-xs sm:text-sm
                                "
                            >
                                💬 {{ $post->comments_count }} Comments
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
