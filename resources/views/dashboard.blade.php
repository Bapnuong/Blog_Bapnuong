<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-orange-50 to-white py-10">

    <div class="max-w-6xl mx-auto px-4">

        {{-- HERO --}}

        <div
            class="bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 mb-10 border border-white/50"
        >

            <h1
                class="text-5xl font-black text-gray-800 mb-4"
            >

                Dashboard 👋

            </h1>

            <p
                class="text-gray-500 text-xl"
            >

                Welcome back {{ auth()->user()->name }}

            </p>

        </div>


        {{-- SEARCH --}}

        <form
            method="GET"
            action="/dashboard"
            class="mb-10"
        >

            <div class="relative">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search posts..."
                    class="
                        w-full
                        bg-white/80
                        backdrop-blur-xl
                        rounded-3xl
                        p-6
                        pl-16
                        text-lg
                        border-0
                        shadow-2xl
                        focus:ring-2
                        focus:ring-orange-400
                    "
                >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="
                        w-7
                        h-7
                        absolute
                        left-5
                        top-6
                        text-gray-400
                    "
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"
                    />

                </svg>

            </div>

        </form>


        {{-- CREATE POST --}}

        <div
            class="bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl p-8 mb-10 border border-white/50"
        >

            <h2
                class="text-4xl font-black text-gray-800 mb-8"
            >

                Create New Post ✨

            </h2>

            <form
                method="POST"
                action="/posts"
                enctype="multipart/form-data"
            >

                @csrf

                {{-- IMAGE --}}

                <input
                    type="file"
                    name="image"
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
                        hover:file:bg-pink-500
                    "
                >

                {{-- TITLE --}}

                <input
                    type="text"
                    name="title"
                    placeholder="Post title..."
                    class="w-full bg-gray-100 rounded-2xl p-5 text-lg border-0 mb-5"
                >

                {{-- CONTENT --}}

                <textarea
                    name="content"
                    rows="5"
                    placeholder="What's on your mind?"
                    class="w-full bg-gray-100 rounded-2xl p-5 text-lg border-0 mb-5"
                ></textarea>

                {{-- BUTTON --}}

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
                        hover:scale-105
                        transition
                    "
                >

                    Publish Post

                </button>

            </form>

        </div>

        {{-- EMPTY POSTS --}}

        @if($posts->count() == 0)

            <div
                class="
                    bg-white/80
                    backdrop-blur-xl
                    rounded-[35px]
                    shadow-2xl
                    p-16
                    text-center
                    border border-white/50
                "
            >

                <h2
                    class="text-4xl font-black text-gray-700"
                >

                    No Posts Yet 😢

                </h2>

                <p
                    class="text-gray-500 text-lg mt-4"
                >

                    Create your first post now.

                </p>

            </div>

        @endif

        {{-- POSTS --}}

        @foreach($posts as $post)

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

                {{-- HEADER --}}

                <div
                    class="flex justify-between items-start mb-6"
                >

                    <div>

                        <h2
                            class="text-4xl font-black text-gray-800"
                        >

                            {{ $post->title }}

                        </h2>

                        <p
                            class="text-gray-500 mt-3 text-lg"
                        >

                            By {{ $post->user->name }}

                        </p>

                    </div>

                    {{-- ACTIONS --}}

                    @if(
                        Auth::id() == $post->user_id
                        ||
                        auth()->user()->role == 'admin'
                    )

                        <div class="flex gap-3">

                            {{-- EDIT --}}

                            <button
                                onclick="toggleEdit({{ $post->id }})"
                                class="
                                    bg-blue-500
                                    hover:bg-blue-600
                                    text-white
                                    px-5
                                    py-3
                                    rounded-2xl
                                    shadow-lg
                                    font-bold
                                    transition
                                "
                            >

                                Edit

                            </button>

                            {{-- DELETE --}}

                            <form
                                method="POST"
                                action="/posts/{{ $post->id }}"
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

                        </div>

                    @endif

                </div>

                {{-- IMAGE --}}

                @if($post->image)

                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        class="
                            w-full
                            h-[500px]
                            object-cover
                            rounded-3xl
                            mb-8
                        "
                    >

                @endif

                {{-- CONTENT --}}

                <p
                    class="
                        text-gray-700
                        text-xl
                        leading-relaxed
                        mb-8
                    "
                >

                    {{ $post->content }}

                </p>


                {{-- LIKE --}}

                <form
                    method="POST"
                    action="/posts/{{ $post->id }}/like"
                    class="mb-8"
                >

                    @csrf

                    <button
                        class="
                            bg-pink-100
                            hover:bg-pink-500
                            hover:text-white
                            text-pink-500
                            px-6
                            py-3
                            rounded-2xl
                            font-bold
                            transition
                        "
                    >

                        ❤️ {{ $post->likes->count() }} Likes

                    </button>

                </form>

                {{-- COMMENTS TITLE --}}

                <h3
                    class="
                        text-2xl
                        font-black
                        text-gray-800
                        mb-5
                    "
                >

                    Comments

                </h3>

                {{-- COMMENTS LIST --}}

                @foreach($post->comments as $comment)

                    <div
                        class="
                            bg-gray-50
                            rounded-2xl
                            p-5
                            mb-4
                            border border-gray-100
                        "
                    >

                        <div
                            class="
                                flex
                                justify-between
                                items-start
                                gap-4
                            "
                        >

                            {{-- LEFT --}}

                            <div class="flex-1">

                                {{-- USER --}}

                                <div
                                    class="
                                        flex
                                        items-center
                                        gap-3
                                        mb-3
                                    "
                                >

                                    @if($comment->user->avatar)

                                        <img
                                            src="{{ asset('storage/' . $comment->user->avatar) }}"
                                            class="
                                                w-10
                                                h-10
                                                rounded-full
                                                object-cover
                                            "
                                        >

                                    @else

                                        <img
                                            src="https://ui-avatars.com/api/?name={{ $comment->user->name }}"
                                            class="
                                                w-10
                                                h-10
                                                rounded-full
                                            "
                                        >

                                    @endif

                                    <div>

                                        <p
                                            class="
                                                font-bold
                                                text-orange-500
                                            "
                                        >

                                            {{ $comment->user->name }}

                                        </p>

                                        <p
                                            class="
                                                text-sm
                                                text-gray-400
                                            "
                                        >

                                            {{ $comment->created_at->diffForHumans() }}

                                        </p>

                                    </div>

                                </div>

                                {{-- CONTENT --}}

                                <p
                                    class="
                                        text-gray-700
                                        text-lg
                                    "
                                >

                                    {{ $comment->content }}

                                </p>

                                {{-- EDIT FORM --}}

                                <div
                                    id="comment-edit-{{ $comment->id }}"
                                    class="hidden mt-4"
                                >

                                    <form
                                        method="POST"
                                        action="/comments/{{ $comment->id }}"
                                    >

                                        @csrf
                                        @method('PUT')

                                        <textarea
                                            name="content"
                                            rows="3"
                                            class="
                                                w-full
                                                bg-white
                                                rounded-2xl
                                                p-4
                                                border
                                                border-gray-200
                                            "
                                        >{{ $comment->content }}</textarea>

                                        <button
                                            class="
                                                mt-3
                                                bg-gradient-to-r
                                                from-orange-500
                                                to-pink-500
                                                text-white
                                                px-5
                                                py-2
                                                rounded-xl
                                                font-bold
                                                shadow-lg
                                            "
                                        >

                                            Update Comment

                                        </button>

                                    </form>

                                </div>

                            </div>

                            {{-- RIGHT ACTIONS --}}

                            @if(
                                Auth::id() == $comment->user_id
                                ||
                                auth()->user()->role == 'admin'
                            )

                                <div
                                    class="
                                        flex
                                        gap-2
                                    "
                                >

                                    {{-- EDIT --}}

                                    <button
                                        onclick="toggleCommentEdit({{ $comment->id }})"
                                        class="
                                            bg-blue-100
                                            hover:bg-blue-500
                                            hover:text-white
                                            text-blue-500
                                            px-4
                                            py-2
                                            rounded-xl
                                            font-bold
                                            transition
                                        "
                                    >

                                        Edit

                                    </button>

                                    {{-- DELETE --}}

                                    <form
                                        method="POST"
                                        action="/comments/{{ $comment->id }}"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="
                                                bg-red-100
                                                hover:bg-red-500
                                                hover:text-white
                                                text-red-500
                                                px-4
                                                py-2
                                                rounded-xl
                                                font-bold
                                                transition
                                            "
                                        >

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            @endif

                        </div>

                    </div>

                @endforeach

                {{-- COMMENT FORM --}}

                <form
                    method="POST"
                    action="/comments"
                    class="mt-8"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="post_id"
                        value="{{ $post->id }}"
                    >

                    <textarea
                        name="content"
                        rows="3"
                        placeholder="Write a comment..."
                        class="
                            w-full
                            bg-gray-100
                            rounded-2xl
                            p-5
                            text-lg
                            border-0
                        "
                    ></textarea>

                    <button
                        class="
                            mt-4
                            bg-blue-500
                            hover:bg-blue-600
                            text-white
                            px-6
                            py-3
                            rounded-2xl
                            shadow-lg
                            font-bold
                            transition
                        "
                    >

                        Comment

                    </button>

                </form>

                {{-- EDIT FORM --}}

                <div
                    id="edit-form-{{ $post->id }}"
                    class="hidden mt-8"
                >

                    <form
                        method="POST"
                        action="/posts/{{ $post->id }}"
                        enctype="multipart/form-data"
                    >

                        @csrf
                        @method('PUT')

                        {{-- TITLE --}}

                        <input
                            type="text"
                            name="title"
                            value="{{ $post->title }}"
                            class="
                                w-full
                                bg-gray-100
                                rounded-2xl
                                p-5
                                text-lg
                                border-0
                                mb-4
                            "
                        >

                        {{-- IMAGE --}}

                        <input
                            type="file"
                            name="image"
                            class="
                                w-full
                                bg-gray-100
                                rounded-2xl
                                p-5
                                text-lg
                                border-0
                                mb-4

                                file:mr-4
                                file:py-3
                                file:px-6
                                file:rounded-2xl
                                file:border-0
                                file:text-sm
                                file:font-bold
                                file:bg-orange-500
                                file:text-white
                                hover:file:bg-pink-500
                            "
                        >

                        {{-- CONTENT --}}

                        <textarea
                            name="content"
                            rows="5"
                            class="
                                w-full
                                bg-gray-100
                                rounded-2xl
                                p-5
                                text-lg
                                border-0
                            "
                        >{{ $post->content }}</textarea>


                        {{-- BUTTON --}}

                        <button
                            class="
                                mt-4
                                bg-gradient-to-r
                                from-orange-500
                                to-pink-500
                                text-white
                                px-6
                                py-3
                                rounded-2xl
                                shadow-lg
                                font-bold
                                hover:scale-105
                                transition
                            "
                        >

                            Update Post

                        </button>

                    </form>

                </div>

            </div>

        @endforeach
            {{-- PAGINATION --}}

            <div class="mt-10">

                {{ $posts->links() }}

            </div>
    </div>

</div>

<script>

function toggleEdit(id)
{
    document
        .getElementById(
            'edit-form-' + id
        )
        .classList
        .toggle('hidden');
}
function toggleCommentEdit(id)
{
    document
        .getElementById(
            'comment-edit-' + id
        )
        .classList
        .toggle('hidden');
}
</script>

</x-app-layout>
