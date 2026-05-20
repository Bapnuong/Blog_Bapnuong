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
        <div id="post-card-app">

            <post-card
                :post='@json($post)'
                :can-edit='@json(auth()->check() && auth()->id() === $post->user_id)'
            />

        </div>

    </div>

</div>

</body>
</html>
