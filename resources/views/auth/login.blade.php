<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-6">
        <h2 class="text-xl font-bold text-slate-900">Espace Membre</h2>
        <p class="text-sm text-slate-500 mt-1">Connectez-vous pour accéder à votre tableau de bord.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-emerald-800 shadow-sm focus:ring-emerald-800" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-emerald-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-emerald-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-900 focus:bg-emerald-900 active:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Se connecter') }}
            </button>
        </div>
        
        <div class="mt-6 text-center border-t border-slate-200 pt-4">
            <p class="text-sm text-slate-600">Vous n'avez pas de compte ? 
                <a href="{{ route('register') }}" class="font-bold text-amber-500 hover:text-amber-600">S'inscrire ici</a>
            </p>
        </div>
    </form>
</x-guest-layout>