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
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-emerald-800 text-white rounded text-sm font-medium hover:bg-emerald-900 transition shadow-sm">Créer mon compte</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div class="bg-slate-900 text-white py-12 border-b-4 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl font-bold uppercase">Espace Activités & Formations</h1>
            <p class="text-slate-300 mt-3 text-sm max-w-2xl mx-auto">Consultez nos programmes et inscrivez-vous aux modules de formation.</p>
        </div>
    </div>

    <!-- MAIN CONTENT - TABS SYSTEM -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ tab: 'formation' }">
        
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded text-emerald-800 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-wrap border-b border-gray-200 mb-8 gap-2">
            <button @click="tab = 'formation'" :class="tab === 'formation' ? 'border-emerald-800 text-emerald-800 font-bold border-b-2' : 'text-slate-500 hover:text-slate-700'" class="py-3 px-4 focus:outline-none uppercase text-xs md:text-sm">Espace Formation</button>
            <button @click="tab = 'programmes'" :class="tab === 'programmes' ? 'border-emerald-800 text-emerald-800 font-bold border-b-2' : 'text-slate-500 hover:text-slate-700'" class="py-3 px-4 focus:outline-none uppercase text-xs md:text-sm">Panels Programmés</button>
            <button @click="tab = 'encours'" :class="tab === 'encours' ? 'border-emerald-800 text-emerald-800 font-bold border-b-2' : 'text-slate-500 hover:text-slate-700'" class="py-3 px-4 focus:outline-none uppercase text-xs md:text-sm">Panels en Cours</button>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 min-h-[400px]">
            
            <!-- FORMATIONS -->
            <div x-show="tab === 'formation'" style="display: none;" x-transition>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($formations ?? [] as $act)
                        <div class="border border-slate-200 rounded-lg p-5 flex flex-col justify-between">
                            <div>
                                <h4 class="text-lg font-bold text-slate-800 mb-2">{{ $act->title }}</h4>
                                <p class="text-sm text-slate-600 mb-4">{{ $act->description }}</p>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                                @auth
                                    <form action="{{ route('activites.toggle', $act->id) }}" method="POST">
                                        @csrf
                                        @if(auth()->user()->activities->contains($act->id))
                                            <button type="submit" class="px-4 py-2 border border-red-200 text-red-600 text-sm font-medium rounded hover:bg-red-50">Se désinscrire</button>
                                        @else
                                            <button type="submit" class="px-4 py-2 bg-emerald-800 text-white text-sm font-medium rounded hover:bg-emerald-900 shadow-sm">S'inscrire (Utiliser mon profil)</button>
                                        @endif
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-amber-600 font-medium hover:underline">Connectez-vous pour vous inscrire</a>
                                @endauth
                            </div>
                        </div>
                    @empty
                        <p class="text-slate-500 italic text-sm">Aucune formation disponible pour le moment.</p>
                    @endforelse
                </div>
            </div>

            <!-- PANELS PROGRAMMÉS -->
            <div x-show="tab === 'programmes'" style="display: none;" x-transition>
                <div class="grid grid-cols-1 gap-4">
                    @forelse($programmes ?? [] as $act)
                        <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
                            <h4 class="font-bold text-slate-800">{{ $act->title }}</h4>
                            <p class="text-sm text-slate-600 mt-1">{{ $act->description }}</p>
                        </div>
                    @empty
                        <p class="text-slate-500 italic text-sm">Aucun panel programmé.</p>
                    @endforelse
                </div>
            </div>

            <!-- PANELS EN COURS -->
            <div x-show="tab === 'encours'" style="display: none;" x-transition>
                <div class="grid grid-cols-1 gap-4">
                    @forelse($encours ?? [] as $act)
                        <div class="p-4 bg-amber-50 border border-amber-200 rounded-lg">
                            <span class="text-xs font-bold text-amber-600 animate-pulse uppercase mb-1 block">En direct</span>
                            <h4 class="font-bold text-slate-800">{{ $act->title }}</h4>
                            <p class="text-sm text-slate-600 mt-1">{{ $act->description }}</p>
                        </div>
                    @empty
                        <p class="text-slate-500 italic text-sm">Aucun panel n'est en cours.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</body>
</html>