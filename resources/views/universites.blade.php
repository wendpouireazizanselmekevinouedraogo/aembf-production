<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Universités Membres - AEM-BF</title>
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
            <span class="text-xs font-semibold tracking-widest text-amber-400 uppercase mb-3 block">Réseau National Étudiant</span>
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight uppercase">Universités & Instituts Membres</h1>
            <p class="text-slate-300 mt-3 text-sm md:text-base max-w-2xl mx-auto">
                Découvrez les clubs universitaires de l'AEM-BF, regroupant l'excellence académique des filières minières à travers tout le Burkina Faso.
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- INTRODUCTION -->
        <div class="bg-white p-8 rounded-xl shadow-md border-t-4 border-emerald-800 mb-16 text-center max-w-4xl mx-auto">
            <h3 class="text-2xl font-bold text-slate-900 mb-4">Un Réseau Dynamique de Partenaires</h3>
            <p class="text-sm text-slate-700 leading-relaxed">
                L'Amicale des Étudiants Miniers du Burkina Faso tire sa force de sa diversité et de son ancrage territorial. Nos clubs membres, présents dans les principales universités et grandes écoles d'ingénieurs du pays, animent la vie académique et professionnelle au niveau local tout en contribuant au rayonnement national de l'association.
            </p>
        </div>

        <!-- GRILLE DYNAMIQUE DES UNIVERSITÉS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            
            @forelse($universities as $university)
                <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow overflow-hidden flex flex-col items-center p-6 text-center">
                    
                    <!-- Logo dynamique ou placeholder -->
                    @if($university->logo)
                        <img src="{{ asset('storage/' . $university->logo) }}" alt="{{ $university->name }}" class="w-20 h-20 object-cover rounded-full mb-4 border border-slate-200 shadow-sm">
                    @else
                        <div class="w-20 h-20 bg-slate-100 rounded-full mb-4 flex items-center justify-center text-slate-400 border border-slate-200 text-xs italic">
                            [ Logo ]
                        </div>
                    @endif

                    <!-- Nom -->
                    <h4 class="font-bold text-slate-900 text-base mb-1">{{ $university->name }}</h4>
                    
                    <!-- Localisation / Description -->
                    @if($university->location)
                        <p class="text-xs font-semibold text-emerald-700 mb-2">📍 {{ $university->location }}</p>
                    @endif

                    @if($university->description)
                        <p class="text-xs text-slate-600 mb-3 line-clamp-2">{{ $university->description }}</p>
                    @endif

                    <span class="mt-auto px-3 py-1 bg-emerald-50 text-emerald-800 text-[10px] font-bold uppercase rounded-full tracking-wider">Club Membre</span>
                </div>
            @empty
                <!-- S'il n'y a aucune université enregistrée -->
                <div class="col-span-full text-center py-12 bg-white rounded-xl border border-dashed border-slate-300">
                    <p class="text-slate-500 font-medium">Aucune université ou école membre enregistrée pour le moment.</p>
                </div>
            @endforelse

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