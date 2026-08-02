<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon Espace') }}
        </h2>
    </x-slot>

    <!-- Conteneur avec le fond en filigrane de l'AEM-BF -->
    <div class="py-12 min-h-screen" style="background-image: linear-gradient(to bottom, rgba(248, 250, 252, 0.94), rgba(248, 250, 252, 0.94)), url('{{ asset('images/logo.jpg') }}'); background-repeat: no-repeat; background-position: center; background-attachment: fixed; background-size: 35% auto;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- CONDITION : SI L'UTILISATEUR EST ADMINISTRATEUR -->
            @if(Auth::user()->is_admin ?? false)
                
                <!-- Dashboard Admin -->
                <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border border-slate-200">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Espace Administration - {{ Auth::user()->name }}</h3>
                    <p class="text-sm text-slate-600">Bienvenue dans le panneau de contrôle de l'AEM-BF.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Gestion des Membres -->
                    <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg p-6 border border-slate-200 border-t-4 border-amber-500 flex flex-col justify-between">
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">Gestion des Membres</h4>
                            <p class="text-sm text-slate-600 mb-6">Validez les comptes des étudiants et gérez les inscrits.</p>
                        </div>
                        <a href="{{ route('admin.membres') }}" class="inline-block text-center bg-amber-500 text-slate-950 font-semibold px-4 py-2 rounded hover:bg-amber-400 transition text-sm shadow-sm">
                            Gérer les membres →
                        </a>
                    </div>

                    <!-- Gestion des Actualités -->
                    <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg p-6 border border-slate-200 border-t-4 border-blue-600 flex flex-col justify-between">
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">Actualités & Annonces</h4>
                            <p class="text-sm text-slate-600 mb-6">Publiez, modifiez ou supprimez les articles et documents.</p>
                        </div>
                        <a href="{{ route('admin.posts.index') }}" class="inline-block text-center bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700 transition text-sm shadow-sm">
                            Gérer les actualités →
                        </a>
                    </div>

                    <!-- Gestion des Universités -->
                    <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg p-6 border border-slate-200 border-t-4 border-emerald-800 flex flex-col justify-between">
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">Universités & Écoles</h4>
                            <p class="text-sm text-slate-600 mb-6">Ajoutez ou modifiez les universités membres partenaires.</p>
                        </div>
                        <a href="{{ route('admin.universities.index') }}" class="inline-block text-center bg-emerald-800 text-white font-semibold px-4 py-2 rounded hover:bg-emerald-900 transition text-sm shadow-sm">
                            Gérer les universités →
                        </a>
                    </div>
                </div>

            @else
                
                <!-- Dashboard Étudiant / Public Connecté -->
                <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border border-slate-200">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Bienvenue sur votre espace, {{ Auth::user()->name }} !</h3>
                    <p class="text-sm text-slate-600">Vous êtes connecté à l'Amicale des Étudiants Miniers du Burkina Faso (AEM-BF).</p>
                </div>

                <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg p-6 border border-slate-200">
                    <h4 class="font-semibold text-slate-800 mb-2">Informations de votre compte</h4>
                    <p class="text-sm text-slate-600 mb-4">Statut : <span class="text-emerald-600 font-bold">Membre enregistré</span></p>
                    <a href="{{ route('profile.edit') }}" class="inline-block bg-emerald-800 text-white px-4 py-2 rounded text-sm font-medium hover:bg-emerald-900 transition">
                        Modifier mon profil
                    </a>
                </div>

            @endif

        </div>
    </div>
</x-app-layout>