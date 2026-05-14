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
            "
        >

            <h1
                class="
                    text-6xl
                    font-black
                    text-gray-800
                    mb-4
                "
            >

                Admin Dashboard 👑

            </h1>

            <p
                class="
                    text-gray-500
                    text-xl
                "
            >

                Manage your entire platform.

            </p>

        </div>

        {{-- STATS --}}

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-4
                gap-6
                mb-10
            "
        >

            {{-- USERS --}}

            <div
                class="
                    bg-gradient-to-r
                    from-orange-500
                    to-pink-500
                    text-white
                    rounded-[30px]
                    shadow-2xl
                    p-8
                    hover:scale-105
                    transition
                "
            >

                <p
                    class="
                        text-lg
                        opacity-90
                    "
                >

                    Users

                </p>

                <h1
                    class="
                        text-5xl
                        font-black
                        mt-4
                    "
                >

                    {{ $totalUsers }}

                </h1>
            </div>

            {{-- POSTS --}}

            <div
                class="
                    bg-gradient-to-r
                    from-blue-500
                    to-cyan-500
                    text-white
                    rounded-[30px]
                    shadow-2xl
                    p-8
                    hover:scale-105
                    transition
                "
            >

                <p
                    class="
                        text-lg
                        opacity-90
                    "
                >

                    Posts

                </p>

                <h1
                    class="
                        text-5xl
                        font-black
                        mt-4
                    "
                >

                    {{ $totalPosts }}

                </h1>

            </div>

            {{-- COMMENTS --}}

            <div
                class="
                    bg-gradient-to-r
                    from-pink-500
                    to-red-500
                    text-white
                    rounded-[30px]
                    shadow-2xl
                    p-8
                    hover:scale-105
                    transition
                "
            >

                <p
                    class="
                        text-lg
                        opacity-90
                    "
                >

                    Comments

                </p>

                <h1
                    class="
                        text-5xl
                        font-black
                        mt-4
                    "
                >

                    {{ $totalComments }}

                </h1>

            </div>

            {{-- LIKES --}}

            <div
                class="
                    bg-gradient-to-r
                    from-green-500
                    to-emerald-500
                    text-white
                    rounded-[30px]
                    shadow-2xl
                    p-8
                    hover:scale-105
                    transition
                "
            >

                <p
                    class="
                        text-lg
                        opacity-90
                    "
                >

                    Likes

                </p>

                <h1
                    class="
                        text-5xl
                        font-black
                        mt-4
                    "
                >

                    {{ $totalLikes }}

                </h1>

            </div>

        </div>

        {{-- USERS SECTION --}}

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

            <div
                class="
                    flex
                    items-center
                    justify-between
                    mb-8
                "
            >

                <div>

                    <h2
                        class="
                            text-4xl
                            font-black
                            text-gray-800
                        "
                    >

                        Users

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-2
                            text-lg
                        "
                    >

                        Manage all users in the platform.

                    </p>

                </div>

            </div>

            <div class="space-y-5">

                @foreach($users as $user)

                    <div
                        class="
                            bg-gray-50
                            border
                            border-gray-100
                            rounded-[28px]
                            p-6
                            flex
                            justify-between
                            items-center
                            hover:scale-[1.01]
                            transition
                        "
                    >

                        <div
                            class="
                                flex
                                items-center
                                gap-5
                            "
                        >

                            {{-- AVATAR --}}

                            @if($user->avatar)

                                <img
                                    src="{{ asset('storage/' . $user->avatar) }}"
                                    class="
                                        w-16
                                        h-16
                                        rounded-full
                                        object-cover
                                        border-2
                                        border-orange-400
                                        shadow-lg
                                    "
                                >

                            @else

                                <img
                                    src="https://ui-avatars.com/api/?name={{ $user->name }}"
                                    class="
                                        w-16
                                        h-16
                                        rounded-full
                                        border-2
                                        border-orange-400
                                        shadow-lg
                                    "
                                >

                            @endif

                            {{-- INFO --}}

                            <div>

                                <h3
                                    class="
                                        text-2xl
                                        font-black
                                        text-gray-800
                                    "
                                >

                                    {{ $user->name }}

                                </h3>

                                <p
                                    class="
                                        text-gray-500
                                        mt-1
                                    "
                                >

                                    {{ $user->email }}

                                </p>

                            </div>

                        </div>

                        {{-- ROLE --}}

                        <div class="flex items-center gap-4">

                            <span
                                class="
                                    bg-orange-100
                                    text-orange-500
                                    px-5
                                    py-3
                                    rounded-2xl
                                    font-bold
                                "
                            >

                                {{ $user->role }}

                            </span>

                           @if(auth()->id() !== $user->id)

                                <form
                                    action="/admin/users/{{ $user->id }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="
                                            bg-gradient-to-r
                                            from-red-500
                                            to-pink-500
                                            text-white
                                            px-5
                                            py-3
                                            rounded-2xl
                                            shadow-lg
                                            font-bold
                                            hover:scale-105
                                            transition
                                        "
                                    >

                                        Delete

                                    </button>

                                </form>

                            @endif
                        </div>
                    </div>

                @endforeach

            </div>

        </div>

        {{-- POSTS SECTION --}}

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

            <div
                class="
                    flex
                    items-center
                    justify-between
                    mb-8
                "
            >

                <div>

                    <h2
                        class="
                            text-4xl
                            font-black
                            text-gray-800
                        "
                    >

                        Posts

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-2
                            text-lg
                        "
                    >

                        Moderate and manage all posts.

                    </p>

                </div>

            </div>

            <div class="space-y-6">

                @foreach($posts as $post)

                    <div
                        class="
                            bg-gray-50
                            border
                            border-gray-100
                            rounded-[28px]
                            p-8
                            hover:scale-[1.01]
                            transition
                        "
                    >

                        {{-- HEADER --}}

                        <div
                            class="
                                flex
                                justify-between
                                items-start
                                mb-6
                            "
                        >

                            <div>

                                {{-- TITLE --}}

                                <h2
                                    class="
                                        text-3xl
                                        font-black
                                        text-gray-800
                                    "
                                >

                                    {{ $post->title }}

                                </h2>

                                {{-- USER --}}

                                <div
                                    class="
                                        flex
                                        items-center
                                        gap-3
                                        mt-4
                                    "
                                >

                                    @if($post->user->avatar)

                                        <img
                                            src="{{ asset('storage/' . $post->user->avatar) }}"
                                            class="
                                                w-12
                                                h-12
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
                                                w-12
                                                h-12
                                                rounded-full
                                                border-2
                                                border-orange-400
                                            "
                                        >

                                    @endif

                                    <div>

                                        <p
                                            class="
                                                text-gray-800
                                                font-bold
                                            "
                                        >

                                            {{ $post->user->name }}

                                        </p>

                                        <p
                                            class="
                                                text-gray-500
                                                text-sm
                                            "
                                        >

                                            {{ $post->created_at->diffForHumans() }}

                                        </p>

                                    </div>

                                </div>

                            </div>

                            {{-- DELETE --}}

                            <form
                                action="/posts/{{ $post->id }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    class="
                                        bg-gradient-to-r
                                        from-red-500
                                        to-pink-500
                                        text-white
                                        px-6
                                        py-3
                                        rounded-2xl
                                        shadow-xl
                                        font-bold
                                        hover:scale-105
                                        transition
                                    "
                                >

                                    Delete

                                </button>

                            </form>

                        </div>

                        {{-- IMAGE --}}

                        @if($post->image)

                            <img
                                src="{{ asset('storage/' . $post->image) }}"
                                class="
                                    w-full
                                    h-[450px]
                                    object-cover
                                    rounded-3xl
                                    mb-6
                                "
                            >

                        @endif

                        {{-- CONTENT --}}

                        <p
                            class="
                                text-gray-700
                                text-xl
                                leading-relaxed
                            "
                        >

                            {{ $post->content }}

                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

</x-app-layout>
