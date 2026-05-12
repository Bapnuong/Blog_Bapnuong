<x-app-layout>

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow p-10">

        {{-- AVATAR --}}

        <div class="flex items-center gap-6">

            <img
                src="https://ui-avatars.com/api/?name={{ $user->name }}"
                class="w-28 h-28 rounded-full"
            >

            <div>

                <h1 class="text-4xl font-bold">

                    {{ $user->name }}

                </h1>

                <p class="text-gray-500 mt-2">

                    {{ $user->bio ?? 'No bio yet.' }}

                </p>

            </div>

        </div>

        {{-- STATS --}}

        <div class="mt-10 grid grid-cols-3 gap-6">

            <div class="bg-orange-100 p-6 rounded-2xl">

                <h2 class="text-lg text-gray-500">

                    Posts

                </h2>

                <h1 class="text-4xl font-bold text-orange-500">

                    {{ $user->posts->count() }}

                </h1>

            </div>

            <div class="bg-pink-100 p-6 rounded-2xl">

                <h2 class="text-lg text-gray-500">

                    Comments

                </h2>

                <h1 class="text-4xl font-bold text-pink-500">

                    {{ $user->comments->count() }}

                </h1>

            </div>

            <div class="bg-blue-100 p-6 rounded-2xl">

                <h2 class="text-lg text-gray-500">

                    Likes

                </h2>

                <h1 class="text-4xl font-bold text-blue-500">

                    {{ $user->likes->count() }}

                </h1>

            </div>

        </div>

        {{-- POSTS --}}

        <div class="mt-10">

            <h2 class="text-3xl font-bold mb-6">

                Posts
            </h2>

            @foreach($user->posts as $post)

                <div
                    class="bg-gray-100 rounded-2xl p-5 mb-5"
                >

                    <h3 class="text-2xl font-bold">

                        {{ $post->title }}

                    </h3>

                    <p class="text-gray-700 mt-2">

                        {{ $post->content }}

                    </p>

                </div>

            @endforeach

        </div>

    </div>

</div>

</x-app-layout>
