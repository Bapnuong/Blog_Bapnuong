<nav class="bg-white/80 backdrop-blur-xl border-b border-gray-200 sticky top-0 z-50 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between h-20 items-center">

            <div class="flex items-center gap-10">

                <a href="/dashboard"
                   class="text-3xl font-black text-orange-500 tracking-tight">
                    BLOG.
                </a>

                <div class="hidden md:flex items-center gap-6">

                    <a href="/dashboard"
                       class="text-gray-700 hover:text-orange-500 font-semibold transition">
                        Dashboard
                    </a>

                    <a href="/profile"
                       class="text-gray-700 hover:text-orange-500 font-semibold transition">
                        Profile
                    </a>

                    @if(auth()->user()->role === 'admin')

                        <a href="/admin"
                           class="text-gray-700 hover:text-orange-500 font-semibold transition">
                            Admin
                        </a>

                    @endif

                </div>

            </div>

            <div class="flex items-center gap-5">

                <div class="text-right hidden md:block">
                    <h3 class="font-bold text-gray-800">
                        {{ auth()->user()->name }}
                    </h3>

                    <p class="text-sm text-gray-400">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-2xl transition shadow-lg">
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </div>

</nav>
