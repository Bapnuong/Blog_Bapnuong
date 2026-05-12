<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
    class="min-h-screen bg-gradient-to-br from-slate-100 via-orange-50 to-white flex items-center justify-center px-4"
>

    <div
        class="w-full max-w-md bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 border border-white/50"
    >

        {{-- LOGO --}}

        <div class="text-center mb-10">

            <a href="/">

                <h1
                    class="text-5xl font-black bg-gradient-to-r from-orange-500 to-pink-500 bg-clip-text text-transparent"
                >

                    BLOG.

                </h1>

            </a>

            <p
                class="text-gray-500 mt-3 text-lg"
            >

                Welcome back 👋

            </p>

        </div>

        {{ $slot }}

    </div>

</body>

</html>
