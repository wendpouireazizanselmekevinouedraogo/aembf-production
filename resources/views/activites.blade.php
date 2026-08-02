<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activités & Actualités - AEM-BF</title>
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
                    <a href="{{ route('activites') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Activités</a>
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
    <div class="bg-slate-900 text-white py-16 border-b-4 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <span class="text-xs font-semibold tracking-widest text-amber-400 uppercase mb-3 block">Programmes & Événements</span>
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight uppercase">Activités & Actualités de l'AEM-BF</h1>
            <p class="text-slate-300 mt-3 text-sm md:text-base max-w-2xl mx-auto">
                Retrouvez nos comptes-rendus de visites de sites miniers, nos panels universitaires, nos séminaires de formation et nos annonces officielles.
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- SECTION 1 : ÉVÉNEMENT À LA UNE -->
        <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden mb-16 flex flex-col lg:flex-row">
            <div class="lg:w-1/2 bg-slate-100 flex items-center justify-center p-8 border-b lg:border-b-0 lg:border-r border-slate-200">
                <div class="text-slate-400 text-xs italic text-center">
                    [ Espace Image / Illustration de l'Événement ]
                </div>
            </div>
            <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-between">
                <div>
                    <span class="inline-block px-3 py-1 bg-amber-50 text-amber-800 text-xs font-semibold rounded-md mb-3">À la Une • Visite de Site</span>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Immersion technique des étudiants miniers sur un site extractif partenaire</h3>
                    <p class="text-sm text-slate-700 leading-relaxed mb-6">
                        Dans le cadre du renforcement des compétences pratiques et de l'immersion professionnelle, l'AEM-BF organise une visite guidée majeure d'un site minier industriel au Burkina Faso. Une opportunité unique pour les membres de confronter la théorie académique aux réalités du terrain.
                    </p>
                </div>
                <div class="flex items-center justify-between pt-4 border-t border-slate-100 text-xs text-slate-500">
                    <span>Date : 15 Juillet 2026</span>
                    <a href="#" class="font-semibold text-emerald-800 hover:underline">Lire le compte-rendu complet →</a>
                </div>
            </div>
        </div>

        <!-- SECTION 2 : GRILLE DES ACTUALITÉS ET ACTIVITÉS -->
        <div class="mb-16">
            <div class="mb-8 border-l-4 border-emerald-800 pl-4">
                <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block">Agenda & Compétences</span>
                <h3 class="text-xl font-bold text-slate-900 tracking-tight">Nos Principaux Pôles d'Activités</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Carte Activité 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center text-slate-400 text-xs italic">
                            [ Illustration Photo ]
                        </div>
                        <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">Formation & Séminaire</span>
                        <h4 class="text-base font-bold text-slate-900 mb-2">Conférences et Panels Universitaires</h4>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            Organisation de sessions de partage d'expériences avec des experts et cadres dirigeants de l'industrie minière.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 flex justify-between items-center text-xs">
                        <span class="text-slate-500">Activité Récurrente</span>
                        <a href="#" class="font-semibold text-emerald-800 hover:underline">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte Activité 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center text-slate-400 text-xs italic">
                            [ Illustration Photo ]
                        </div>
                        <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">Terrain & Pratique</span>
                        <h4 class="text-base font-bold text-slate-900 mb-2">Visites de Sites Miniers & Carrières</h4>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            Découverte des installations industrielles, des procédés d'extraction, de traitement du minerai et des normes HSE.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 flex justify-between items-center text-xs">
                        <span class="text-slate-500">Trimestriel</span>
                        <a href="#" class="font-semibold text-emerald-800 hover:underline">En savoir plus</a>
                    </div>
                </div>

                <!-- Carte Activité 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center text-slate-400 text-xs italic">
                            [ Illustration Photo ]
                        </div>
                        <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">Intégration & Cohésion</span>
                        <h4 class="text-base font-bold text-slate-900 mb-2">Camp Vacances & Journées d'Intégration</h4>
                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            Rassemblement de tous les clubs membres autour d'activités culturelles, sportives et de renforcement de la solidarité.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 flex justify-between items-center text-xs">
                        <span class="text-slate-500">Annuel</span>
                        <a href="#" class="font-semibold text-emerald-800 hover:underline">En savoir plus</a>
                    </div>
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