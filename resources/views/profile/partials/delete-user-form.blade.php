<section>

    <header class="mb-8">

        <h2
            class="text-4xl font-black text-red-500"
        >

            Danger Zone

        </h2>

        <p
            class="mt-3 text-lg text-gray-500"
        >

            Permanently delete your account.

        </p>

    </header>

    <form
        method="post"
        action="{{ route('profile.destroy') }}"
        class="space-y-6"
    >

        @csrf
        @method('delete')

        <div>

            <x-input-label
                for="password"
                :value="__('Password')"
            />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-2 block w-full rounded-2xl border-0 bg-gray-100 p-5 text-lg"
            />

            <x-input-error
                :messages="$errors->userDeletion->get('password')"
                class="mt-2"
            />

        </div>

        <div>

            <button
                class="bg-gradient-to-r from-red-500 to-pink-500 hover:scale-105 transition text-white px-8 py-4 rounded-2xl shadow-xl font-bold"
            >

                Delete Account

            </button>

        </div>

    </form>

</section>
