<section>

    <header class="mb-8">

        <h2
            class="text-4xl font-black text-gray-800"
        >

            Update Password

        </h2>

        <p
            class="mt-3 text-lg text-gray-500"
        >

            Make sure your account stays secure.

        </p>

    </header>

    <form
        method="post"
        action="{{ route('password.update') }}"
        class="space-y-6"
    >

        @csrf
        @method('put')

        {{-- CURRENT PASSWORD --}}

        <div>

            <x-input-label
                for="update_password_current_password"
                :value="__('Current Password')"
            />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full rounded-2xl border-0 bg-gray-100 p-5 text-lg"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />

        </div>

        {{-- NEW PASSWORD --}}

        <div>

            <x-input-label
                for="update_password_password"
                :value="__('New Password')"
            />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full rounded-2xl border-0 bg-gray-100 p-5 text-lg"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />

        </div>

        {{-- CONFIRM PASSWORD --}}

        <div>

            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirm Password')"
            />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full rounded-2xl border-0 bg-gray-100 p-5 text-lg"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        {{-- BUTTON --}}

        <div>

            <button
                class="bg-gradient-to-r from-orange-500 to-pink-500 hover:scale-105 transition text-white px-8 py-4 rounded-2xl shadow-xl font-bold"
            >

                Update Password

            </button>

        </div>

    </form>

</section>
