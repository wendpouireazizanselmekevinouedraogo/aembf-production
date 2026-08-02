<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-xl font-bold text-slate-900">Rejoindre l'AEM-BF</h2>
        <p class="text-sm text-slate-500 mt-1">Créez votre compte pour intégrer le réseau.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nom & Prénom -->
        <div>
            <x-input-label for="name" :value="__('Nom et Prénom')" />
            <x-text-input id="name" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 text-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email & Téléphone (Sur la même ligne sur grand écran) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="email" :value="__('Adresse Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 text-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="telephone" :value="__('Téléphone (WhatsApp)')" />
                <x-text-input id="telephone" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 text-sm" type="tel" name="telephone" :value="old('telephone')" required placeholder="+226 XX XX XX XX" />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>
        </div>

        <!-- Université -->
        <div class="mt-4">
            <x-input-label for="university" :value="__('Université / Institut (Club Membre)')" />
            <select id="university" name="university" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm text-sm py-2.5" required>
                <option value="" disabled selected>Sélectionnez votre établissement</option>
                <option value="2IE">2iE</option>
                <option value="U-AUBEN Ouaga">U-AUBEN (Ouagadougou)</option>
                <option value="U-AUBEN Bobo">U-AUBEN (Bobo-Dioulasso)</option>
                <option value="IST">IST</option>
                <option value="UFR-SEA">UFR-SEA (Université Pr Joseph Ki ZERBO)</option>
                <option value="EPO">EPO</option>
                <option value="ESMI">ESMI</option>
                <option value="CU-DORI">CU-DORI</option>
                <option value="INGRIDD">INGRIDD</option>
                <option value="ISTAPEM">ISTAPEM</option>
                <option value="IGEDD">IGEDD</option>
                <option value="BIT">B.I.T.</option>
                <option value="ESUP-J">ESUP-J</option>
                <option value="ITTGO">ITTGO</option>
                <option value="UI2M">UI2M</option>
                <option value="CU-KAYA">CU-KAYA</option>
                <option value="ISAG">ISAG</option>
                <option value="IPAM">IPAM</option>
                <option value="CLUB_CHIMISTE">Club Chimiste</option>
                <option value="AUTRE">Autre...</option>
            </select>
            <x-input-error :messages="$errors->get('university')" class="mt-2" />
        </div>

        <!-- Filière & Année d'étude -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="field_of_study" :value="__('Filière d\'étude')" />
                <x-text-input id="field_of_study" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 text-sm" type="text" name="field_of_study" :value="old('field_of_study')" required placeholder="Ex: Génie Minier, QSE..." />
                <x-input-error :messages="$errors->get('field_of_study')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="academic_year" :value="__('Niveau / Année')" />
                <select id="academic_year" name="academic_year" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-md shadow-sm text-sm py-2.5" required>
                    <option value="" disabled selected>Niveau</option>
                    <option value="Licence 1">Licence 1</option>
                    <option value="Licence 2">Licence 2</option>
                    <option value="Licence 3">Licence 3</option>
                    <option value="Master 1">Master 1</option>
                    <option value="Master 2">Master 2</option>
                    <option value="Doctorat">Doctorat</option>
                    <option value="Diplômé(e)">Diplômé(e)</option>
                </select>
                <x-input-error :messages="$errors->get('academic_year')" class="mt-2" />
            </div>
        </div>

        <!-- Mots de passe -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 text-sm" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-slate-300 focus:border-emerald-500 focus:ring-emerald-500 text-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 pt-4 border-t border-slate-200">
            <a class="underline text-sm text-slate-600 hover:text-emerald-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 mb-4 sm:mb-0" href="{{ route('login') }}">
                {{ __('Déjà inscrit ? Se connecter') }}
            </a>

            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 bg-emerald-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-900 focus:bg-emerald-900 active:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Créer mon compte') }}
            </button>
        </div>
    </form>
</x-guest-layout>