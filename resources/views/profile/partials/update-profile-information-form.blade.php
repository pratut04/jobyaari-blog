<section>

    <header>

        <h2 class="text-lg font-medium text-gray-900 dark:text-white">

            {{ __('Profile Information') }}

        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">

            {{ __("Update your account's profile information and email address.") }}

        </p>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">

        @csrf

    </form>

    <form
        method="post"
        action="{{ route('profile.update') }}"
        enctype="multipart/form-data"
        class="mt-6 space-y-6"
    >

        @csrf
        @method('patch')

        <!-- AVATAR -->

        <div class="flex flex-col items-center">

            @if(auth()->user()->avatar)

                <img
                    src="{{ asset('uploads/avatars/' . auth()->user()->avatar) }}"
                    class="w-28 h-28 rounded-full object-cover mb-4 border-4 border-blue-500"
                >

            @else

                <div
                    class="w-28 h-28 rounded-full bg-blue-600 text-white
                    flex items-center justify-center text-4xl font-bold mb-4"
                >

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

            @endif

            <input
                type="file"
                name="avatar"
                class="block w-full text-sm
                text-gray-700 dark:text-white
                border border-gray-300 dark:border-gray-700
                rounded-xl cursor-pointer
                bg-white dark:bg-[#0f172a]
                p-2"
            >

            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />

        </div>

        <!-- NAME -->

        <div>

            <x-input-label
                for="name"
                :value="__('Name')"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full
                dark:bg-[#0f172a]
                dark:text-white
                dark:border-gray-700"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />

        </div>

        <!-- EMAIL -->

        <div>

            <x-input-label
                for="email"
                :value="__('Email')"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full
                dark:bg-[#0f172a]
                dark:text-white
                dark:border-gray-700"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div>

                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-300">

                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            class="underline text-sm
                            text-gray-600 dark:text-gray-300
                            hover:text-gray-900 dark:hover:text-white
                            rounded-md"
                        >

                            {{ __('Click here to re-send the verification email.') }}

                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')

                        <p class="mt-2 font-medium text-sm text-green-600">

                            {{ __('A new verification link has been sent to your email address.') }}

                        </p>

                    @endif

                </div>

            @endif

        </div>

        <!-- BIO -->

        <div>

            <x-input-label
                for="bio"
                :value="__('Bio')"
            />

            <textarea
                id="bio"
                name="bio"
                rows="5"
                class="mt-1 block w-full border-gray-300
                dark:border-gray-700
                dark:bg-[#0f172a]
                dark:text-white
                rounded-xl shadow-sm"
            >{{ old('bio', auth()->user()->bio) }}</textarea>

            <x-input-error
                class="mt-2"
                :messages="$errors->get('bio')"
            />

        </div>

        <!-- SAVE BUTTON -->

        <div class="flex items-center gap-4">

            <x-primary-button>

                {{ __('Save') }}

            </x-primary-button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-300"
                >

                    {{ __('Saved.') }}

                </p>

            @endif

        </div>

    </form>

</section>