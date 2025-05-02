
    {{-- <div class="my-4 main-content-label">{{ __('Profile Information') }}</div> --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name', $user->name) }}"  required autofocus autocomplete="name" >
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
            </div>
        </div>

        <div>
            <div class="form-group">
                <label for="email">{{__('Email address')}}</label>
                <input type="email" class="form-control" id="email" name="email"  value="{{old('email', $user->email)}}"  required autocomplete="username" >
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
            {{-- <x-primary-button :class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</x-primary-button> --}}

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm  text-success mt-2"
                >{{ __('Saved.') }}</p>
                {{-- @else
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div> --}}
            @endif
        </div>
    </form>
