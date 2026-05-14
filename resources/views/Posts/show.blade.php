@php
    use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Blog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-100 via-orange-50 to-white">

<div class="min-h-screen py-10">

    <div class="max-w-5xl mx-auto px-4">

        {{-- BACK BUTTON --}}

        <a
            href="/"
            class="
                inline-flex
                items-center
                gap-2
                mb-6
                text-gray-600
                hover:text-orange-500
                transition
                font-semibold
            "
        >
            ← Back
        </a>

        {{-- POST CARD --}}

        <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-10
                border border-white/50
            "
        >

            {{-- AUTHOR --}}

            <div class="flex items-center gap-4 mb-8">

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

                    <p class="text-2xl font-black text-gray-800">
                        {{ $post->title }}
                    </p>

                    <div class="flex items-center gap-2 mt-1">

                        <p class="text-gray-500">
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
                        mb-8
                        max-h-[600px]
                        object-cover
                    "
                >

            @endif

            {{-- CONTENT --}}

            <div
                class="
                    text-gray-700
                    text-xl
                    leading-relaxed
                    whitespace-pre-line
                "
            >
                {{ $post->content }}
            </div>

            {{-- STATS --}}

            <div class="flex gap-4 mt-10">

                <div
                    class="
                        bg-pink-100
                        text-pink-500
                        px-5
                        py-3
                        rounded-2xl
                        font-semibold
                    "
                >
                    ❤️ {{ $post->likes->count() }} Likes
                </div>

                <div
                    class="
                        bg-blue-100
                        text-blue-500
                        px-5
                        py-3
                        rounded-2xl
                        font-semibold
                    "
                >
                    💬 {{ $post->comments->count() }} Comments
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
