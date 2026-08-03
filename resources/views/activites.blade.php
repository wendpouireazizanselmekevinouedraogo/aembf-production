<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activités & Formations - AEM-BF</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .watermark-bg {
            background-image: linear-gradient(to bottom, rgba(248, 250, 252, 0.94), rgba(248, 250, 252, 0.94)), url('{{ asset('images/logo.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: 35% auto;
        }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-900 font-sans watermark-bg">

    <!-- HEADER -->
    <header class="bg-white border-b border-emerald-800/25 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="h-14 w-auto" src="{{ asset('images/logo.jpg') }}" alt="Logo AEM-BF">
                    </a>
                </div>

                <nav class="hidden lg:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Accueil</a>
                    <a href="{{ route('amicale') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">L'Amicale</a>
                    <a href="{{ route('activites') }}" class="text-sm font-medium text-emerald-800 border-b-2 border-emerald-800 transition">Activités</a>
                    <a href="{{ route('universites') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Universités Membres</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Contact</a>
                </nav>

                <div class="flex items-center space-x-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 border border-slate-300 rounded text-sm font-medium text-slate-700 hover:bg-slate-50 transition">Mon Espace</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-emerald-800 transition">
                                Connexion
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-emerald-800 text-white rounded text-sm font-medium hover:bg-emerald-900 transition shadow-sm">
                                    Créer mon compte
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <div class="bg-slate-900 text-white py-12 border-b-4 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight uppercase">Espace Activités & Formations</h1>
            <p class="text-slate-300 mt-3 text-sm md:text-base max-w-2xl mx-auto">
                Consultez nos programmes, inscrivez-vous aux modules de formation et accédez aux supports documentaires de nos panels.
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT - TABS SYSTEM -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ tab: 'formation' }">
        
        <!-- Navigation des onglets -->
        <div class="flex flex-wrap border-b border-gray-200 mb-8 gap-2 md:gap-4">
            <button @click="tab = 'formation'" :class="tab === 'formation' ? 'border-emerald-800 text-emerald-800 font-bold border-b-2' : 'text-slate-500 hover:text-slate-700'" class="py-3 px-4 focus:outline-none transition-colors uppercase text-xs md:text-sm tracking-wider">
                Espace Formation
            </button>
            <button @click="tab = 'programmes'" :class="tab === 'programmes' ? 'border-emerald-800 text-emerald-800 font-bold border-b-2' : 'text-slate-500 hover:text-slate-700'" class="py-3 px-4 focus:outline-none transition-colors uppercase text-xs md:text-sm tracking-wider">
                Panels Programmés
            </button>
            <button @click="tab = 'encours'" :class="tab === 'encours' ? 'border-emerald-800 text-emerald-800 font-bold border-b-2' : 'text-slate-500 hover:text-slate-700'" class="py-3 px-4 focus:outline-none transition-colors uppercase text-xs md:text-sm tracking-wider">
                Panels en Cours
            </button>
            <button @click="tab = 'supports'" :class="tab === 'supports' ? 'border-emerald-800 text-emerald-800 font-bold border-b-2' : 'text-slate-500 hover:text-slate-700'" class="py-3 px-4 focus:outline-none transition-colors uppercase text-xs md:text-sm tracking-wider">
                Supports des Panels
            </button>
        </div>

        <!-- Contenu des onglets -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8 min-h-[400px]">
            
            <!-- Onglet 1 : Espace Formation -->
            <div x-show="tab === 'formation'" style="display: none;" x-transition>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-slate-900">Modules de formation</h3>
                </div>
                
                <!-- Exemple de carte de formation (Statique pour le moment) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border border-slate-200 rounded-lg p-5 flex flex-col justify-between hover:border-emerald-500 transition">
                        <div>
                            <span class="inline-block px-2 py-1 bg-slate-100 text-slate-600 text-xs font-semibold rounded mb-3">Enregistrement ouvert</span>
                            <h4 class="text-lg font-bold text-slate-800 mb-2">Initiation aux logiciels miniers</h4>
                            <p class="text-sm text-slate-600 mb-4">Formation pratique sur les outils standards de l'industrie pour la modélisation géologique.</p>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                            @auth
                                <!-- Bouton d'inscription (Exemple) -->
                                <button class="px-4 py-2 bg-emerald-800 text-white text-sm font-medium rounded hover:bg-emerald-900 transition">
                                    S'inscrire
                                </button>
                                <!-- Si déjà inscrit, le bouton de désinscription ressemblerait à ça : -->
                                <!-- <button class="px-4 py-2 border border-red-200 text-red-600 text-sm font-medium rounded hover:bg-red-50 transition">Se désinscrire</button> -->
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-amber-600 font-medium hover:underline">Connectez-vous pour vous inscrire</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Onglet 2 : Panels Programmés -->
            <div x-show="tab === 'programmes'" style="display: none;" x-transition>
                <h3 class="text-xl font-bold text-slate-900 mb-6">Panels à venir</h3>
                
                <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg text-center">
                    <p class="text-slate-500">La liste des panels programmés s'affichera ici.</p>
                </div>
            </div>

            <!-- Onglet 3 : Panels en Cours -->
            <div x-show="tab === 'encours'" style="display: none;" x-transition>
                <h3 class="text-xl font-bold text-slate-900 mb-6">Événements actuellement en cours</h3>
                
                <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg text-center">
                    <p class="text-slate-500">Aucun panel n'est en cours de diffusion pour le moment.</p>
                </div>
            </div>

            <!-- Onglet 4 : Supports des Panels -->
            <div x-show="tab === 'supports'" style="display: none;" x-transition>
                <h3 class="text-xl font-bold text-slate-900 mb-6">Documentation et Archives</h3>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50 text-slate-700 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold">Titre du Panel</th>
                                <th class="px-6 py-3 text-left font-semibold">Date</th>
                                <th class="px-6 py-3 text-right font-semibold">Fichier Joint</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            <!-- Exemple de ligne de document -->
                            <tr>
                                <td class="px-6 py-4 text-slate-900 font-medium">Transition Énergétique et Mines</td>
                                <td class="px-6 py-4 text-slate-600">12 Mai 2026</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="inline-flex items-center text-emerald-700 hover:text-emerald-900 font-medium">
                                        Télécharger le PDF
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-white py-12 border-t-4 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-start space-y-8 md:space-y-0 text-sm">
            <div class="space-y-2">
                <img class="h-10 w-auto bg-white p-1 rounded mb-3" src="{{ asset('images/logo.jpg') }}" alt="Logo AEM-BF">
                <p class="text-slate-400 text-xs">Association reconnue officiellement depuis 2022.</p>
                <p class="text-slate-400 text-xs">Récépissé N° : N000001420501</p>
                <p class="text-slate-400 text-xs">IFU: 00200067Y</p>
            </div>
            
            <div>
                <h4 class="font-semibold mb-3 text-amber-400">Contact</h4>
                <p class="text-slate-300 text-xs mb-1">aem.bf01@gmail.com</p>
                <p class="text-slate-300 text-xs">(+226) 60 42 05 89 / 54 76 71 58 - 66 14 75 79</p>
            </div>

            <div>
                <h4 class="font-semibold mb-3 text-amber-400">Légal</h4>
                <p class="text-xs text-slate-500">
                    © 2026 AEM-BF. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>