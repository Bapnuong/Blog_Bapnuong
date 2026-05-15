<nav class="bg-white shadow-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <div class="flex items-center gap-10">

                <a href="/" class="text-3xl font-extrabold text-orange-500 tracking-tight">
                    BLOG.
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-6">

                    <a href="{{ route('dashboard') }}"
                       class="text-gray-700 hover:text-orange-500 font-medium transition">
                        Dashboard
                    </a>

                    <a href="/profile/{{ auth()->id() }}"
                       class="text-gray-700 hover:text-orange-500 font-medium transition">
                        Profile
                    </a>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.index') }}"
                           class="text-gray-700 hover:text-orange-500 font-medium transition">
                            Admin
                        </a>
                    @endif

                </div>
            </div>

            <!-- RIGHT -->
            <div class="hidden md:flex items-center gap-5">

                <div class="text-right">
                    <p class="font-semibold text-gray-800 leading-tight">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-sm text-gray-400">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl font-semibold shadow transition"
                    >
                        Logout
                    </button>
                </form>

            </div>

            <!-- MOBILE BUTTON -->
            <div class="md:hidden">
                <button
                    id="mobile-menu-button"
                    class="text-gray-700 focus:outline-none"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-8 w-8"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobile-menu"
         class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-5 space-y-4">

        <div>
            <p class="font-semibold text-gray-800">
                {{ auth()->user()->name }}
            </p>

            <p class="text-sm text-gray-400">
                {{ auth()->user()->email }}
            </p>
        </div>

        <a href="{{ route('dashboard') }}"
           class="block text-gray-700 hover:text-orange-500 font-medium">
            Dashboard
        </a>

        <a href="/profile/{{ auth()->id() }}"
           class="block text-gray-700 hover:text-orange-500 font-medium">
            Profile
        </a>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.index') }}"
               class="block text-gray-700 hover:text-orange-500 font-medium">
                Admin
            </a>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-semibold"
            >
                Logout
            </button>
        </form>

    </div>

    <!-- SCRIPT -->
    <script>
        const mobileBtn = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</nav>
