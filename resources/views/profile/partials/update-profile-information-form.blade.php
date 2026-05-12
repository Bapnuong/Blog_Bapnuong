<section>

    <header class="mb-8">

        <h2
            class="text-4xl font-black text-gray-800"
        >

            Profile Information

        </h2>

        <p
            class="mt-3 text-lg text-gray-500"
        >

            Update your account information.

        </p>

    </header>

    <form
        method="post"
        action="{{ route('profile.update') }}"
        class="space-y-6"
    >

        @csrf
        @method('patch')

        {{-- NAME --}}

        <div>

            <x-input-label
                for="name"
                :value="__('Name')"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-2 block w-full rounded-2xl border-0 bg-gray-100 p-5 text-lg"
                :value="old('name', $user->name)"
                required
                autofocus
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />

        </div>

        {{-- EMAIL --}}

        <div>

            <x-input-label
                for="email"
                :value="__('Email')"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-2 block w-full rounded-2xl border-0 bg-gray-100 p-5 text-lg"
                :value="old('email', $user->email)"
                required
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

        </div>

        {{-- BUTTON --}}

        <div>

            <button
                class="bg-gradient-to-r from-orange-500 to-pink-500 hover:scale-105 transition text-white px-8 py-4 rounded-2xl shadow-xl font-bold"
            >

                Save Changes

            </button>

        </div>

    </form>

</section>
